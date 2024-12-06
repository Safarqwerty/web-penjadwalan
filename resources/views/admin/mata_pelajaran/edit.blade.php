<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Edit Mata Pelajaran
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="text-lg font-semibold mb-6 text-yellow-600">Edit Mata Pelajaran</h4>

                    <form action="{{ route('admin.mataPelajaran.update', $mataPelajaran->id) }}" method="POST"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nama Mata Pelajaran -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mata
                                Pelajaran</label>
                            <input type="text" name="nama" id="nama" value="{{ $mataPelajaran->nama }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $mataPelajaran->deskripsi }}</textarea>
                        </div>

                        <!-- Tombol Update -->
                        <button type="submit"
                            class="w-full px-6 py-3 bg-green-600 text-white text-lg font-semibold rounded-md hover:bg-green-700 transition duration-200">
                            Perbarui Mata Pelajaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
