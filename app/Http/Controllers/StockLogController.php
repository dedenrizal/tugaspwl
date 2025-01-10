<?php

namespace App\Http\Controllers;

use App\Models\StockLog;
use Illuminate\Http\Request;

class StockLogController extends Controller
{
    public function index()
    {
        $stocks = StockLog::with(['branch', 'product', 'user'])->get();
        return view('dashboard.stock-log', compact('stocks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:branches,id_cabang',
            'id_barang' => 'required|exists:products,id_barang',
            'id_pegawai_gudang' => 'required|exists:users,id_user',
            'stok_masuk' => 'required|integer',
            'stok_keluar' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $log = StockLog::create($validated);
        return response()->json($log, 201);
    }

    public function show($id)
    {
        $log = StockLog::with(['branch', 'product', 'user'])->findOrFail($id);
        return response()->json($log);
    }

    public function update(Request $request, $id)
    {
        $log = StockLog::findOrFail($id);

        $validated = $request->validate([
            'id_cabang' => 'sometimes|exists:branches,id_cabang',
            'id_barang' => 'sometimes|exists:products,id_barang',
            'id_pegawai_gudang' => 'sometimes|exists:users,id_user',
            'stok_masuk' => 'sometimes|integer',
            'stok_keluar' => 'sometimes|integer',
            'tanggal' => 'sometimes|date',
        ]);

        $log->update($validated);
        return response()->json($log);
    }

    public function destroy($id)
    {
        $log = StockLog::findOrFail($id);
        $log->delete();
        return response()->json(['message' => 'Stock log deleted']);
    }
}
