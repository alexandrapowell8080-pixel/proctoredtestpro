<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            // Remove old course_id
            if (Schema::hasColumn('faqs', 'course_id')) {
                $table->dropColumn('course_id');
            }
            
            // Remove the temporary 'category' int column if you already ran the old migration
            if (Schema::hasColumn('faqs', 'category')) {
                $table->dropColumn('category');
            }

            // Add proper category_id foreign key
            if (!Schema::hasColumn('faqs', 'category_id')) {
                $table->foreignId('category_id')->nullable()->after('id')->constrained('categories')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->unsignedBigInteger('course_id')->nullable();
        });
    }
};