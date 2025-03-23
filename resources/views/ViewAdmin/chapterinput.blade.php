<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Chapter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
    <h1 class="text-xl font-bold mb-4">Tambah Chapter untuk {{ $komik->nama_komik }}</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-700 p-2 my-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chapter.store', $komik->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nama_chapter" class="block text-gray-700">Nama Chapter:</label>
            <input type="text" id="nama_chapter" name="nama_chapter" class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label for="file_chapter" class="block text-gray-700">Upload File Chapter:</label>
            <input type="file" id="file_chapter" name="file_chapter" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</body>
</html>
