<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->string('country_code')->default('ke');
            $table->string('subject');
            $table->text('description')->nullable();
            $table->string('service_type');
            $table->string('platform')->nullable();
            $table->date('exam_date')->nullable();
            $table->time('exam_time')->nullable();
            $table->integer('pages')->default(1);
            $table->boolean('terms_accepted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
