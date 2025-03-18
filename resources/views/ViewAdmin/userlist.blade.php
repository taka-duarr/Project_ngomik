<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen">

<!-- Navbar -->
@include('ViewAdmin.includes.navbar')

<div class="flex">
    <!-- Sidebar -->
    @include('ViewAdmin.includes.sidebar')

    <!-- Main Content -->
    <div class="container mx-auto py-8 px-4">
        <!-- Insert Button -->
        <div class="mb-6">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Insert New User</a>
        </div>

        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full ">
                <thead>
                    <tr>
                        <th class="w-1/12">ID User</th>
                        <th class="w-1/4">User</th>
                        <th class="w-1/4">Password</th>
                        <th class="w-1/4">Role</th>
                        <th class="w-1/4">Status</th>
                        <th class="w-1/6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nama_user }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->status ? 'Premium' : 'Free' }} </td>
                                <td class="flex gap-2">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-success">Update</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE') <!-- Laravel butuh ini untuk DELETE -->
                                        <button type="submit" class="btn btn-sm btn-error">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No data available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>