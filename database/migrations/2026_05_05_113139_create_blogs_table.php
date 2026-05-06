<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class, 'category_id');
            $table->string('title');
            $table->string('image_url');
            $table->string('description');
            $table->text('content');
            $table->string('slug');
            $table->string('keywords');
            $table->string('meta_keywords');
            $table->enum('status', ['draft', 'published']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
