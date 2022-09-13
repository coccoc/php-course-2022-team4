<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $INITIAL_BALANCE = 100000;

        DB::table('clients')->insert([
            [ 'name' => 'Tuyet', 'username' => 'tuyet',
                'password' => Hash::make('password'), 'balance' =>  $INITIAL_BALANCE ],
            [ 'name' => 'Lam', 'username' => 'lam',
            'password' => Hash::make('password'), 'balance' =>  $INITIAL_BALANCE ],
            [ 'name' => 'Khoi', 'username' => 'khoi',
            'password' => Hash::make('password'), 'balance' =>  $INITIAL_BALANCE ],
            [ 'name' => 'Dung', 'username' => 'dung',
            'password' => Hash::make('password'), 'balance' =>  $INITIAL_BALANCE ]
        ]);

        DB::table('stocks')->insert([
            [ 'name' => 'Vinamilk', 'alias' => 'VNM', 'total_amount' => 1000000, 'init_price' => 5 ],
            [ 'name' => 'Apple', 'alias' => 'AAPL', 'total_amount' => 1000000, 'init_price' => 4 ],
            [ 'name' => 'Tesla', 'alias' => 'TSLA', 'total_amount' => 1000000, 'init_price' => 7 ],
            [ 'name' => 'Coccoc', 'alias' => 'COC', 'total_amount' => 1000000, 'init_price' => 5 ],
        ]);

        //Initial stock to sell
        DB::table('clients_to_stocks')->insert([
            ['client_id' => 1, 'stock_id' => 1, 'amount' => 1000],
            ['client_id' => 1, 'stock_id' => 2, 'amount' => 1000],
            ['client_id' => 2, 'stock_id' => 3, 'amount' => 1000],
            ['client_id' => 2, 'stock_id' => 4, 'amount' => 1000],
            ['client_id' => 3, 'stock_id' => 1, 'amount' => 1000],
            ['client_id' => 3, 'stock_id' => 2, 'amount' => 1000],
            ['client_id' => 4, 'stock_id' => 3, 'amount' => 1000],
            ['client_id' => 4, 'stock_id' => 4, 'amount' => 1000],
        ]);
    }
}
