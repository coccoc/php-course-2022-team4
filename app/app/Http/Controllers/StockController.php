<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stock = Stock::all();
        return response()->json($stock, 200);
    }

    public function store(AddStockRequest $request)
    {
        $stock = new Stock();
        $stock->fill($request->all());
        $stock->save();
        $statusCode = 201;
        if (!$stock)
            $statusCode = 404;
        return response($stock, $statusCode);

    }

    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        $statusCode = 200;
        if (!$stock)
            $statusCode = 404;
        return response()->json($stock, $statusCode);

    }
    public function update(UpdateStockRequest $request, $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->fill($request->all());
        $stock->save();
        $statusCode = 200;
        if (!$stock)
            $statusCode = 404;
        return response()->json($stock, $statusCode);
    }

    public function destroy($id)
    {
        $customer = Stock::find($id);

        if (is_null($customer)) {
            return response()->json([
                'error' => true,
                'message' => "Stock with id #$id not found",
            ], 404);
        }

        $customer->delete();

        return response()->json([
            'error' => false,
            'message' => "Stock #$id deleted",
        ], 200);
    }
}
