@props(['stocks'])

<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">No</th>
            <th class="py-2 px-4 border-b">ID Stok</th>
            <th class="py-2 px-4 border-b">Nama Cabang</th>
            <th class="py-2 px-4 border-b">Nama Produk</th>
            <th class="py-2 px-4 border-b">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $transaction)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->id_stok_gudang }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->branch->nama_cabang }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->product->nama_barang }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->jumlah }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
