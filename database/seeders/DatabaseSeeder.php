<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('12345'),
        // ]);

        // $this->call([
        //     ExpenseSeeder::class,
        // ]);

        User::factory()
        ->count(5)
        ->create([
            'password' => bcrypt('12345'),
        ])
        ->each(function ($user) {

            $categories = Category::factory()
                ->count(5)
                ->create([
                    'user_id' => $user->id
                ]);

            Expense::factory()
                ->count(50)
                ->create([
                    'user_id' => $user->id,
                    'category_id' =>
                        $categories->random()->id
                ]);
        });
    }
}
