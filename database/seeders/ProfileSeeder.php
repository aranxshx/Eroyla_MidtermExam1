<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::insert([
            [
                'name'          => 'Andrew Eroyla',
                'title'         => 'Game Developer',
                'bio'           => 'I craft whimsical, wildly creative, and deeply indie games — the kind that feel like fever dreams in the best way possible.',
                'profile_image' => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
