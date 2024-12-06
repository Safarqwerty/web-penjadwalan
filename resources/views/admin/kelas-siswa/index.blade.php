<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-semibold">Daftar Kelas Siswa</h1>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Form untuk Menambahkan Siswa ke Kelas -->
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Tambah Siswa ke Kelas</h3>
            <form action="{{ route('admin.kelas-siswa.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select id="kelas_id" name="kelas_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Siswa</label>
                        <select id="user_id" name="user_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Pilih Siswa</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-200">
                        Tambah Siswa ke Kelas
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Daftar Kelas Siswa -->
        <div class="mt-6 bg-white shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Kelas Siswa</h3>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Kelas</th>
                        <th class="px-4 py-2">Nama Siswa</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelasSiswa as $ks)
                        <tr>
                            <td class="border px-4 py-2">{{ $ks->kelas->nama }}</td>
                            <td class="border px-4 py-2">{{ $ks->siswa->name }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex space-x-2">
                                    <form action="{{ route('admin.kelas-siswa.destroy', $ks->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus hubungan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
