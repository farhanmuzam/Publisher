<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FJB Barang Bekas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="font-poppins flex gap-10 h-screen p-20">
    <div class="w-1/2 flex flex-col justify-center items-center gap-y-8 bg-[#5AB2FF] rounded-lg p-5">
        <img class="w-1/4" src="{{ asset('assets/logo.png') }}" alt="Logo">
        <h1 class="text-2xl font-medium text-center w-full">
            Selamat Datang di Forum Jual Beli (FJB)
        </h1>
        <p class="text-center">
            Selamat datang di rumah bagi para pencinta barang berkualitas dengan harga yang terjangkau. Forum Jual Beli
            (FJB) adalah destinasi utama untuk menemukan barang-barang bekas berkualitas dan layak pakai dengan harga
            yang bersahabat. Dari pakaian, perlengkapan elektronik, perabotan rumah tangga, hingga koleksi unik, kami
            menyediakan platform yang memudahkan Anda untuk menjelajahi dan membeli barang impian Anda.</p>
        <a href="{{ route('dashboard') }}" class="p-2 bg-green-600 text-white font-meidum rounded-lg flex gap-x-3 hover:bg-green-900 transition-all"><svg xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            Beli Barang Bekas</a>
    </div>
    <div class="w-1/2 flex flex-col gap-y-5 items-center justify-center">
        <div class="bg-[#5AB2FF] p-2 rounded-lg">
            <h1 class="text-lg font-semibold mb-2">
                Kualitas yang Diandalkan
            </h1>
            <p class="text-sm">
                Setiap barang yang diunggah ke platform kami telah melalui proses peninjauan yang ketat untuk memastikan
                kualitasnya. Dengan demikian, Anda dapat berbelanja dengan percaya diri, mengetahui bahwa setiap item
                yang
                Anda beli telah melalui seleksi yang teliti untuk memastikan kualitasnya.
            </p>
        </div>
        <div class="bg-[#A0DEFF] p-2 rounded-lg">
            <h1 class="text-lg font-semibold mb-2">
                Pasar bagi Barang-Barang Berkualitas
            </h1>
            <p class="text-sm">
                Forum Jual Beli (FJB) merupakan tempat yang tepat bagi Anda yang mencari barang-barang berkualitas tanpa
                harus merogoh kocek dalam-dalam. Dari barang-barang sehari-hari hingga koleksi langka, temukan beragam
                pilihan yang menarik di sini.
            </p>
        </div>
        <div class="bg-[#CAF4FF] p-2 rounded-lg">
            <h1 class="text-lg font-semibold mb-2">
                Mudah dan Aman
            </h1>
            <p class="text-sm">
                Kami memahami betapa pentingnya keamanan dalam bertransaksi online. Oleh karena itu, kami menyediakan
                sistem
                pembayaran yang aman dan proses pengiriman yang terpercaya, sehingga Anda dapat berbelanja tanpa
                khawatir.
            </p>
        </div>
        <div class="bg-[#FFF9D0] p-2 rounded-lg">
            <h1 class="text-lg font-semibold mb-2">
                Bergabunglah dengan Komunitas Kami
            </h1>
            <p class="text-sm">
                Saling berbagi pengalaman, tips, dan informasi adalah bagian dari keunikan kami di FJB. Bergabunglah
                dengan
                komunitas kami yang ramah dan berbagi minat untuk mendapatkan pengalaman berbelanja yang lebih
                menyenangkan.
            </p>
        </div>
    </div>
</body>

</html>
