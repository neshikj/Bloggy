<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class, 15)->create();
    }
}
