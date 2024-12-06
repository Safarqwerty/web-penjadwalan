@section('title', 'Dashboard Admin')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2
                class="font-black text-4xl text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-pink-600 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-indigo-50 via-white to-pink-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-2xl border-4 border-indigo-100">
                <div class="p-12">
                    <div class="text-center mb-12">
                        <h1
                            class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-pink-700 mb-4 animate__animated animate__fadeIn">
                            Selamat Datang, Admin!
                        </h1>
                        <p class="text-xl text-gray-500 max-w-2xl mx-auto">
                            Kelola berbagai aspek platform pendidikan Anda dengan mudah dan efisien.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @php
                            $menus = [
                                [
                                    'title' => 'Kelas',
                                    'description' => 'Kelola semua kelas yang tersedia di platform.',
                                    'route' => 'admin.kelas.index',
                                    'color' => 'from-indigo-500 to-blue-500',
                                    'icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10Z',
                                ],
                                [
                                    'title' => 'Mata Pelajaran',
                                    'description' => 'Atur mata pelajaran untuk setiap kelas.',
                                    'route' => 'admin.mataPelajaran.index',
                                    'color' => 'from-green-500 to-teal-500',
                                    'icon' =>
                                        'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                                ],
                                [
                                    'title' => 'Jadwal',
                                    'description' => 'Atur jadwal untuk kelas dan mata pelajaran.',
                                    'route' => 'admin.jadwal.index',
                                    'color' => 'from-purple-500 to-pink-500',
                                    'icon' =>
                                        'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2Z',
                                ],
                                [
                                    'title' => 'Pengajar',
                                    'description' => 'Kelola informasi dan data pengajar.',
                                    'route' => 'admin.pengajar.index',
                                    'color' => 'from-blue-500 to-cyan-500',
                                    'icon' =>
                                        'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                                ],
                                [
                                    'title' => 'Siswa',
                                    'description' => 'Kelola data dan informasi siswa.',
                                    'route' => 'admin.siswa.index',
                                    'color' => 'from-red-500 to-orange-500',
                                    'icon' =>
                                        'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.818-.162-1.611-.458-2.343M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.818.162-1.611.458-2.343m0 0a5.002 5.002 0 019.184 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                                ],
                                [
                                    'title' => 'Kelas Siswa',
                                    'description' => 'Kelola penempatan siswa dalam kelas.',
                                    'route' => 'admin.kelas-siswa.index',
                                    'color' => 'from-amber-500 to-yellow-500',
                                    'icon' =>
                                        'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                                ],
                            ];
                        @endphp

                        @foreach ($menus as $menu)
                            <div class="group">
                                <div
                                    class="transition transform hover:scale-105 hover:shadow-2xl p-8 bg-gradient-to-br {{ $menu['color'] }} text-white rounded-2xl shadow-xl relative overflow-hidden">
                                    <div
                                        class="absolute top-0 right-0 opacity-10 group-hover:opacity-20 transition-opacity">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5"
                                                d="{{ $menu['icon'] }}" />
                                        </svg>
                                    </div>
                                    <h3 class="text-3xl font-bold mb-4 relative z-10">{{ $menu['title'] }}</h3>
                                    <p class="text-lg mb-6 opacity-80 relative z-10">{{ $menu['description'] }}</p>
                                    <a href="{{ route($menu['route']) }}"
                                        class="inline-block px-6 py-3 bg-white bg-opacity-20 text-white font-semibold rounded-lg hover:bg-opacity-30 transition duration-300 relative z-10">
                                        Lihat {{ $menu['title'] }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
