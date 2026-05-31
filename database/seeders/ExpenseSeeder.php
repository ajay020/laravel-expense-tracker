<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $categories = $user->categories;

         Expense::factory()
            ->count(100)
            ->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);
    }
}
