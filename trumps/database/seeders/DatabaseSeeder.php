<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
        \DB::table('users')->insert([
            'name' => 'HonKit',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'created_at' =>  Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('coin_pairs')->insert([
            [
                'name' => 'BTC/USDT',
                'icon' => '',
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'ETH/USDT',
                'icon' => '',
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'ADA/USDT',
                'icon' => '',
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'BIT/USDT',
                'icon' => '',
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
