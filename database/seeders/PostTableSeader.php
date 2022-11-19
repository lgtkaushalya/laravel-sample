<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'title' => 'Post One',
                'excerpt' => 'Summary of Post One',
                'body' => 'Body of Post One',
                'img_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 2,
            ],
            [
                'title' => 'Post Two',
                'excerpt' => 'Summary of Post Two',
                'body' => 'Body of Post Two',
                'img_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 2,
            ]
        ];

        foreach($post as $key => $value) {
            Post::create($value);
        }
    }
}
