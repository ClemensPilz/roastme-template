<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RoastService
{
    public function roast($message)
    {
        $prompt = "You are an AI-Roast-Master. Create a short, maximum 4 sentences, roast about a person based on this message provided by him or her. Do it in the style of a modern TV-roast. Answer just with the roast, nothing else. Do not create any racist or antisemitic content. Message: $message";

        $body = [
            'model' => 'chatgpt-4o-latest',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
            'temperature' => 0.7,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('roastme.OPEN_AI_TOKEN'),
            'Content-Type' => 'application/json',
        ])
            ->post(config('roastme.OPEN_AI_BASEURL'), $body);

        $body = json_decode($response->body(), true);

        return $body['choices'][0]['message']['content'];
    }
}
