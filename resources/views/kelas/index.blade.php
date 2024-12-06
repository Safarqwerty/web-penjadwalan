<h1 class="text-2xl font-bold mb-4">Manajemen Kelas</h1>
<a href="{{ route('admin.kelas.create') }}" class="text-white bg-blue-500 px-4 py-2 rounded">Tambah Kelas</a>
<ul class="mt-4 space-y-2">
    @foreach ($kelas as $kelasItem)
        <li class="p-4 border rounded shadow">
            <h3 class="text-lg font-semibold">{{ $kelasItem->nama }}</h3>
            <p class="text-gray-600">{{ $kelasItem->deskripsi }}</p>
            <p class="text-sm text-gray-500">Jadwal: {{ $kelasItem->jadwal }}</p>
            <a href="{{ route('admin.kelas.edit', $kelasItem) }}" class="text-blue-500">Edit</a>
            <form action="{{ route('admin.kelas.destroy', $kelasItem) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>
