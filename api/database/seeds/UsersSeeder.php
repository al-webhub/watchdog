<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Illuminate\Support\Str;
use App\Website;
use App\Scan;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     *  Number of users to seed
     * @var int
     */
    private $count = 1;

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
               $scans = factory(Scan::class, 5000)->make();
               $ws->scans()->saveMany($scans);
            });
        });

        $start_date = Carbon::createFromDate(2020, 7, 1);
        $scans = Scan::where('website_id', 1)->get();
        foreach ($scans as $scan) {
            $scan->created_at = $start_date;
            $scan->save();
            $start_date->addMinutes(15);
        }

    }
}
