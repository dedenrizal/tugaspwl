<x-layout title="Kelola Pengguna">
    <x-slot name="title">
        ours User
    </x-slot>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Pengguna</h2>

        @switch(Auth::user()->role)
            @case('Pemilik')
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">no</th>
                            <th class="py-2 px-4 border-b">Nama</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users->reject(function ($user) { return in_array($user->id_user, [1]); }) as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->nama }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @break

            @case('Manajer')
                <form action="{{ route('users.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="nama" id="nama" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select name="role" id="role" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
                                <option value="">-</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Pegawai Gudang">Pegawai Gudang</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Pengguna
                        </button>
                    </div>
                </form>

                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">no</th>
                            <th class="py-2 px-4 border-b">Nama</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Role</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users->reject(function ($user) { return in_array($user->id_user, [1,2]); }) as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->nama }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('user.edit', ['user' => $user->id_user]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('user.destroy', ['id_user' => $user->id_user]) }}" method="POST" class="inline-block">
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
            @break

            @default
                <p>why you can access this page </p>
        @endswitch
    </div>
</x-layout>
