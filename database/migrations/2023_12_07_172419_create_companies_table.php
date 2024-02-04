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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('company_name')->nullable();
            $table->string('founded_date')->nullable();
            $table->string('employees_no')->nullable();
            $table->string('company_type')->nullable();
            $table->string('company_img')->nullable();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
