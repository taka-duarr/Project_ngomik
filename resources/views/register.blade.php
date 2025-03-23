<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4">Register</h2>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_user" class="block">Nama User:</label>
                <input type="text" name="nama_user" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="password" class="block">Password:</label>
                <input type="password" name="password" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" required class="w-full p-2 border rounded">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Register</button>
            <p class="text-center mt-4">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login</a></p>
        </form>
    </div>
</body>
</html>
