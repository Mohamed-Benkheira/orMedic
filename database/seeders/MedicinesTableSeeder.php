<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            'name' => 'Paracetamol',
            'dosage_mg' => 500,
            'form' => 'Tablet',
            'route_of_administration' => 'Oral',
            'frequency' => 'Twice a day',
            'duration' => '5 days',
            'quantity' => 10,
            'more_info' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ]);

        Medicine::create([
            'name' => 'Ibuprofen',
            'dosage_mg' => 200,
            'form' => 'Capsule',
            'route_of_administration' => 'Oral',
            'frequency' => 'Three times a day',
            'duration' => '7 days',
            'quantity' => 21,
            'more_info' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ]);
        Medicine::create([
            'name' => 'Paracetamol',
            'dosage_mg' => 200,
            'form' => 'Capsule',
            'route_of_administration' => 'Oral',
            'frequency' => 'Three times a day',
            'duration' => '7 days',
            'quantity' => 21,
            'more_info' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ]);
        Medicine::create([
            'name' => 'lorem',
            'dosage_mg' => 220,
            'form' => 'Capsule',
            'route_of_administration' => 'Oral',
            'frequency' => 'Three times a day',
            'duration' => '7 days',
            'quantity' => 21,
            'more_info' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ]);
    }
}
