<?php

namespace App\Http\Controllers;

use App\Facades\RoastService;
use App\Facades\TurnstileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoastController extends Controller
{
    public function index(Request $request)
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

        TurnstileService::validate($request->get('cf-turnstile-response'));

        return View::make(
            'roasted',
            ['roast' => RoastService::roast($request->get('message'))]
        );
    }
}
