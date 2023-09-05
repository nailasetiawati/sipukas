<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
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
        ExpenseCategory::create([
            'name'  =>  'Pembelian Barang'
        ]);
        ExpenseCategory::create([
            'name'  =>  'ATK'
        ]);
    }
}
