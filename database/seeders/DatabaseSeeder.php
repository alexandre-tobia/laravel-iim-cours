<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
//
//         Post::factory(20)->create();
//
//         Author::factory(5)->create();

         Comment::factory(200)->create();
    }
}
