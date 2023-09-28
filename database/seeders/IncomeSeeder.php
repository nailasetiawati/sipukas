<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Income::create([
            'nominal'           =>  90000,
            'donor_name'        =>  'Ahmad Sugandi',
            'donor_category_id' =>  1,
            'pay_from'          =>  1
        ]);
        Income::create([
            'nominal'           =>  75000,
            'donor_name'        =>  'Dadang Petrus',
            'donor_category_id' =>  1,
            'pay_from'          =>  1
        ]);
        Income::create([
            'nominal'           =>  16000,
            'donor_name'        =>  'Asep Saepulloh',
            'donor_category_id' =>  5,
            'pay_from'          =>  1
        ]);
        Income::create([
            'nominal'           =>  100000,
            'donor_name'        =>  'Michael Junior Roberts',
            'donor_category_id' =>  3,
            'pay_from'          =>  1,
        ]);
        Income::create([
            'nominal'           =>  100000,
            'donor_name'        =>  'Michael Junior Senior',
            'donor_category_id' =>  3,
            'pay_from'          =>  2,
        ]);
        Income::create([
            'nominal'           =>  100000,
            'donor_name'        =>  'Michael Junior Senior',
            'donor_category_id' =>  3,
            'pay_from'          =>  2,
        ]);
    }
}
