<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{


    public function index()
    {
        $transactions = Transaction::with(['user', 'branch', 'product'])->get();
        $branches = Branch::get();
        $products = Product::get();
        return view('dashboard.kasir', compact('transactions', 'branches', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:branches,id_cabang',
            'id_barang' => 'required|exists:products,id_barang',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $product = Product::find($validated['id_barang']);

        if ($product->stok < $validated['jumlah']) {
            return redirect()->back()->withErrors(['jumlah' => 'Stok produk tidak mencukupi.']);
        }

        $totalHarga = $product->harga * $validated['jumlah'];

        $transaction = Transaction::create([
            'id_cabang' => $validated['id_cabang'],
            'id_barang' => $validated['id_barang'],
            'jumlah' => $validated['jumlah'],
            'total_harga' => $totalHarga,
            'tanggal' => $validated['tanggal'],
            'id_kasir' => Auth::id(),
        ]);

        $product->stok -= $validated['jumlah'];
        $product->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan, dan stok telah diperbarui.');
    }





    public function show()
    {
        $transactions = Transaction::with(['user', 'branch', 'product'])->get();
        return view('dashboard.transactionreport', compact('transactions'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'id_kasir' => 'sometimes|exists:users,id_user',
            'id_cabang' => 'sometimes|exists:branches,id_cabang',
            'id_barang' => 'sometimes|exists:products,id_barang',
            'jumlah' => 'sometimes|integer',
            'total_harga' => 'sometimes|numeric',
            'tanggal_transaksi' => 'sometimes|date',
        ]);

        $transaction->update($validated);
        return response()->json($transaction);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted']);
    }
}
