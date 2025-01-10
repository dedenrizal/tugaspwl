<x-layout>
    <form action="{{ route('branch.update', ['id_branch' => $branches->id_cabang]) }}" method="POST" class="mb-4">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div>
            <label for="nama_cabang" class="block text-sm font-medium text-gray-700">Nama Cabang</label>
            <input type="text" name="nama_cabang" id="nama_cabang" class="mt-1 p-2 block w-full border-gray-300 rounded-md" value="{{ $branches->nama_cabang }}">
        </div>
        <div>
            <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
            <input type="text" name="kota" id="kota" class="mt-1 p-2 block w-full border-gray-300 rounded-md" value="{{ $branches->kota }}">
        </div>
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="mt-1 p-2 block w-full border-gray-300 rounded-md" value="{{ $branches->alamat }}">
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Update Cabang
        </button>
    </div>
</form>
</x-layout>
