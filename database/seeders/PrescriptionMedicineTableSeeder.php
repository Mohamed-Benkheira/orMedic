<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionMedicineTableSeeder extends Seeder
{
    public function run()
    {
        // Assuming medicine and prescription IDs exist
        DB::table('prescription_medicine')->insert([
            'prescription_id' => 1,
            'medicine_id' => 1,
        ]);

        DB::table('prescription_medicine')->insert([
            'prescription_id' => 1,
            'medicine_id' => 2,
        ]);

        DB::table('prescription_medicine')->insert([
            'prescription_id' => 2,
            'medicine_id' => 1,
        ]);
    }
}
