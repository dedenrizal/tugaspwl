<x-layout title="Kelola Pengguna">
    <x-slot name="title">
        Ours Branch
    </x-slot>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Cabang</h2>

        <form action="{{ route('branches.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div>
                    <label for="nama_cabang" class="block text-sm font-medium text-gray-700">Nama Cabang</label>
                    <input type="text" name="nama_cabang" id="nama_cabang" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                    <input type="text" name="kota" id="kota" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Cabang
                </button>
            </div>
        </form>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">no</th>
                    <th class="py-2 px-4 border-b">id_cabang</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Kota</th>
                    <th class="py-2 px-4 border-b">Alamat</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($branches as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->id_cabang }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->nama_cabang }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->kota }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->alamat }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('branch.edit', ['branch' => $user->id_cabang]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                Edit
                            </a>
                            <form action="{{route('branch.destroy', ['id_cabang' => $user->id_cabang])}}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
