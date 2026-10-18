<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Project;
use App\Models\TimeEntry;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Customer::factory(25)->create()->each(function (Customer $customer) {
            Project::factory(fake()->numberBetween(1, 4))
                ->for($customer)
                ->create()
                ->each(fn (Project $project) => TimeEntry::factory(fake()->numberBetween(3, 15))->for($project)->create());
        });
    }
}
