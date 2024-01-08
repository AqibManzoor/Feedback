<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::insert([
            [
                'id' => 1,
                'title' => 'Test Feed Back',
                'description' => 'Test Feed BackTest Feed BackTest Feed BackTest Feed BackTest Feed BackTest Feed BackTest Feed BackTest Feed BackTest Feed Back',
                'category' => 'bug report',
                'status' => 0,
                'user_id' => 1,
                'created_at' => '2024-01-07 15:25:26',
                'updated_at' => '2024-01-07 15:25:26',
            ],
            [
                'id' => 2,
                'title' => 'Launch',
                'description' => 'Sync your passwords, tabs, and bookmarks everywhere you use FirefoxSync your passwords, tabs, and bookmarks everywhere you use FirefoxSync your passwords, tabs, and bookmarks everywhere you use Firefox',
                'category' => 'Bug report',
                'status' => 1,
                'user_id' => 2,
                'created_at' => '2024-01-07 15:25:26',
                'updated_at' => '2024-01-07 15:25:26',
            ],
            [
                'id' => 3,
                'title' => 'Test condito',
                'description' => 'Continue to your Mozilla account  Continue to your Mozilla account  Continue to your Mozilla account  Continue to your Mozilla account  Continue to your Mozilla account  Continue to your Mozilla account  Continue to your Mozilla account',
                'category' => 'Bug report',
                'status' => 1,
                'user_id' => 2,
                'created_at' => '2024-01-07 15:33:21',
                'updated_at' => '2024-01-07 15:33:21',
            ],
            // Add more records if needed
        ]);
    }
}
