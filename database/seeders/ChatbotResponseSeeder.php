<?php

namespace Database\Seeders;

use App\Models\ChatbotResponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatbotResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responses = [
            ['user_message' => 'Hello!', 'bot_response' => 'Hi there! How can I help you?'],
            ['user_message' => 'How are you?', 'bot_response' => "I'm just a bot, but I'm doing great! 😊"],
            ['user_message' => 'What is Laravel?', 'bot_response' => 'Laravel is a PHP framework for building web applications.'],
        ];

        foreach ($responses as $response) {
            ChatbotResponse::create($response);
        }
    }
}
