<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Update User</h2>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">

                @csrf
                @method('PUT') <!-- Laravel membutuhkan ini untuk method PUT -->

                <!-- Input Hidden untuk ID User -->
                <input type="hidden" name="id" value="{{ $user->id }}">

                <!-- Nama User -->
                <div class="mb-4">
                    <label for="nama_user" class="block text-gray-700 text-sm font-bold mb-2">Nama User:</label>
                    <input type="text" id="nama_user" name="nama_user" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        required value="{{ old('nama_user', $user->nama_user) }}">
                </div>

                <!-- Password (Opsional) -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password (Opsional):</label>
                    <input type="password" id="password" name="password" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password</small>
                </div>

                <!-- Role (Tanpa Database) -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                    <select id="role" name="role" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Pilih Role</option>
                        @php
                            $roles = ['Admin', 'User'];
                        @endphp
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select id="status" name="status" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="1" {{ $user->status ? 'selected' : '' }}>Premium</option>
                        <option value="0" {{ !$user->status ? 'selected' : '' }}>Free</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="flex items-center justify-between">
                    <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
