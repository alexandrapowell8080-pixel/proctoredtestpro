<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('service_type')->nullable();
            $table->string('service_label')->nullable();
            $table->string('email');
            $table->string('country_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
            $table->string('platform')->nullable();
            $table->date('exam_date')->nullable();
            $table->string('exam_time')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('pages')->default(1);
            $table->boolean('terms')->default(false);
            $table->string('attachment_path')->nullable();
            $table->string('attachment_original_name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
