<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex-1 p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Komik</h2>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('komik.update', $komik->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Komik -->
                <div class="mb-4">
                    <label for="nama_komik" class="block text-gray-700 text-sm font-bold mb-2">Nama Komik:</label>
                    <input type="text" id="nama_komik" name="nama_komik" value="{{ $komik->nama_komik }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <!-- Genre -->
                <div class="mb-4">
                    <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                    <input type="text" id="genre" name="genre" value="{{ $komik->genre }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <!-- Sinopsis -->
                <div class="mb-4">
                    <label for="sinopsis" class="block text-gray-700 text-sm font-bold mb-2">Sinopsis:</label>
                    <textarea id="sinopsis" name="sinopsis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>{{ $komik->sinopsis }}</textarea>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select id="status" name="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="1" {{ $komik->status ? 'selected' : '' }}>Premium</option>
                        <option value="0" {{ !$komik->status ? 'selected' : '' }}>Free</option>
                    </select>
                </div>

                <!-- Gambar Komik -->
                <div class="mb-4">
                    <label for="gambar_komik" class="block text-gray-700 text-sm font-bold mb-2">Gambar Komik:</label>
                    <input type="file" id="gambar_komik" name="gambar_komik"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if ($komik->gambar_komik)
                        <img src="{{ asset('storage/img_komik/' . $komik->gambar_komik) }}" alt="Gambar Komik" class="mt-2 w-32">
                    @endif
                </div>

                <!-- Tombol Submit -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
