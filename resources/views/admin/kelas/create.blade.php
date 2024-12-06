<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ isset($kelas) ? __('Edit Kelas') : __('Tambah Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($kelas) ? route('admin.kelas.update', $kelas) : route('admin.kelas.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($kelas))
                            @method('PUT')
                        @endif

                        <!-- Input Nama Kelas -->
                        <div class="mb-6">
                            <label for="nama" class="block text-lg font-medium text-gray-700">Nama Kelas:</label>
                            <input type="text" name="nama" value="{{ $kelas->nama ?? '' }}"
                                class="mt-2 px-4 py-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                required>
                            @error('nama')
                                <div class="text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-lg font-medium text-gray-700">Deskripsi:</label>
                            <textarea name="deskripsi"
                                class="mt-2 px-4 py-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ $kelas->deskripsi ?? '' }}</textarea>
                            @error('deskripsi')
                                <div class="text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-8">
                            <button type="submit"
                                class="px-6 py-3 bg-indigo-600 text-white text-lg font-semibold rounded-lg hover:bg-indigo-700 transition duration-200">
                                {{ isset($kelas) ? 'Perbarui' : 'Simpan' }}
                            </button>
                            <a href="{{ route('admin.kelas.index') }}"
                                class="ml-4 px-6 py-3 bg-gray-600 text-white text-lg font-semibold rounded-lg hover:bg-gray-700 transition duration-200">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
