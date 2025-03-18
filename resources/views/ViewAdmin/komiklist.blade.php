<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Komik</title>
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
            <a href="{{ route('komik.create') }}" class="btn btn-primary">Insert New Komik</a>
        </div>

        <!-- Komik Table -->
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID Komik</th>
                        <th>Nama Komik</th>
                        <th>Genre</th>
                        <th>Gambar Komik</th>
                        <th>Sinopsis</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($komiks->isNotEmpty())
                        @foreach ($komiks as $komik)
                            <tr>
                                <td>{{ $komik->id }}</td>
                                <td>{{ $komik->nama_komik }}</td>
                                <td>{{ $komik->genre }}</td>
                                <td>
                                    <img src="{{ asset('storage/img_komik/' . $komik->gambar_komik) }}" alt="Gambar Komik" class="w-20 h-20 object-cover">
                                </td>
                                <td>{{ Str::limit($komik->sinopsis, 50) }}</td>
                                <td>{{ $komik->status ? 'Premium' : 'Free' }}</td>
                                <td class="flex gap-2">
                                    <a href="{{ route('komik.edit', $komik->id) }}" class="btn btn-sm btn-success">Update</a>
                                    <form action="{{ route('komik.destroy', $komik->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No data available.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
