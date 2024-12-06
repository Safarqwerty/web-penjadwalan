@section('title', 'Dashboard Siswa')

<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-semibold">Siswa Dashboard</h1>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Jadwal Kelas Section -->
        <div>
            <h2 class="text-2xl font-semibold mb-6">Jadwal Kelas</h2>

            <div class="space-y-6">
                @foreach ($jadwalKelas as $jadwal)
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 hover:shadow-md transition-all duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-indigo-700">{{ $jadwal->mataPelajaran->nama }}</h3>
                            <span class="text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('h:i A') }} -
                                {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('h:i A') }}
                            </span>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 mr-3" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-700">
                                Pengajar: <span class="font-medium">{{ $jadwal->pengajar->name }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
