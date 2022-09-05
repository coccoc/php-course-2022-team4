<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountriesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $data = DB::table('countries')
        ->select("*")
        ->get();

        return response()->json([
            'countries' => $data
        ],200);
    }

    public function store(Request $request)
    {
        $reqData = $request->all();
        Country::create([
            'name' => $reqData["name"],
            'population' => $reqData["population"]
        ]);
        return "Success store data";
    }
}
