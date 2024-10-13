<?php

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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->string('title')->nullable();
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->boolean('highlight_post')->default(0);
            $table->string('position_level')->nullable();
            $table->string('job_type')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('valid_till')->nullable();
            $table->string('extra_document')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
