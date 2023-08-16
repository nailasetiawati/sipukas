<?php

namespace Database\Seeders;

use App\Models\ExpensesCategory;
use Illuminate\Database\Seeder;

class ExpensesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpensesCategory::create([
            'name'  =>  'Pembelian Barang'
        ]);
        ExpensesCategory::create([
            'name'  =>  'ATK'
        ]);
    }
}
