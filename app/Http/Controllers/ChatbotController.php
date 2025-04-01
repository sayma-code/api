<?php

namespace App\Http\Controllers;

use App\Models\ChatbotResponse;
use Response;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $userMessage = trim($request->input('message'));

        // Search for an exact match in the database
        $response = ChatbotResponse::where('user_message', $userMessage)->first();

        if ($response) {
            return response()->json([
                'user_message' => $userMessage,
                'bot_response' => $response->bot_response,
            ]);
        }

        return response()->json([
            'user_message' => $userMessage,
            'bot_response' => "I'm not sure about that. Can you rephrase?",
        ]);
    }
}
