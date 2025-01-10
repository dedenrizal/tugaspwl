<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Home' }}</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: #fff;
            color: #000;
        }
        header {
            background: linear-gradient(to right, #f8f9fa, #e0e0e0);
            color: #000;
        }
        footer {
            background-color: #f8f9fa;
            color: #000;
        }
        a {
            color: #000;
        }
        a:hover {
            color: #333;
        }
    </style>
</head>
<body class="bg-light text-dark">
    <header class="shadow">
        <div class="container mx-auto py-6 px-4 text-center">
            <h1 class="text-4xl font-bold">{{ $title ?? 'Selamat Datang di PT Jayusman' }}</h1>
            <p class="text-lg mt-2">Nikmati pengalaman belanja yang menyenangkan</p>
        </div>
    </header>
    <main class="container mx-auto py-8 px-4">
        {{ $slot }}
    </main>
    <footer class="shadow mt-8 py-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} PT Jayusman. Semua Hak Dilindungi.</p>
            <p><a href="{{ route('login') }}">Login</a> | <a href="#">Kontak Kami</a></p>
        </div>
    </footer>
</body>
</html>
