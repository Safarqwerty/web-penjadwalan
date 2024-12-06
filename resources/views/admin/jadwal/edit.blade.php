<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Edit Jadwal Kelas
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form Edit Jadwal Kelas -->
                    <h4 class="text-lg font-semibold mb-6 text-indigo-600">Edit Jadwal Kelas</h4>
                    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select name="kelas_id" id="kelas_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $k->id == $jadwal->kelas_id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="mata_pelajaran_id" class="block text-sm font-medium text-gray-700">Mata
                                Pelajaran</label>
                            <select name="mata_pelajaran_id" id="mata_pelajaran_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($mataPelajaran as $mp)
                                    <option value="{{ $mp->id }}"
                                        {{ $mp->id == $jadwal->mata_pelajaran_id ? 'selected' : '' }}>
                                        {{ $mp->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="pengajar_id" class="block text-sm font-medium text-gray-700">Pengajar</label>
                            <select name="pengajar_id" id="pengajar_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($pengajar as $p)
                                    <option value="{{ $p->id }}"
                                        {{ $p->id == $jadwal->pengajar_id ? 'selected' : '' }}>
                                        {{ $p->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                            <input type="datetime-local" name="waktu_mulai" id="waktu_mulai"
                                value="{{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('Y-m-d\TH:i') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="waktu_selesai" class="block text-sm font-medium text-gray-700">Waktu
                                Selesai</label>
                            <input type="datetime-local" name="waktu_selesai" id="waktu_selesai"
                                value="{{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('Y-m-d\TH:i') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <button type="submit"
                            class="w-full px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md hover:bg-blue-700 transition duration-200">
                            Simpan Perubahan
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
