<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::insert([
            [
                'id' => 1,
                'comment' => 'Nice',
                'user_id' => 1,
                'feedback_id' => 1,
                'created_at' => '2024-01-06 18:23:23',
                'updated_at' => '2024-01-06 18:23:23',
            ],
            [
                'id' => 2,
                'comment' => 'Nice',
                'user_id' => 2,
                'feedback_id' => 1,
                'created_at' => '2024-01-06 18:41:58',
                'updated_at' => '2024-01-06 18:41:58',
            ],
            [
                'id' => 3,
                'comment' => 'Nice',
                'user_id' => 1,
                'feedback_id' => 1,
                'created_at' => '2024-01-06 18:53:01',
                'updated_at' => '2024-01-06 18:53:01',
            ],
            [
                'id' => 4,
                'comment' => 'Good working',
                'user_id' => 2,
                'feedback_id' => 1,
                'created_at' => '2024-01-06 19:18:50',
                'updated_at' => '2024-01-06 19:18:50',
            ],
            [
                'id' => 5,
                'comment' => 'Awesome',
                'user_id' => 2,
                'feedback_id' => 1,
                'created_at' => '2024-01-06 19:30:41',
                'updated_at' => '2024-01-06 19:30:41',
            ],
            [
                'id' => 12,
                'comment' => 'Test by deg',
                'user_id' => 2,
                'feedback_id' => 3,
                'created_at' => '2024-01-07 11:39:21',
                'updated_at' => '2024-01-07 11:39:21',
            ],
            [
                'id' => 13,
                'comment' => 'Test by deg',
                'user_id' => 2,
                'feedback_id' => 3,
                'created_at' => '2024-01-07 11:39:44',
                'updated_at' => '2024-01-07 11:39:44',
            ],
            [
                'id' => 14,
                'comment' => 'Very nice',
                'user_id' => 2,
                'feedback_id' => 3,
                'created_at' => '2024-01-07 11:39:59',
                'updated_at' => '2024-01-07 11:39:59',
            ],
            [
                'id' => 15,
                'comment' => 'Tesgt sadfasdfaf',
                'user_id' => 2,
                'feedback_id' => 3,
                'created_at' => '2024-01-07 11:40:17',
                'updated_at' => '2024-01-07 11:40:17',
            ],
            [
                'id' => 16,
                'comment' => 'heklkjskjd',
                'user_id' => 2,
                'feedback_id' => 2,
                'created_at' => '2024-01-07 12:12:43',
                'updated_at' => '2024-01-07 12:12:43',
            ],
            // Add more records following the same structure
        ]);
    }
}
