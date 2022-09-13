<?php

namespace Database\Seeders;

use App\Models\Stock;
// use Carbon\Carbon;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        $randomAmount = mt_rand(10,99);
        //        $randomPrice = mt_rand(10,99)*10000;
        //        DB::table('stocks')->insert([
        //            'name' => Str::random(10),
        //            'alias' => Str::random(15),
        //            'total_amount' => $randomAmount,
        //            'init_price' => $randomPrice,
        //            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        //        ]);

        Stock::factory()->count(99)->create();

    }
}
