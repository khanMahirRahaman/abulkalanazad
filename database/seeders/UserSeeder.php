<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'       => 'Mark Otto',
            'username'   => 'superadmin',
            'email'      => 'superadmin@retenvi.com',
            'password'   => Hash::make('superadmin123'),
            'occupation' => 'SuperAdmin',
            'photo'      => 'mark-otto.jpg',
			'language'   => 1
        ])->assignRole('super-admin');

        $admin = User::create([
            'name'       => 'John Doe',
            'username'   => 'admin',
            'email'      => 'admin@retenvi.com',
            'password'   => Hash::make('admin123'),
            'occupation' => 'Admin',
            'photo'      => 'john-doe.jpg',
            'about'      => 'someone who likes to write and teach',
			'language'   => 1
        ])->assignRole('admin');

        $admin->socialmedia()->attach([
            1 => ['url' => 'https://www.facebook.com/johndoe'],
            2 => ['url' => 'https://www.twitter.com/johndoe'],
            3 => ['url' => 'https://www.youtube.com/c/johndoe'],
            4 => ['url' => 'https://www.instagram.com/johndoe'],
        ]);

        User::create([
            'name'       => 'Jacob Thornton',
            'username'   => 'author',
            'email'      => 'author@retenvi.com',
            'password'   => Hash::make('author123'),
            'occupation' => 'Author',
            'photo'      => 'jacob-thornton.jpg',
			'language'   => 1
        ])->assignRole('author');
    }
}
