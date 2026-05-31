<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Groceries',
                'Coffee',
                'Movie',
                'Electricity Bill',
                'Petrol',
                'Dinner'
            ]),

            'amount' => fake()->numberBetween(50, 5000),

            'note' => fake()->sentence(),

            'expense_date' => fake()->dateTimeBetween(
                '-6 months',
                'now'
            ),
        ];
    }
}
