<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {

        Storage::deleteDirectory('public/posts');
        Storage::deleteDirectory('public/profile-photos');
        Storage::makeDirectory('public/posts');// crea una carpeta en estorage conel nombre posts

        // \App\Models\User::factory(10)->create();
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        Category::factory(3)->Create();
        Tag::factory(4)->create();
        $this->call(PostSeeder::class); //php artisan storage:link
        

        
    }
}
