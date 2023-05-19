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
        Schema::create('notebook', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('company')->default('');
            $table->string('phone');
            $table->string('mail');
            $table->string('birthdate')->default('');
            $table->string('photo')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notebook');
    }
};
