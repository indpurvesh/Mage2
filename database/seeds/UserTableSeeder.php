<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Admin\Entity;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name' => "Admin",
            'email' => "ind.purvesh@gmail.com",
            'password' => bcrypt("admin123"),
        ]);
         
         Entity::create(['name' => 'Product', 'unique_key' => 'product']);
         Entity::create(['name' => 'Category', 'unique_key' => 'category']);
    }
}
