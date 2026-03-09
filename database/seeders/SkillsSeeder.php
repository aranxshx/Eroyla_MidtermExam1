<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::insert([
            ['name' => 'Unity',    'level' => 'Advanced',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'C#',       'level' => 'Advanced',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Java',     'level' => 'Intermediate', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PHP',      'level' => 'Intermediate', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel',  'level' => 'Intermediate', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eahcakes', 'level' => 'Advanced',     'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
