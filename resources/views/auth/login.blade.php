<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Monitoring Kendaraan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Container Utama -->
    <div class="grid grid-cols-2 min-h-screen">
        <!-- Bagian Kiri: Gambar atau Branding -->
        <div class="bg-[#D4EBF8]">
            <h2 class="text-3xl font-bold mb-4 text-center">Sistem Monitoring Kendaraan</h2>
            <p class="text-center">Kelola dan pantau pemesanan kendaraan Anda dengan mudah.</p>
            <div class="mt-6">
                <img src="https://via.placeholder.com/300x200" alt="Monitoring Kendaraan" class="rounded-md shadow-md">
            </div>
        </div>
        
        <!-- Bagian Kanan: Form Login -->
        <div class="">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login Akun</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Pesan Error -->
                @if ($errors->has('login'))
                <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-md">
                    {{ $errors->first('login') }}
                </div>
                @endif

                <!-- Input Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email Anda"
                        class="mt-1 block w-full px-4 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <!-- Input Password -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password"
                        class="mt-1 block w-full px-4 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
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
</body>

</html>
