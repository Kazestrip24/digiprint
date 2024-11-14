<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Printing Store</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-blue-600 p-4 text-white">
        <div class="max-w-7xl mx-auto flex justify-between">
            <h1 class="text-xl font-bold">Toko Digital Printing</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="/" class="hover:text-gray-300">Home</a></li>
                    <li><a href="/produk" class="hover:text-gray-300">Produk</a></li>
                    <li><a href="/kontak" class="hover:text-gray-300">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center">
        &copy; 2024 Toko Digital Printing. All Rights Reserved.
    </footer>
</body>
</html>
