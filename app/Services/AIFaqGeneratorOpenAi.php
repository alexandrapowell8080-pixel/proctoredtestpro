<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AIFaqGeneratorOpenAi
{
    public function generate(string $keyword): array
    {
        $prompt = <<<PROMPT
Generate a single FAQ entry for the keyword: "{$keyword}". 
Return ONLY a valid JSON object with these exact keys:
- "title": The question (will be used as FAQ title)
- "description": A direct, concise answer to the question. MUST BE 70 characters or less.
- "content": A detailed, helpful answer. Approximately 350 words.
- "keywords": Array of 3-5 relevant SEO keywords including the original keyword.
Do not include markdown formatting or extra text. Output valid JSON only.
PROMPT;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.api_key'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o',
            'messages' => [['role' => 'user', 'content' => $prompt]],
            'response_format' => ['type' => 'json_object'],
            'temperature' => 0.6,
        ]);

        if ($response->failed()) {
            throw new \Exception('AI Generation failed: ' . $response->body());
        }

        $json = json_decode($response->json('choices.0.message.content'), true);
        if (!$json || !isset($json['title'], $json['description'], $json['content'])) {
            throw new \Exception('Invalid response structure from AI.');
        }

        return [
            'keyword'       => $keyword,
            'title'         => trim($json['title']),
            'slug'          => Str::slug($json['title']),
            'description'   => Str::limit(trim($json['description']), 70, ''),
            'content'       => trim($json['content']),
            'meta_keywords' => $json['keywords'] ?? [$keyword],
        ];
    }
}