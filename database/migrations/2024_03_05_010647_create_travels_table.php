<?php
/*
    Author: David Fonseca
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CategoryEnum;

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
            $table->date('date_of_destination');
            $table->integer('price');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('image');
            $table->enum('status', CategoryEnum::values());
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
