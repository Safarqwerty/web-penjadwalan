<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-semibold">Pengajar Dashboard</h1>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Jadwal Kelas Section -->
        <div>
            <h2 class="text-2xl font-semibold mb-6">Jadwal Kelas</h2>

            <div class="space-y-6">
                @foreach ($jadwalKelas as $jadwal)
                    <div class="bg-white shadow-sm sm:rounded-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $jadwal->mataPelajaran->nama }}</h3>
                        </div>

                        <div class="flex justify-between">
                            <div>
                                <!-- Tambahkan Hari -->
                                <p class="text-sm text-gray-700">Hari:
                                    <span class="font-medium">{{ $jadwal->hari }}</span>
                                </p>
                                <p class="text-sm text-gray-700">Kelas:
                                    <span class="font-medium">{{ $jadwal->kelas->nama }}</span>
                                </p>
                                <p class="text-sm text-gray-700">Jadwal:
                                    <span class="text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                    </span>
                                </p>

                                <div class="mt-4">
                                    <p class="text-sm font-semibold text-gray-700 mb-2">Daftar Murid:</p>
                                    <div class="grid grid-cols-2 gap-2">
                                        @foreach ($jadwal->kelas->siswa as $siswa)
                                            <div class="text-sm text-gray-600 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 mr-2 text-gray-500" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                {{ $siswa->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
