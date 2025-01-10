<x-layout title="Proses Transaksi">
    <h2>Selamat datang, {{ Auth::user()->nama }}</h2>
    <h2 class="text-2xl font-bold mb-4">Data report</h2>
    <table class="min-w-full bg-white border border-gray-200 mb-5">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">ID_stok_gudang</th>
                <th class="py-2 px-4 border-b">nama Cabang</th>
                <th class="py-2 px-4 border-b">nama Produk</th>
                <th class="py-2 px-4 border-b">nama pegawai </th>
                <th class="py-2 px-4 border-b">masuk</th>
                <th class="py-2 px-4 border-b">keluar</th>
                <th class="py-2 px-4 border-b">tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $transaction)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->id_log_stok }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->branch->nama_cabang }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->product->nama_barang }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->user->nama }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->jumlah_masuk }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->jumlah_keluar }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>


</x-layout>
