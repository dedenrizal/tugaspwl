<x-layout title="Proses Transaksi">
    <h2>Selamat datang, {{ Auth::user()->nama }}</h2>
    <h2 class="text-2xl font-bold mb-4">Input Transaksi</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Cabang</th>
                    <th class="py-2 px-4 border-b">Kasir</th>
                    <th class="py-2 px-4 border-b">Barang</th>
                    <th class="py-2 px-4 border-b">Jumlah</th>
                    <th class="py-2 px-4 border-b">Harga</th>
                    <th class="py-2 px-4 border-b">Total</th>
                    <th class="py-2 px-4 border-b">Tanggal</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">
                        <select name="id_cabang" class="border-gray-300 rounded">
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id_cabang }}">{{ $branch->nama_cabang }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <input type="hidden" name="id_kasir" value="{{ Auth::id() }}">
                        <span>{{ Auth::user()->nama }}</span>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <select name="id_barang" id="product-select" class="border-gray-300 rounded" onchange="updatePriceAndTotal()">
                            <option value="" data-harga="0">Pilih Barang</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id_barang }}" data-harga="{{ $product->harga }}">{{ $product->nama_barang }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <input type="number" name="jumlah" id="jumlah-input" class="border-gray-300 rounded w-full" min="1" required oninput="updateTotal()">
                    </td>
                    <td class="py-2 px-4 border-b">
                        <input type="text" id="harga-display" class="border-gray-300 rounded w-full bg-gray-100" readonly>
                        <input type="hidden" name="harga" id="harga-input">
                    </td>
                    <td class="py-2 px-4 border-b">
                        <input type="text" id="total-display" class="border-gray-300 rounded w-full bg-gray-100" readonly>
                        <input type="hidden" name="total_harga" id="total-input">
                    </td>
                    <td class="py-2 px-4 border-b">
                        <input type="date" name="tanggal" class="border-gray-300 rounded w-full" required>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                            Simpan
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <script>
        function updatePriceAndTotal() {
            const productSelect = document.getElementById('product-select');
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');

            document.getElementById('harga-input').value = harga;
            document.getElementById('harga-display').value = new Intl.NumberFormat().format(harga);

            updateTotal();
        }

        function updateTotal() {
            const harga = document.getElementById('harga-input').value || 0;
            const jumlah = document.getElementById('jumlah-input').value || 0;
            const total = harga * jumlah;

            // Set total input dan display
            document.getElementById('total-input').value = total;
            document.getElementById('total-display').value = new Intl.NumberFormat().format(total);
        }
    </script>


</x-layout>
