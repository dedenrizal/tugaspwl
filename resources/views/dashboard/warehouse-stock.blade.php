<x-layout title="Proses Transaksi">
    <h2>Selamat datang, {{ Auth::user()->nama }}</h2>
    <h2 class="text-2xl font-bold mb-4">Data Report</h2>

    @switch(Auth::user()->role)
        @case('Supervisor')
        @case('Pemilik')
            <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                Print
            </button>
            <x-data-table :stocks="$stocks" />
            @break

        @case('Pegawai Gudang')
        <form action="{{ route('warehouse-stock.store') }}" method="POST" class="mb-12">
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div>
                    <label for="id_cabang" class="block text-sm font-medium text-gray-700">Cabang</label>
                    <select name="id_cabang" id="id_cabang" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                        <option value="">Pilih cabang</option>
                        @foreach ($branches as $branch)
                        <option value="{{ $branch->id_cabang }}">{{ $branch->nama_cabang }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="id_barang" class="block text-sm font-medium text-gray-700">Produk</label>
                    <select name="id_barang" id="id_barang" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                        <option value="">Pilih produk</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id_barang }}">{{ $product->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Stok
                </button>
            </div>
        </form>

            <x-data-table :stocks="$stocks" />
            @break

        @default
    @endswitch
</x-layout>

