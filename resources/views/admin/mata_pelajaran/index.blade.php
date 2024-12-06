<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Daftar Mata Pelajaran
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form Tambah Mata Pelajaran -->
                    <h4 class="text-lg font-semibold mb-6 text-green-600">Tambah Mata Pelajaran</h4>
                    <form action="{{ route('admin.mataPelajaran.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md hover:bg-blue-700 transition duration-200">
                            Tambah Mata Pelajaran
                        </button>
                    </form>

                    <!-- Daftar Mata Pelajaran -->
                    <h3 class="text-lg font-semibold my-6 text-indigo-600">Daftar Mata Pelajaran</h3>
                    <table class="table-auto w-full border-collapse mb-8">
                        <thead>
                            <tr>
                                <th class="border px-6 py-3 bg-indigo-100 text-indigo-600 text-left">#</th>
                                <th class="border px-6 py-3 bg-indigo-100 text-indigo-600 text-left">Nama</th>
                                <th class="border px-6 py-3 bg-indigo-100 text-indigo-600 text-left">Deskripsi</th>
                                <th class="border px-6 py-3 bg-indigo-100 text-indigo-600 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mataPelajaran as $index => $pelajaran)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="border px-6 py-4">{{ $pelajaran->nama }}</td>
                                    <td class="border px-6 py-4">{{ $pelajaran->deskripsi }}</td>
                                    <td class="border px-6 py-4 flex space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.mataPelajaran.edit', $pelajaran->id) }}"
                                            class="text-blue-600 hover:text-blue-800">Edit</a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.mataPelajaran.destroy', $pelajaran->id) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800">Hapus</button>
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
