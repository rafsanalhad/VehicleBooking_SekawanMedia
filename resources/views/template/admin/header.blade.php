<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
</body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
       body {
    overflow: visible;
}
    </style>
</head>

<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 flex flex-col justify-between min-h-screen">
            <div>
                <div class="p-4 text-lg font-bold text-center bg-gray-900">Admin Panel</div>
                <nav class="mt-6">
                    <ul>
                        <li class="p-4 hover:bg-gray-700 cursor-pointer"><a
                                href="{{route('adminDashboard')}}">Dashboard</a></li>
                        <li class="p-4 hover:bg-gray-700 cursor-pointer"><a href="{{route('adminUsers')}}">Menu Pengguna</a>
                        </li>
                        <li class="p-4 hover:bg-gray-700 cursor-pointer"><a href="{{route('adminListBooking')}}">Menu Pengajuan</a></li>
                        <li class="p-4 hover:bg-gray-700 cursor-pointer"><a href="{{route('adminApproval')}}">Menu Menyetujui</a></li>
                    </ul>
                </nav>
            </div>
            <div class="p-4 text-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow-md px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..."
                        class="border rounded px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" />
                    <img src="https://via.placeholder.com/40" alt="Admin Avatar"
                        class="w-10 h-10 rounded-full border" />
                </div>
            </header>