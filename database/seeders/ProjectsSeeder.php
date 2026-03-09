<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::insert([
            [
                'title'       => 'Moonhead',
                'description' => 'A 2D Metroidvania where you claw your way back to full power as Moonhead — traversing strange labyrinths to reclaim every ability stolen from you.',
                'github_link' => 'https://github.com/andreweroyla/moonhead',
                'image'       => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Where Agno Sleeps',
                'description' => 'A 3D psychological horror that drags you through Agno\'s fractured dreamscape — where every corridor hides something that shouldn\'t exist.',
                'github_link' => 'https://github.com/andreweroyla/where-agno-sleeps',
                'image'       => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => '100x!',
                'description' => 'A breakneck 3D math-action game with Sonic-speed energy — play as the Humble Operator and beat the ever-living singularity out of a black hole.',
                'github_link' => 'https://github.com/andreweroyla/100x',
                'image'       => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Fox',
                'description' => 'A compact 2D platformer test bed — tight controls, clever level design, and the irresistible urge to see how far a fox can run.',
                'github_link' => 'https://github.com/andreweroyla/fox',
                'image'       => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
