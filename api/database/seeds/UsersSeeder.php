<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     *  Number of users to seed
     * @var int
     */
    private $count = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // admin user
        $user = User::create([
           'name' => 'admin',
           'email' => 'admin@admin.com',
           'password' => Hash::make('123456'),
            'remember_token' => Str::random(10)
        ]);

        $users = factory(User::class, $this->count)->create();
    }
}
