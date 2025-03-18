<div class="w-64 bg-gray-800 text-gray-100  min-h-screen">
    <div class="p-4 font-bold text-lg">Menu</div>
    <ul class="mt-4 space-y-2">

    <li class="group">
                <a href="{{ route('ViewAdmin.userlist') }}">
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">Data User</div>
                </a>
            </li>
            <li class="">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">
                    <a href="{{ route('ViewAdmin.komiklist') }}">Data Komik</a>
                </div>
            </li>
            <li class="group">
                <a href="index.php?modul=barang&fitur=list">
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">Data Penjualan</div>
                </a>
            </li>
            

        
        
    </ul>
</div>