<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::updateOrCreate([
            'name' => 'Team Alpha',
        ], [
            'personal_team' => false,
        ]);

        Team::updateOrCreate([
            'name' => 'Team Beta',
        ], [
            'personal_team' => false,
        ]);
    }
}
