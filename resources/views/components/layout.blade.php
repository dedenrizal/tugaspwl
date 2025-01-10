<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow">
        <div class="container mx-auto py-6 px-4">
            <h1 class="text-3xl font-bold text-center">{{ $title ?? 'Dashboard' }}</h1>
        </div>
    </header>
    <main class="container mx-auto py-8 px-4">
        {{ $slot }}
    </main>
    <footer class="bg-white shadow mt-8 py-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} My Application</p>
        </div>
    </footer>
</body>
</html>
