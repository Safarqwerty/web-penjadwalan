<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Manajemen Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-6">
                        <a href="{{ route('admin.kelas.create') }}"
                            class="inline-block px-6 py-3 bg-indigo-600 text-white text-lg font-semibold rounded-lg hover:bg-indigo-700 transition duration-200">Tambah
                            Kelas</a>
                    </div>

                    @if ($kelas->isEmpty())
                        <p class="text-center text-gray-600">Kelas masih kosong</p>
                    @else
                        <div class="space-y-6">
                            @foreach ($kelas as $kelasItem)
                                <div class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                    <h3 class="text-2xl font-semibold text-indigo-600">{{ $kelasItem->nama }}</h3>
                                    <p class="text-gray-700 mt-2">{{ $kelasItem->deskripsi }}</p>
                                    <div class="mt-4 space-x-4">
                                        <a href="{{ route('admin.kelas.edit', $kelasItem) }}"
                                            class="inline-block px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition duration-200">Edit</a>

                                        <form action="{{ route('admin.kelas.destroy', $kelasItem) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
