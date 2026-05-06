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
            'category_id' => Category::inRandomOrder()->value('id'), // auto-create category if none
            'title' => 'Cow Dung: Uses, Benefits, and Sustainability Insights',
            'image_url' => 'https://img.magnific.com/premium-photo/nairobi-city-county-kenyas-capital-cityscapes-skyline-skyscrapers-highrise-buildings-architecture_257688-276.jpg',
           "content"=> "## Introduction\nCow dung has been an essential natural resource in rural and agricultural economies for centuries. Traditionally regarded as a waste product, cow dung is now increasingly recognized for its wide range of sustainable applications. From farming to energy production, cow dung plays a vital role in eco-friendly practices. In many regions, cow dung is used not only as an organic fertilizer but also as a source of fuel and construction material. The growing interest in sustainable living has renewed attention toward cow dung as a renewable and biodegradable resource. This article explores the various uses, benefits, and modern innovations associated with cow dung in different industries.\n\n## Understanding cow dung and its composition\nCow dung is composed of digested plant matter, rich in organic materials and microorganisms. Cow dung contains essential nutrients such as nitrogen, phosphorus, and potassium, making cow dung valuable for soil enrichment. The composition of cow dung varies depending on the animal's diet and environment. Proper handling of cow dung can significantly enhance its usefulness in agricultural and industrial applications.\n\n### Nutritional and chemical composition\nCow dung includes a balanced mix of organic fibers and minerals. These components make cow dung an effective soil conditioner and composting material.\n\n### Environmental role\nCow dung also contributes to environmental sustainability by reducing waste accumulation and supporting natural recycling processes. When managed properly, cow dung minimizes pollution and improves soil fertility.\n\n## Agricultural uses of cow dung\nCow dung has long been used in agriculture as a natural fertilizer and soil conditioner. Farmers rely on cow dung to improve soil structure, increase nutrient content, and enhance crop yields. The use of cow dung supports eco-friendly farming systems by reducing dependence on chemical fertilizers.\n\n- Organic fertilizer\n- Composting material\n- Pest repellent\n- Soil moisture retention\n- Seed protection\n\nCow dung is also used in preparing farmyard manure and improving microbial activity in soil. In organic farming systems, cow dung plays a central role in maintaining soil health. Additionally, cow dung helps reduce dependency on synthetic inputs, promoting sustainable agriculture.\n\n## Energy and biogas applications\nCow dung is a significant resource for renewable energy production. Cow dung can be processed through anaerobic digestion to produce biogas, which is used for cooking, heating, and electricity generation. This process not only provides clean energy but also reduces greenhouse gas emissions.\n\nCow dung-based biogas systems are widely adopted in rural areas where access to conventional energy is limited. The residue from biogas production, known as slurry, is also used as a high-quality fertilizer. The efficient use of cow dung contributes to energy security and waste management.\n\n## Industrial and environmental benefits\nBeyond agriculture and energy, cow dung has several industrial and environmental applications. Cow dung is used in the production of eco-friendly building materials, paper, and even biodegradable products. Cow dung helps in waste management by converting organic waste into useful resources.\n\nCow dung also plays a role in reducing carbon footprints and supporting circular economy models. Its use in rural industries creates employment opportunities and supports sustainable livelihoods. Proper utilization of cow dung can significantly reduce environmental pollution.\n\n## Conclusion\nCow dung is far more than a traditional agricultural byproduct; it is a versatile resource with applications across farming, energy, and industry. The sustainable use of cow dung supports environmental protection and economic development. Cow dung continues to gain importance in modern eco-friendly practices due to its renewable nature and wide-ranging benefits. As awareness of sustainability grows, cow dung is expected to play an even greater role in future green technologies. By effectively utilizing cow dung, communities can reduce waste, improve soil health, and generate clean energy.", 
            'slug' => Str::slug($title).'-'.Str::uuid(),
            'keywords' => $keywords,
            'description' => 'Discover the benefits, uses, and sustainability potential of cow dung in agriculture, energy, and eco-friendly practices.',
            'meta_keywords' => 'cow dung, organic fertilizer, biogas production, sustainable farming',
            'status' => 'published', // all published

        ];
    }
}
