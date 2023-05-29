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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('employee'); // employee, company, admin
            $table->foreignId('industry_id')->nullable()->references('id')->on('industries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_category_id')->nullable()->references('id')->on('user_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('document')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('category')->nullable();
            $table->string('comments')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
