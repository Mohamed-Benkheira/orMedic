<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;

class PrescriptionsTableSeeder extends Seeder
{
    public function run()
    {
        Prescription::create([
            'illness' => 'Flu',
            'user_id' => 1,
            'more_infos' => 'word one word two word three word four word five word six and so on'
        ]);

        Prescription::create([
            'illness' => 'Headache',
            'user_id' => 1,
            'more_infos' => 'word one word two word three word four word five word six and so on'
        ]);
    }
}
