<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listings;

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
        Listings::create([
            'title' => 'Laravel Senior Developer', 
            'tags' => 'laravel, javascript',
            'company' => 'Acme Corp',
            'user_id'=> 1,
            'location' => 'Boston, MA',
            'email' => 'email1@email.com',
            'website' => 'https://www.acme.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
        Listings::create([
          'title' => 'Full-Stack Engineer',
          'tags' => 'laravel, backend ,api',
          'company' => 'Stark Industries',
          'user_id'=> 1,
          'location' => 'New York, NY',
          'email' => 'email2@email.com',
          'website' => 'https://www.starkindustries.com',
          'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
        Listings::create([

          'title' => 'Laravel Developer', 
          'tags' => 'laravel, vue, javascript',
          'company' => 'Wayne Enterprises',
          'location' => 'Gotham, NY',
          'user_id'=> 1,
          'email' => 'email3@email.com',
          'website' => 'https://www.wayneenterprises.com',
          'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
        Listings::create([

          'title' => 'Backend Developer', 
          'tags' => 'laravel, php, api',
          'company' => 'Skynet Systems',
          'user_id'=> 1,
          'location' => 'Newark, NJ',
          'email' => 'email4@email.com',
          'website' => 'https://www.skynet.com',
          'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
        Listings::create([

          'title' => 'Junior Developer', 
          'tags' => 'laravel, php, javascript',
          'company' => 'Wonka Industries',
          'user_id'=> 1,
          'location' => 'Boston, MA',
          'email' => 'email4@email.com',
          'website' => 'https://www.wonka.com',
          'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listings::factory(100)->create();
        
    }
}
