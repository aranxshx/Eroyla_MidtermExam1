<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::insert([
            [
                'position'    => 'Lead Programmer',
                'company'     => 'Sunfall Studios',
                'description' => 'Made video games for fun and for game jams, shipping titles with a small but passionate team.',
                'start_date'  => '2025-09-01',
                'end_date'    => 'Present',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'position'    => 'Lead Programmer',
                'company'     => 'Hyperpigmentation',
                'description' => 'Delivered a complete, working build of "Moonhead" for a game jam — on time and fully playable.',
                'start_date'  => '2023-08-01',
                'end_date'    => '2024-08-31',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'position'    => 'Junior Programmer',
                'company'     => 'Eahcakes Inc.',
                'description' => 'Served clients with their games, bringing care, craft, and a whole lot of respect to every build.',
                'start_date'  => '2020-07-01',
                'end_date'    => '2020-12-31',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
