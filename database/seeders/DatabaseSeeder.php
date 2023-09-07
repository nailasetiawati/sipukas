<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $this->call(DonorsCategorySeeder::class);
        $this->call(IncomeSeeder::class);
        $this->call(ExpensesCategorySeeder::class);
        $this->call(IsExpensesSeeder::class);
    }
}
