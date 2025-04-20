<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoiceController extends Controller
{
    public function store(Request $request)
    {
        $text = strtolower($request->input('text')); // normalize case

        $reply = "Sorry, I didn't understand that.";

        // Sample pattern detection
        if (str_contains($text, 'my name is')) {
            $name = trim(str_replace('my name is', '', $text));
            $reply = "Hello $name, how are you? How can I assist you?";
        } elseif (str_contains($text, 'hello')) {
            $reply = "Hi there! How can I help you today?";
        } elseif (str_contains($text, 'your name')) {
            $reply = "My name is VoiceBot. Nice to meet you!";
        }

        return response()->json([
            'message' => 'Text received successfully!',
            'text' => $text,
            'reply' => $reply,
        ]);
    }
}
