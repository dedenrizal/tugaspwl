<x-layout title="Proses Transaksi">
    <h2>Selamat datang, {{ Auth::user()->nama }}</h2>
    <h2 class="text-2xl font-bold mb-4">Data report</h2>

    <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        Print
    </button>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Cabang</th>
                <th class="py-2 px-4 border-b">Kasir</th>
                <th class="py-2 px-4 border-b">Barang</th>
                <th class="py-2 px-4 border-b">Jumlah</th>
                <th class="py-2 px-4 border-b">Harga</th>
                <th class="py-2 px-4 border-b">Tanggal</th>
            </tr>
        </thead>
        <tbody class="mb-6">
            @foreach($transactions as $transaction)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $transaction->branch->nama_cabang }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->user->nama }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->product->nama_barang }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->jumlah }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->total_harga }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
        @php
        $totalKeuntungan = $transactions->sum(function($transaction) {
            return $transaction->jumlah * $transaction->product->harga;
        });
        @endphp
        <p>Penjualan kita saat ini Rp. {{ number_format($totalKeuntungan, 1) }}</p>
    </table>
</x-layout>
