<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class TurnstileService
{
    public function validate($turnstileResponse)
    {
        $body = [
            'response' => $turnstileResponse,
            'secret' => config('roastme.TURNSTILE_SECRET_KEY'),
        ];

        $response = Http::post(
            'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            $body
        );

        if (
            $response->status() === 200 &&
            json_decode($response->body(), true)['success'] === true
        ) {
            return;
        }

        throw ValidationException::withMessages(['msg' => ['Something went wrong, please try again']]);
    }
}
