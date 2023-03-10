<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // DB::table('biens')->insert([
        //     ["nom"=>"Bien1"],
        //     ["nom"=>"Bien2"],
        //     ["nom"=>"Bien3"],
        //     ["nom"=>"Bien4"],
        //     ["nom"=>"Bien5"],
        // ]);
        \App\Models\Bien::factory(20)->create();
    }
}
