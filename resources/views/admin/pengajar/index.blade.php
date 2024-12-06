<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengajar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Form Tambah Pengajar -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Tambah Pengajar</h3>
                        <form action="{{ route('admin.pengajar.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    required>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    required>
                            </div>
                            <div>
                                <button type="submit"
                                    class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-200">
                                    Tambah Pengajar
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tabel Daftar Pengajar -->
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Pengajar</h3>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajar as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->name }}</td>
                                    <td class="border px-4 py-2">{{ $item->email }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('admin.pengajar.edit', $item->id) }}"
                                            class="text-blue-600 hover:text-blue-800">Edit</a>
                                        <form action="{{ route('admin.pengajar.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengajar ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
