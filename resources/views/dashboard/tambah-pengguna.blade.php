<x-layout title="Tambah User">
    <h2 class="text-2xl font-bold mb-4">Tambah User</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama:</label>
            <input type="text" name="nama" id="nama" class="border-gray-300 rounded w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" name="email" id="email" class="border-gray-300 rounded w-full" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password:</label>
            <input type="password" name="password" id="password" class="border-gray-300 rounded w-full" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role:</label>
            <input type="text" name="role" id="role" class="border-gray-300 rounded w-full" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>
</x-layout>
