<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AIBlogGenerator
{
    public function generate(string $keyword): array
    {
        $prompt = <<<PROMPT
You are an SEO-focused content generation agent with a professional tone. Your task is to generate a complete, well-structured blog post based on a single keyword: "{$keyword}".
OUTPUT REQUIREMENTS:
- Title maximum 10 words, include the exact keyword, clear and professional.
- Blog content minimum 600 words, maximum 750 words.
- Maintain approximately 1% keyword density.
- Use structured Markdown formatting with H2 (##) and H3 (###) headings.
- Short paragraphs.
- At least one bullet or numbered list.
- Natural readability without obvious keyword stuffing.
- Distribute the keyword evenly throughout the content.
- Meta description maximum 160 characters, include the keyword.
- Meta keywords exactly 4 related keywords, comma-separated, including the user keyword.
STRUCTURE GUIDELINES:
- Start with an introduction.
- Include at least 3 H2 sections.
- Use H3 sub-sections where helpful.
- Include at least one list.
- End with a conclusion.
OUTPUT FORMAT:
Return strict JSON only with these keys: "title", "content", "description", "keywords".
No extra text outside JSON.
PROMPT;

        $response = Http::withHeaders([
            // Switched to deepseek config
            'Authorization' => 'Bearer ' . config('services.deepseek.api_key'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.deepseek.com/chat/completions', [ 
            'model' => 'deepseek-v4-flash', // Updated Model
            'messages' => [
                
                ['role' => 'system', 'content' => 'You are an SEO FAQ generator. Always output raw JSON.'],
                ['role' => 'user', 'content' => $prompt]
            ],
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