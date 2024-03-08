<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('0000'),
        ]);
        

        \App\Models\Cycle::factory()->create([
            'libelle' => 'cycle 1'
        ]);
        \App\Models\Cycle::factory()->create([
            'libelle' => 'cycle 2'
        ]);

        // Add level school
        \App\Models\Level::factory()->create([
            'cycle_id' => '1',
            'libelle' => 'Sixieme',
            'code' => '6eme'
        ]);
        \App\Models\Level::factory()->create([
            'cycle_id' => '1',
            'libelle' => 'Cinquieme',
            'code' => '5eme'
        ]);
        \App\Models\Level::factory()->create([
            'cycle_id' => '1',
            'libelle' => 'Quatrieme',
            'code' => '4eme'
        ]);
        \App\Models\Level::factory()->create([
            'cycle_id' => '1',
            'libelle' => 'Troisieme',
            'code' => '3eme'
        ]);
        \App\Models\Level::factory()->create([
            'cycle_id' => '2',
            'libelle' => 'Seconde',
            'code' => '2nd'
        ]);
        \App\Models\Level::factory()->create([
            'cycle_id' => '2',
            'libelle' => 'Premiere',
            'code' => '1ere'
        ]);
        \App\Models\Level::factory()->create([
            'cycle_id' => '2',
            'libelle' => 'Terminale',
            'code' => 'Tle'
        ]);

        // \App\Models\Serie::factory()->create([
        //     'libelle' => 'unique',
        // ]);

    }
}
