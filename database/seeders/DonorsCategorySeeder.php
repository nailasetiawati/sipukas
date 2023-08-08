<?php

namespace Database\Seeders;

use App\Models\DonorsCategory;
use Illuminate\Database\Seeder;

class DonorsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonorsCategory::create([
            'name'  =>  'Karyawan'
        ]);
        DonorsCategory::create([
            'name'  =>  'Nasabah'
        ]);
        DonorsCategory::create([
            'name'  =>  'Manager'
        ]);
        DonorsCategory::create([
            'name'  =>  'Office Boy'
        ]);
        DonorsCategory::create([
            'name'  =>  'Cleaning Service'
        ]);
    }
}
