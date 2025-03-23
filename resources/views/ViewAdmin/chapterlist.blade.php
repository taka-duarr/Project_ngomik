<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Chapter - {{ $komik->nama_komik }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Daftar Chapter - <span class="text-blue-600">{{ $komik->nama_komik }}</span></h1>
        
        <a href="{{ route('chapter.create', $komik->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Tambah Chapter</a>
        
        @if(session('success'))
            <div class="mt-4 p-3 bg-green-200 text-green-800 rounded-md">{{ session('success') }}</div>
        @endif
        
        <div class="mt-6 overflow-hidden rounded-lg border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3 border-b">No</th>
                        <th class="p-3 border-b">Nama Chapter</th>
                        <th class="p-3 border-b">File Chapter</th>
                        <th class="p-3 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapters as $key => $chapter)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-3">{{ $key + 1 }}</td>
                            <td class="p-3">{{ $chapter->nama_chapter }}</td>
                            <td class="p-3">{{ $chapter->file_chapter }}</td>
                            <td class="p-3">
                            <div class="flex flex-col sm:flex-row gap-2">
                                <!-- Tombol Hapus -->
                                <form action="{{ route('chapter.destroy', $chapter->id) }}" method="POST" 
                                    onsubmit="return confirm('Hapus chapter ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>

                                <!-- Tombol Update -->
                                <a href="{{ route('chapter.edit', $chapter->id) }}" 
                                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 transition text-center">
                                    Update
                                </a>
                            </div>
                        </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>