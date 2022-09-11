<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends \Illuminate\Routing\Controller
{
    public function create(Request $request)
    {
        echo "<h2>PHP is fun!</h2>";
        $reqData = $request->all();
        DB::table('stocks')->insert([
//            'id' => $reqData['id'],
            'name' => $reqData['name'],
            'alias' => $reqData['alias'],
            'total_amount' => $reqData['total_amount'],
            'init_price' => $reqData['init_price'],
//            'created_at' => $reqData['created_at'],
//            'updated_at' => $reqData['updated_at']
        ]);
    }
}
