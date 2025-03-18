<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KomikKu - Baca Komik Online</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-neutral min-h-screen">


  <!-- Navbar -->
  <div class="navbar bg-base-300 shadow-lg fixed top-0 left-0 w-full z-50">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <i class="fas fa-bars text-xl"></i>
        </label>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-200 rounded-box w-52">
          <li><a href="#populer" class="font-medium">komik populer</a></li>
          <li><a href="#daftar" class="font-medium">Daftar Komik</a></li>
          <li><a href="#genre" class="font-medium">Genre</a></li>
        </ul>
      </div>
      <a class="btn btn-ghost normal-case text-xl text-primary font-bold">
        <i class="fas fa-book-open mr-2"></i>NGOMIK
      </a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1">
        <li><a href="#populer" class="font-medium">komik populer</a></li>
        <li><a href="#daftar" class="font-medium">Daftar Komik</a></li>
        <li><a href="#genre" class="font-medium">Genre</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <div class="form-control mr-2 hidden md:block">
        <input type="text" placeholder="Cari komik..." class="input input-bordered w-24 md:w-auto bg-base-200" />
      </div>
      <a class="btn btn-primary">Login</a>
    </div>
  </div>

  <!-- Hero Section -->
  <div class="hero min-h-[80vh] bg-base-200" style="background-image: url('{{ asset('img/landingpage.png') }}'); background-size: cover; background-position: center;">
    <div class="hero-overlay bg-opacity-70"></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">NGOMIK</h1>
        <p class="mb-5">Baca komik favoritmu kapan saja dan di mana saja. Ribuan judul komik tersedia untuk kamu nikmati.</p>
        <a href="#daftar" class="btn btn-primary">Mulai Membaca</a>

      </div>
    </div>
  </div>

  <!-- Popular Comics Section -->
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
      <h2  id="populer" class="text-2xl font-bold text-primary">Komik Populer</h2>
      <a href="#" class="text-primary hover:underline">Lihat Semua</a>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
      <!-- Comic Card 1 -->
      <div class="card bg-base-200 shadow-xl">
        <figure><img src="https://picsum.photos/id/1/200/300" alt="Comic Cover" /></figure>
        <div class="card-body p-4">
          <h3 class="card-title text-sm md:text-base">One Piece</h3>
          <div class="badge badge-primary">Petualangan</div>
          <div class="mt-2 text-xs">
            <div class="flex items-center">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4.9</span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Comic Card 2 -->
      <div class="card bg-base-200 shadow-xl">
        <figure><img src="https://picsum.photos/id/2/200/300" alt="Comic Cover" /></figure>
        <div class="card-body p-4">
          <h3 class="card-title text-sm md:text-base">Naruto</h3>
          <div class="badge badge-primary">Aksi</div>
          <div class="mt-2 text-xs">
            <div class="flex items-center">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4.8</span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Comic Card 3 -->
      <div class="card bg-base-200 shadow-xl">
        <figure><img src="https://picsum.photos/id/3/200/300" alt="Comic Cover" /></figure>
        <div class="card-body p-4">
          <h3 class="card-title text-sm md:text-base">Attack on Titan</h3>
          <div class="badge badge-primary">Fantasi</div>
          <div class="mt-2 text-xs">
            <div class="flex items-center">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4.7</span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Comic Card 4 -->
      <div class="card bg-base-200 shadow-xl">
        <figure><img src="https://picsum.photos/id/4/200/300" alt="Comic Cover" /></figure>
        <div class="card-body p-4">
          <h3 class="card-title text-sm md:text-base">Demon Slayer</h3>
          <div class="badge badge-primary">Horor</div>
          <div class="mt-2 text-xs">
            <div class="flex items-center">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4.9</span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Comic Card 5 -->
      <div class="card bg-base-200 shadow-xl">
        <figure><img src="https://picsum.photos/id/5/200/300" alt="Comic Cover" /></figure>
        <div class="card-body p-4">
          <h3 class="card-title text-sm md:text-base">Jujutsu Kaisen</h3>
          <div class="badge badge-primary">Aksi</div>
          <div class="mt-2 text-xs">
            <div class="flex items-center">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4.6</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Latest Updates Section -->
  <div class="container mx-auto px-4 py-8 ">
    <div class="flex justify-between items-center mb-6">
      <h2  id="daftar" class="text-2xl font-bold text-primary">Daftar Komik</h2>
    </div>
    
    
    <div class="overflow-x-auto">
    <table class="table table-zebra bg-base-200">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($komiks as $komik)
            <!-- Comic Card -->
            <div class="card bg-base-200 shadow-xl border-l-4 border-primary"> <!-- Garis tepi di kiri -->
                <figure>
                    <img src="{{ asset('storage/' . $komik->gambar_komik) }}" 
                         alt="{{ $komik->nama_komik }}" 
                         class="w-64 h-80 object-cover" />
                </figure>
                <div class="card-body p-4">
                    <h3 class="card-title text-sm md:text-base">{{ $komik->nama_komik }}</h3>
                    <div class="badge badge-primary">{{ $komik->genre }}</div>
                    <div class="mt-2 text-xs">
                        <div class="flex items-center gap-2">
                            <a href="#" class="btn btn-primary text-white px-4 py-2">Baca Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </table>
</div>






      
         

  <!-- Genres Section -->
  <div class="container mx-auto px-4 py-8">
    <h2 id="genre" class="text-2xl font-bold text-primary mb-6">Genre Komik</h2>
    <div class="flex flex-wrap gap-2">
      <button class="btn btn-outline btn-primary">Aksi</button>
      <button class="btn btn-outline btn-primary">Petualangan</button>
      <button class="btn btn-outline btn-primary">Komedi</button>
      <button class="btn btn-outline btn-primary">Drama</button>
      <button class="btn btn-outline btn-primary">Fantasi</button>
      <button class="btn btn-outline btn-primary">Horor</button>
      <button class="btn btn-outline btn-primary">Misteri</button>
      <button class="btn btn-outline btn-primary">Romantis</button>
      <button class="btn btn-outline btn-primary">Sci-Fi</button>
      <button class="btn btn-outline btn-primary">Slice of Life</button>
      <button class="btn btn-outline btn-primary">Olahraga</button>
      <button class="btn btn-outline btn-primary">Supernatural</button>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer p-10 bg-base-300 text-base-content mt-8">
    <div>
      <span class="footer-title">Layanan</span> 
      <a class="link link-hover">Beranda</a> 
      <a class="link link-hover">Daftar Komik</a> 
      <a class="link link-hover">Genre</a> 
      <a class="link link-hover">Terbaru</a>
    </div> 
    <div>
      <span class="footer-title">Perusahaan</span> 
      <a class="link link-hover">Tentang Kami</a> 
      <a class="link link-hover">Kontak</a> 
      <a class="link link-hover">Karir</a> 
      <a class="link link-hover">Press kit</a>
    </div> 
    <div>
      <span class="footer-title">Legal</span> 
      <a class="link link-hover">Syarat Penggunaan</a> 
      <a class="link link-hover">Kebijakan Privasi</a> 
      <a class="link link-hover">DMCA</a>
    </div> 
    <div>
      <span class="footer-title">Newsletter</span> 
      <div class="form-control w-80">
        <label class="label">
          <span class="label-text">Masukkan email Anda</span>
        </label> 
        <div class="relative">
          <input type="text" placeholder="username@site.com" class="input input-bordered w-full pr-16" /> 
          <button class="btn btn-primary absolute top-0 right-0 rounded-l-none">Subscribe</button>
        </div>
      </div>
    </div>
  </footer>
  <footer class="footer footer-center p-4 bg-base-300 text-base-content border-t border-base-200">
    <div>
      <p>Copyright © 2023 - KomikKu - Semua Hak Dilindungi</p>
    </div>
  </footer>
</body>
</html>