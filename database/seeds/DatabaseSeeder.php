<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);

        Model::reguard();
    }
}
