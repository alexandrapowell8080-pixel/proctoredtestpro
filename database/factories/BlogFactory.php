<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6);

        // rotating keyword sets
        $keywordSets = [
            'nairobi, kenya, skyline, city, africa',
            'technology, startups, innovation, business, africa',
            'travel, tourism, adventure, culture, kenya',
            'food, lifestyle, health, wellness, living',
            'finance, economy, markets, growth, investment',
        ];

        $keywords = $this->faker->randomElement($keywordSets);

        // 300 words content
        $content = $this->faker->words(300, true);

        // description == meta_keywords (same value as requested)
        $meta = $this->faker->sentence(20);

        return [
            'category_id' => \App\Models\Category::inRandomOrder()->value('id'), // auto-create category if none
            'title' => $title,
            'image_url' => 'https://img.magnific.com/premium-photo/nairobi-city-county-kenyas-capital-cityscapes-skyline-skyscrapers-highrise-buildings-architecture_257688-276.jpg',
            'description' => $meta,
            'content' => $content,
            'slug' => Str::slug($title).'-'.Str::uuid(),
            'keywords' => $keywords,
            'meta_keywords' => $meta,
            'status' => 'published', // all published
        ];
    }
}
