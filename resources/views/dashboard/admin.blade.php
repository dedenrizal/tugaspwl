<x-layout>

    <x-slot name="title">
        dashboard
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <p class="text-xl mb-4">Selamat datang, {{ Auth::user()->nama }}!</p>
        @switch(Auth::user()->role)
            @case('Pemilik')
                <p>Anda memiliki akses penuh.</p>
                <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Kelola Pengguna</a>
                <a href="{{ route('branches.index') }}" class="ml-4 text-blue-500 hover:underline">Kelola Cabang</a>
                <a href="{{ route('warehouse-stocks.index') }}" class="ml-4 text-blue-500 hover:underline">Cek Stok Gudang</a>
            @break
            @case('Manajer')
            {{-- tidak bisa update data user --}}
                <p>Berikut laporan transaksi Anda.</p>
                <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Kelola Pengguna</a>
                <a href="{{route('transaction.show')}}" class="text-blue-500 hover:underline">Lihat Laporan</a>
                <a href="{{ route('products.index') }}" class="ml-4 text-blue-500 hover:underline">Kelola Produk</a>
            @break
            @case('Supervisor')
                <p>Berikut data stok Anda.</p>
                <a href="{{route('transaction.show')}}" class="text-blue-500 hover:underline">Lihat Transaksi</a>
                <a href="{{ route('warehouse-stocks.index') }}" class="ml-4 text-blue-500 hover:underline">Cek Stok Gudang</a>
            @break
            @case('Kasir')
                <p>Mulai transaksi Anda di sini.</p>
                <a href="{{route('transactions.index')}}" class="text-blue-500 hover:underline">Tambah Transaksi</a>
            @break
            @case('Pegawai Gudang')
                <p>Berikut log stok Anda.</p>
                {{-- problem in this --}}
                <a href="{{ route('warehouse-stocks.index') }}" class="text-blue-500 hover:underline">Stok Gudang</a>
                <a href="{{ route('stock-logs.index') }}" class="ml-4 text-blue-500 hover:underline">Log Stok</a>
            @break
            @default
                <p>Role Anda tidak dikenali.</p>
            @endswitch
        </div>
</x-layout>
