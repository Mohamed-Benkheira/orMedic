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
            'dosage' => '500mg',
            'form' => 'Tablet',
            'route_of_administration' => 'Oral',
            'frequency' => 'Twice a day',
            'duration' => '5 days',
            'quantity' => 10
        ]);

        Medicine::create([
            'name' => 'Ibuprofen',
            'dosage' => '200mg',
            'form' => 'Capsule',
            'route_of_administration' => 'Oral',
            'frequency' => 'Three times a day',
            'duration' => '7 days',
            'quantity' => 21
        ]);
        Medicine::create([
            'name' => 'Paracetamol',
            'dosage' => '200mg',
            'form' => 'Capsule',
            'route_of_administration' => 'Oral',
            'frequency' => 'Three times a day',
            'duration' => '7 days',
            'quantity' => 21
        ]);
        Medicine::create([
            'name' => 'lorem',
            'dosage' => '220mg',
            'form' => 'Capsule',
            'route_of_administration' => 'Oral',
            'frequency' => 'Three times a day',
            'duration' => '7 days',
            'quantity' => 21
        ]);
    }
}
