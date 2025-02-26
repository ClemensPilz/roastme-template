<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use function Laravel\Prompts\error;

class RoastController extends Controller
{
    public function roast(Request $request)
    {

        $request->validate([
            'message' => 'required|string|max:200|min:10',
            'cf-turnstile-response' => 'required|string|max:2048',
        ], [
            'message.required' => 'Please provide a message',
            'message.max' => 'Message is too long',
            'message.min' => 'Message is too short',
            'cf-turnstile-response' => 'Something went wrong, please try again',
        ]);

        if (! $this->isValidTurnstileResponse($request->input('cf-turnstile-response'))) {

            return Redirect::back()
                ->withErrors(['msg' => 'Something went wrong - please try again!']);
        }

        $message = $request->input('message');

        $data = ['roast' => $this->createRoast($message)];

        return View::make('roasted', $data);
    }

    private function isValidTurnstileResponse($turnstile_response)
    {
        try {
            $body = [
                'response' => $turnstile_response,
                'secret' => config('roastme.TURNSTILE_SECRET_KEY'),
            ];

            $response = Http::post(
                'https://challenges.cloudflare.com/turnstile/v0/siteverify',
                $body);

            if ($response->status() !== 200) {
                Log:
                error('Could not verify turnstile response. Response status: '.$response->status());

                return false;
            }

            return json_decode($response->body(), true)['success'] === true;
        } catch (\Exception $e) {
            Log::error($e);

            return false;
        }
    }

    private function createRoast(string $message): string
    {
        try {
            $prompt = "You are an AI-Roast-Master. Create a short, maximum 4 sentences, roast about a person based on this message provided by him or her. Do it in the style of a modern TV-roast. Answer just with the roast, nothing else. Do not create any racist or antisemitic content. Message: $message";

            $body = [
                'model' => 'chatgpt-4o-latest',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => '0.7',
            ];

            $response = Http::withHeaders(['Authorization' => 'Bearer '.config('roastme.OPEN_AI_TOKEN'),
                'Content-Type' => 'application/json'])
                ->post(config('roastme.OPEN_AI_BASEURL'), $body);

            $body = json_decode($response->body(), true);

            if (empty($body['choices'][0]['message']['content'])) {
                throw new \Exception('Could not get roast from open ai, invalid response structure.');
            }

            return $body['choices'][0]['message']['content'];
        } catch (\Exception $e) {
            Log::error(
                'Exception during roast creation!',
                ['message' => $e->getMessage()]
            );
            abort(400);
        }
    }
}
