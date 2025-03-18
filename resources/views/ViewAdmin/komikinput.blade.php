<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Komik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex">
        <div class="flex-1 p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Komik</h2>

            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <form action="{{ route('komik.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Komik -->
                    <div class="mb-4">
                        <label for="nama_komik" class="block text-gray-700 text-sm font-bold mb-2">Nama Komik:</label>
                        <input type="text" id="nama_komik" name="nama_komik" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required>
                    </div>

                    <!-- Genre -->
                    <div class="mb-4">
                        <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                        <input type="text" id="genre" name="genre" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required>
                    </div>

                    <!-- Sinopsis -->
                    <div class="mb-4">
                        <label for="sinopsis" class="block text-gray-700 text-sm font-bold mb-2">Sinopsis:</label>
                        <textarea id="sinopsis" name="sinopsis" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24" 
                            required></textarea>
                    </div>

                    <!-- Status (Premium/Free) -->
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                        <select id="status" name="status" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="1">Premium</option>
                            <option value="0">Free</option>
                        </select>
                    </div>

                    <!-- Gambar Komik -->
                    <div class="mb-4">
                        <label for="gambar_komik" class="block text-gray-700 text-sm font-bold mb-2">Gambar Komik:</label>
                        <input type="file" id="gambar_komik" name="gambar_komik" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between">
                        <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
