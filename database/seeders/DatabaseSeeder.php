<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Catogry;
use App\Models\Comment;
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
        \App\Models\User::factory(10)->create();
        Catogry::factory(5)->create();
        Blog::factory(100)->create();
        Comment::factory(100)->create();

    }
}
