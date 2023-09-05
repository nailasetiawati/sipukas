<?php

namespace Database\Seeders;

use App\Models\IsExpense;
use Illuminate\Database\Seeder;

class IsExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IsExpense::create([
            'nominal' => 90000,
            'expense_category_id' => 1,
            'description' => 'beli kibot',
            'image' => 'beli_kibot.jpeg'

        ]);
    }
}
