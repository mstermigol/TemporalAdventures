<?php

/*
    Author: David Fonseca
*/

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('travels')->insert([
            [
                'id' => 1,
                'title' => 'Construction of the Pyramids of Giza',
                'description' => 'Do you want to travel to the time of the construction of the pyramids of Giza? This is your chance!',
                'place' => 'Meseta de Giza',
                'date_of_destination' => '2000-01-01',
                'price' => 5000,
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-04',
                'image' => '/images/travels/pyramids-of-giza.webp',
                'category' => 'Inventions and Discoveries',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Discovery of America',
                'description' => 'Travel to the moment when Cristobal Colon arrived in America aboard his great and huge ships',
                'place' => 'Guanahaní',
                'date_of_destination' => '1492-10-12',
                'price' => 2500,
                'start_date' => '2024-12-05',
                'end_date' => '2024-12-07',
                'image' => '/images/travels/cristobal-colon.webp',
                'category' => 'Inventions and Discoveries',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'World War I',
                'description' => 'Travel to one of the largest battles of the First World War, fought between the British and French forces against the German Empire',
                'place' => 'Somme River, France',
                'date_of_destination' => '1916-10-18',
                'price' => 15000,
                'start_date' => '2024-12-06',
                'end_date' => '2024-12-12',
                'image' => '/images/travels/world-war-i.webp',
                'category' => 'War and Conflict',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'World War II',
                'description' => 'Travel to one of the largest and bloodiest battles in history, fought between Nazi Germany and the Soviet Union',
                'place' => 'Stalingrado, Soviet Union',
                'date_of_destination' => '1942-01-10',
                'price' => 15000,
                'start_date' => '2024-12-13',
                'end_date' => '2024-12-18',
                'image' => '/images/travels/world-war-ii.webp',
                'category' => 'War and Conflict',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'title' => 'Nagasaki Atomic Bomb',
                'description' => 'Travel to the exact moment in which the first atomic bomb in history was dropped on the city of Nagazaki. BOOM!',
                'place' => 'Nagasaki, Japon',
                'date_of_destination' => '1945-08-06',
                'price' => 120000,
                'start_date' => '2024-12-19',
                'end_date' => '2024-12-19',
                'image' => '/images/travels/nagasaki.webp',
                'category' => 'War and Conflict',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'title' => 'Hiroshima Atomic Bomb',
                'description' => 'Travel to the exact moment in which the second atomic bomb in history was dropped on the city of Hiroshima. BOOM!',
                'place' => 'Hiroshima, Japon',
                'date_of_destination' => '1945-08-09',
                'price' => 110000,
                'start_date' => '2024-12-20',
                'end_date' => '2024-12-20',
                'image' => '/images/travels/hiroshima.webp',
                'category' => 'War and Conflict',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
