<x-layout title="Kelola Pengguna">
    <x-slot name="title">
        Our Users
    </x-slot>
    <form action="{{ route('user.update', ['id_user' => $user->id_user]) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                    <option value="">-</option>
                    <option value="Kasir" {{ old('role', $user->role) == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                    <option value="Supervisor" {{ old('role', $user->role) == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                    <option value="Pegawai Gudang" {{ old('role', $user->role) == 'Pegawai Gudang' ? 'selected' : '' }}>Pegawai Gudang</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Update Pengguna
            </button>
        </div>
    </form>
</x-layout>
