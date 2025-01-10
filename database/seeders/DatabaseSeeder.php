<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk tabel Users
        DB::table('users')->insert([
            ['nama' => 'Jayusman🗿', 'email' => 'jayusman@example.com', 'password' => Hash::make('password'), 'role' => 'Pemilik'],
            ['nama' => 'Manajer A', 'email' => 'manajera@example.com', 'password' => Hash::make('password'), 'role' => 'Manajer'],
            ['nama' => 'Supervisor A', 'email' => 'supervisora@example.com', 'password' => Hash::make('password'), 'role' => 'Supervisor'],
            ['nama' => 'siti Kasir A', 'email' => 'kasira@example.com', 'password' => Hash::make('password'), 'role' => 'Kasir'],
            ['nama' => 'ahmad Kasir B', 'email' => 'kasirb@example.com', 'password' => Hash::make('password'), 'role' => 'Kasir'],
            ['nama' => 'saeful Kasir C', 'email' => 'kasirc@example.com', 'password' => Hash::make('password'), 'role' => 'Kasir'],
            ['nama' => 'Gudang A', 'email' => 'gudanga@example.com', 'password' => Hash::make('password'), 'role' => 'Pegawai Gudang'],
            ['nama' => 'Gudang B', 'email' => 'gudangb@example.com', 'password' => Hash::make('password'), 'role' => 'Pegawai Gudang'],
            ['nama' => 'Gudang C', 'email' => 'gudangc@example.com', 'password' => Hash::make('password'), 'role' => 'Pegawai Gudang'],
        ]);

        // Seeder untuk tabel Branches
        DB::table('branches')->insert([
            ['nama_cabang' => 'Cabang 1', 'kota' => 'Jakarta', 'alamat' => 'Jl. Kebon Kacang'],
            ['nama_cabang' => 'Cabang 2', 'kota' => 'Bandung', 'alamat' => 'Jl. Braga'],
            ['nama_cabang' => 'Cabang 3', 'kota' => 'Surabaya', 'alamat' => 'Jl. Tunjungan'],
        ]);

        // Seeder untuk tabel Products
        DB::table('products')->insert([
            ['nama_barang' => 'Produk A', 'kategori' => 'Kategori 1', 'harga' => 10000, 'stok' => 50],
            ['nama_barang' => 'Produk B', 'kategori' => 'Kategori 2', 'harga' => 20000, 'stok' => 30],
            ['nama_barang' => 'Produk C', 'kategori' => 'Kategori 1', 'harga' => 15000, 'stok' => 20],
        ]);

        // Seeder untuk tabel Transactions
        DB::table('transactions')->insert([
            ['id_cabang' => 1, 'id_kasir' => 4, 'id_barang' => 1, 'jumlah' => 5, 'total_harga' => 50000, 'tanggal' => now()],
            ['id_cabang' => 1, 'id_kasir' => 4, 'id_barang' => 2, 'jumlah' => 3, 'total_harga' => 60000, 'tanggal' => now()],
            ['id_cabang' => 1, 'id_kasir' => 4, 'id_barang' => 3, 'jumlah' => 2, 'total_harga' => 30000, 'tanggal' => now()],
            ['id_cabang' => 2, 'id_kasir' => 5, 'id_barang' => 1, 'jumlah' => 5, 'total_harga' => 50000, 'tanggal' => now()],
            ['id_cabang' => 2, 'id_kasir' => 5, 'id_barang' => 2, 'jumlah' => 3, 'total_harga' => 60000, 'tanggal' => now()],
            ['id_cabang' => 2, 'id_kasir' => 5, 'id_barang' => 3, 'jumlah' => 2, 'total_harga' => 30000, 'tanggal' => now()],
            ['id_cabang' => 3, 'id_kasir' => 6, 'id_barang' => 1, 'jumlah' => 5, 'total_harga' => 50000, 'tanggal' => now()],
            ['id_cabang' => 3, 'id_kasir' => 6, 'id_barang' => 2, 'jumlah' => 3, 'total_harga' => 60000, 'tanggal' => now()],
            ['id_cabang' => 3, 'id_kasir' => 6, 'id_barang' => 3, 'jumlah' => 2, 'total_harga' => 30000, 'tanggal' => now()],
        ]);

        // Seeder untuk tabel Warehouse_Stocks
        DB::table('warehouse_stocks')->insert([
            ['id_cabang' => 1, 'id_barang' => 1, 'jumlah' => 100],
            ['id_cabang' => 1, 'id_barang' => 2, 'jumlah' => 200],
            ['id_cabang' => 1, 'id_barang' => 3, 'jumlah' => 150],
            ['id_cabang' => 2, 'id_barang' => 1, 'jumlah' => 100],
            ['id_cabang' => 2, 'id_barang' => 2, 'jumlah' => 217],
            ['id_cabang' => 2, 'id_barang' => 3, 'jumlah' => 150],
            ['id_cabang' => 3, 'id_barang' => 1, 'jumlah' => 100],
            ['id_cabang' => 3, 'id_barang' => 2, 'jumlah' => 200],
            ['id_cabang' => 3, 'id_barang' => 3, 'jumlah' => 150],
        ]);

        // Seeder untuk tabel Stock_Logs
        DB::table('stock_logs')->insert([
            ['id_cabang' => 1, 'id_barang' => 1, 'id_pegawai_gudang' => 7, 'jumlah_masuk' => 50, 'jumlah_keluar' => 10, 'tanggal' => now()],
            ['id_cabang' => 1, 'id_barang' => 2, 'id_pegawai_gudang' => 7, 'jumlah_masuk' => 50, 'jumlah_keluar' => 10, 'tanggal' => now()],
            ['id_cabang' => 1, 'id_barang' => 3, 'id_pegawai_gudang' => 7, 'jumlah_masuk' => 50, 'jumlah_keluar' => 10, 'tanggal' => now()],
            ['id_cabang' => 2, 'id_barang' => 1, 'id_pegawai_gudang' => 8, 'jumlah_masuk' => 60, 'jumlah_keluar' => 20, 'tanggal' => now()],
            ['id_cabang' => 2, 'id_barang' => 2, 'id_pegawai_gudang' => 8, 'jumlah_masuk' => 60, 'jumlah_keluar' => 20, 'tanggal' => now()],
            ['id_cabang' => 2, 'id_barang' => 3, 'id_pegawai_gudang' => 8, 'jumlah_masuk' => 60, 'jumlah_keluar' => 20, 'tanggal' => now()],
            ['id_cabang' => 3, 'id_barang' => 1, 'id_pegawai_gudang' => 9, 'jumlah_masuk' => 70, 'jumlah_keluar' => 30, 'tanggal' => now()],
            ['id_cabang' => 3, 'id_barang' => 2, 'id_pegawai_gudang' => 9, 'jumlah_masuk' => 70, 'jumlah_keluar' => 30, 'tanggal' => now()],
            ['id_cabang' => 3, 'id_barang' => 3, 'id_pegawai_gudang' => 9, 'jumlah_masuk' => 70, 'jumlah_keluar' => 30, 'tanggal' => now()],
        ]);
    }
}
