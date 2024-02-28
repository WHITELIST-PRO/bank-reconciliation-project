<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use WhitelistPRO\BankReconciliation\ColorCombination;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColorCombination::create([
                'complete_matching_percentage' => 90,
                'partial_matching_percentage' => 30,
                'complete_matching' => '#00ff33',
                'complete_matching_select' => '#00bd26',
                'partial_matching' => '#f9f967',
                'partial_matching_select' => '#e0d900',
            ]);

    }
}
