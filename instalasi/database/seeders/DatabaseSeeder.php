<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post_Model;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'bima',
            'email' => 'bima@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'name' => 'afrizal',
            'email' => 'rizal@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post_Model::create([
            'title' => 'judul pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est. Qui, ratione perferendis. Officia,
             cupiditate omnis? Omnis maiores aperiam necessitatibus, quibusdam tempore voluptatum?',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post_Model::create([
            'title' => 'judul kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est. Qui, ratione perferendis. Officia,
             cupiditate omnis? Omnis maiores aperiam necessitatibus, quibusdam tempore voluptatum?',
            'category_id' => 1,
            'user_id' => 1
        ]);
        Post_Model::create([
            'title' => 'judul ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est. Qui, ratione perferendis. Officia,
             cupiditate omnis? Omnis maiores aperiam necessitatibus, quibusdam tempore voluptatum?',
            'category_id' => 2,
            'user_id' => 1
        ]);
        Post_Model::create([
            'title' => 'judul empat',
            'slug' => 'judul-empat',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptatem mollitia earum illum, fugit suscipit modi est. Qui, ratione perferendis. Officia,
             cupiditate omnis? Omnis maiores aperiam necessitatibus, quibusdam tempore voluptatum?',
            'category_id' => 2,
            'user_id' => 2
        ]);
    }
}
