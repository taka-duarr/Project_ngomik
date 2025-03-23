<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chapter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Chapter</h1>

        @if(session('success'))
            <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('chapter.update', $chapter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Chapter -->
            <div class="mb-4">
                <label for="nama_chapter" class="block text-sm font-medium text-gray-700">Nama Chapter:</label>
                <input type="text" name="nama_chapter" id="nama_chapter" 
                    value="{{ old('nama_chapter', $chapter->nama_chapter) }}" 
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
                @error('nama_chapter')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Chapter -->
            <div class="mb-4">
                <label for="file_chapter" class="block text-sm font-medium text-gray-700">File Chapter:</label>
                <input type="file" name="file_chapter" id="file_chapter" 
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
                <small class="text-gray-500 block mt-1">Upload file baru jika ingin mengganti</small>

                @if($chapter->file_chapter)
                    <p class="mt-2 text-sm">
                        <a href="{{ asset('storage/' . $chapter->file_chapter) }}" 
                           target="_blank" class="text-blue-600 underline">
                            Lihat File Saat Ini
                        </a>
                    </p>
                @endif

                @error('file_chapter')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col gap-2 sm:flex-row sm:justify-between">
                <button type="submit" class="w-full sm:w-auto px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    Update Chapter
                </button>
                <a href="{{ route('ViewAdmin.chapterlist', $chapter->id_komik) }}" 
                   class="w-full sm:w-auto px-4 py-2 text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
