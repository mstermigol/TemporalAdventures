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
        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->date('dateOfEvent');
            $table->string('placeOfEvent');
            $table->enum('category', [
                'Art and Culture',
                'War and Conflict',
                'Music and Entertainment',
                'Inventions and Discoveries',
                'Daily Life and Customs',
                'Exploration and Adventure'
            ]);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_posts');
    }
};
