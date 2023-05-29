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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedTinyInteger('status')->default(0); // 0 - pending, 1 - approved, 2 - rejected, 3 - completed
            $table->string('name');
            $table->string('area');
            $table->string('knowledge');
            $table->string('details');
            $table->unsignedTinyInteger('contract_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedTinyInteger('payment_type');
            $table->double('amount');
            $table->string('location');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
