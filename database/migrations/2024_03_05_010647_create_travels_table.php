<?php

/*
    Author: David Fonseca
*/

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
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('place');
            $table->date('dateOfDestination');
            $table->integer('price');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('image');
            $table->enum('category', [
                'Art and Culture',
                'War and Conflict',
                'Music and Entertainment',
                'Inventions and Discoveries',
                'Daily Life and Customs',
                'Exploration and Adventure'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
