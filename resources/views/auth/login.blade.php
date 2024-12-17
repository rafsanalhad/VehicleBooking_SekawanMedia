<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Monitoring Kendaraan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100">
    <!-- Container Utama -->
    <div class="grid lg:grid-cols-2 md:grid-cols-1 min-h-screen">
        <!-- Bagian Kiri: Gambar atau Branding -->
        <div class="bg-[#D4EBF8] flex flex-col justify-center items-center p-8 lg:block md:hidden sm:hidden hidden">
            <img src="{{ asset('/login.png') }}" alt="Monitoring Kendaraan" class="w-3/4 mx-auto">
            <h2 class="text-3xl font-bold text-center text-[#1F1F23]">Sistem Monitoring Kendaraan</h2>
            <p class="text-center text-[#838A93] mt-2">Kelola dan pantau pemesanan kendaraan Anda dengan mudah.</p>
        </div>

        <!-- Bagian Kanan: Form Login -->
        <div class="flex flex-col justify-center items-center px-8">
            <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Selamat Datang</h2>
                <p class="text-gray-600 mb-6">Silahkan login untuk mengecek hasil pengajuan Anda</p>
                
                <!-- Pesan Error -->
                @if ($errors->has('login'))
                <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-md">
                    {{ $errors->first('login') }}
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Input Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="email" id="email" name="email" placeholder="Masukkan Email Anda"
                                class="pl-10 pr-4 py-2 w-full border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" placeholder="Masukkan Password"
                                class="pl-10 pr-4 py-2 w-full border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>

                    <!-- Note -->
                    <p class="text-sm text-gray-500 mb-4">Hubungi admin jika Anda belum memiliki akun.</p>

                    <!-- Button Login -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md shadow-md transition duration-300">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
