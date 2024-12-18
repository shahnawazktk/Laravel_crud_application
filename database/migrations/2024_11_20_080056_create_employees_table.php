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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Employee's name
            $table->string('email')->unique(); // Employee's email (unique)
            $table->string('phone'); // Employee's phone number
            $table->string('position'); // Employee's position
            $table->decimal('salary', 8, 2); // Employee's salary (with precision)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
