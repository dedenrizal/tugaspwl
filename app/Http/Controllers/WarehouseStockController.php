<?php

namespace App\Http\Controllers;

use App\Models\WarehouseStock;
use App\Models\Product;
use App\Models\Branch;
use Illuminate\Http\Request;

class WarehouseStockController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $branches = Branch::all();
        $stocks = WarehouseStock::with(['branch', 'product'])->get();
        return view('dashboard.warehouse-stock',compact('stocks','products', 'branches'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'id_cabang' => 'required|exists:branches,id_cabang',
            'id_barang' => 'required|exists:products,id_barang',
            'stok' => 'required|integer',
        ]);


        $stock = WarehouseStock::where('id_cabang', $validated['id_cabang'])
                                ->where('id_barang', $validated['id_barang'])
                                ->first();

        if ($stock) {

            $stock->stok += $validated['stok'];
            $stock->save();
        } else {

            $stock = WarehouseStock::create($validated);
        }

        return response()->json($stock, 201);
    }



    public function show($id)
    {
        $stock = WarehouseStock::with(['branch', 'product'])->findOrFail($id);
        return response()->json($stock);
    }

    public function update(Request $request, $id)
    {
        $stock = WarehouseStock::findOrFail($id);

        $validated = $request->validate([
            'id_cabang' => 'sometimes|exists:branches,id_cabang',
            'id_barang' => 'sometimes|exists:products,id_barang',
            'stok' => 'sometimes|integer',
        ]);

        $stock->update($validated);
        return response()->json($stock);
    }

    public function destroy($id)
    {
        $stock = WarehouseStock::findOrFail($id);
        $stock->delete();
        return response()->json(['message' => 'Warehouse stock deleted']);
    }
}
