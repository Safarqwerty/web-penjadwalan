<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Daftar Jadwal Kelas
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form Tambah Jadwal Kelas -->
                    <h4 class="text-lg font-semibold mb-6 text-green-600">Tambah Jadwal Kelas</h4>
                    <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="mb-4">
                            <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select name="kelas_id" id="kelas_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="mata_pelajaran_id" class="block text-sm font-medium text-gray-700">Mata
                                Pelajaran</label>
                            <select name="mata_pelajaran_id" id="mata_pelajaran_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($mataPelajaran as $mp)
                                    <option value="{{ $mp->id }}">{{ $mp->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="pengajar_id" class="block text-sm font-medium text-gray-700">Pengajar</label>
                            <select name="pengajar_id" id="pengajar_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($pengajar as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                            <select name="hari" id="hari"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" id="waktu_mulai"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="waktu_selesai" class="block text-sm font-medium text-gray-700">Waktu
                                Selesai</label>
                            <input type="time" name="waktu_selesai" id="waktu_selesai"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <button type="submit"
                            class="w-full px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md hover:bg-blue-700 transition duration-200">
                            Tambah Jadwal Kelas
                        </button>
                    </form>

                    <!-- Daftar Jadwal Kelas -->
                    <h3 class="text-lg font-semibold my-6 text-indigo-600">Daftar Jadwal Kelas</h3>

                    <table class="table-auto w-full border-collapse mb-8">
                        <thead>
                            <tr class="bg-indigo-100">
                                <th class="border px-6 py-3 text-indigo-600 text-left">#</th>
                                <th class="border px-6 py-3 text-indigo-600 text-left">Kelas</th>
                                <th class="border px-6 py-3 text-indigo-600 text-left">Mata Pelajaran</th>
                                <th class="border px-6 py-3 text-indigo-600 text-left">Pengajar</th>
                                <th class="border px-6 py-3 text-indigo-600 text-left">Hari</th>
                                <th class="border px-6 py-3 text-indigo-600 text-left">Waktu Mulai</th>
                                <th class="border px-6 py-3 text-indigo-600 text-left">Waktu Selesai</th>
                                <th class="border px-6 py-3 text-indigo-600 text-left">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jadwal as $index => $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="border px-6 py-4">{{ $item->kelas->nama }}</td>
                                    <td class="border px-6 py-4">{{ $item->mataPelajaran->nama }}</td>
                                    <td class="border px-6 py-4">{{ $item->pengajar->name }}</td>
                                    <td class="border px-6 py-4">{{ $item->hari }}</td>
                                    <td class="border px-6 py-4">
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu_mulai)->format('H:i') }}
                                    </td>
                                    <td class="border px-6 py-4">
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu_selesai)->format('H:i') }}
                                    </td>
                                    <td class="border px-6 py-4">
                                        <a href="{{ route('admin.jadwal.edit', $item->id) }}"
                                            class="text-indigo-600 hover:text-indigo-800 mr-3">Edit</a>
                                        <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')"
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
