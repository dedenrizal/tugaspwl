<x-layout title="Proses Transaksi">
    <h2>Selamat datang, {{ Auth::user()->nama }}</h2>
    <h2 class="text-2xl font-bold mb-4">Data report</h2>

    <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        Print
    </button>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Id</th>
                <th class="py-2 px-4 border-b">Nama Barang</th>
                <th class="py-2 px-4 border-b">Kategori</th>
                <th class="py-2 px-4 border-b">Harga</th>
                <th class="py-2 px-4 border-b">Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $transaction)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->id_barang }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->nama_barang }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->kategori }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->harga }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
