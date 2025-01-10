<x-homelayout title="Menu Utama">
    <x-slot name='title'>Home</x-slot>
    <div class="container">
        <div class="⭐ text-center bg-light text-dark py-5">
            <h1 class="display-4 font-weight-bold mb-4">Selamat Datang di Website Penjualan PT Jayusman</h1>
            <p class="lead mb-4">Temukan produk terbaik kami dengan mudah dan nikmati pengalaman berbelanja yang menyenangkan.</p>
            <hr class="my-4" style="border-color: #000;">
            <a class="btn btn-dark btn-lg px-5" href="{{ route('login') }}" role="button">Login</a>
        </div>
    </div>

    <style>
        .⭐ {
            background: linear-gradient(to right, #fff, #f8f9fa);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-dark {
            background-color: #000;
            border-color: #000;
        }
        .btn-dark:hover {
            background-color: #333;
            border-color: #333;
        }
    </style>
</x-homelayout>
