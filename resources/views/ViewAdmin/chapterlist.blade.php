<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Komik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="container">
    <h1>Daftar Chapter - {{ $komik->nama_komik }}</h1>
    <a href="{{ route('chapters.create', $komik->id) }}" class="btn btn-primary">Tambah Chapter</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Chapter</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chapters as $key => $chapter)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $chapter->nama_chapter }}</td>
                    <td>
                        <form action="{{ route('chapters.destroy', $chapter->id) }}" method="POST" onsubmit="return confirm('Hapus chapter ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
