<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Illuminate\Support\Str;
use App\Website;
use App\Scan;

class UsersSeeder extends Seeder
{
    /**
     *  Number of users to seed
     * @var int
     */
    private $count = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin user
        $user = User::create([
           'name' => 'admin',
           'email' => 'admin@admin.com',
           'password' => '123456',
           'remember_token' => Str::random(10)
        ]);

        factory(User::class, $this->count)->create()->each(function ($user){
            $websites = factory(Website::class, 1)->make();
            $user->websites()->saveMany($websites);
            $websites->each(function ($ws) {
               $scans = factory(Scan::class, 30000)->make();
               $ws->scans()->saveMany($scans);
            });
        });
    }
}
