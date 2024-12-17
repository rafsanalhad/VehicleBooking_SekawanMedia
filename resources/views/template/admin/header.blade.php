<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    
/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <style>
        /* Sidebar Animation */
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }

        #sidebar.sidebar-hidden {
            transform: translateX(-100%);
        }

        /* Overlay */
        #sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9;
        }

        @media (min-width: 768px) {
            #sidebar-overlay {
                display: none !important;
            }

            #sidebar {
                transform: translateX(0) !important;
            }
        }
    </style>
    <style>
        .active {
            background-color: #4b5563;
            color: #ffffff;
        }
    </style>
    
</head>

 <body class="bg-gray-100">
    <div id="sidebar-overlay" class="hidden"></div>

    <div class="flex min-h-screen">
        <aside id="sidebar"
            class="bg-gray-800 text-white w-64 sidebar-hidden md:translate-x-0 fixed md:relative min-h-screen z-10 transform transition-transform duration-300">
            <div class="flex flex-col h-full justify-between">
                <div>
                    <div class="p-4 text-xl font-bold text-center bg-gray-900 flex items-center justify-between">
                        <a href="#" class="block">Admin Panel</a>
                        <button id="menuBtn2" class="text-[28px] md:hidden">
                            &times;
                        </button>
                    </div>
                    <nav class="mt-6">
                        <ul id="navList">
                            <li>
                                <a href="{{route('adminDashboard')}}" id="dashboardNav" class="block p-4 hover:bg-gray-700 transition duration-300 flex items-center">
                                    <i class="fa-solid fa-house-user mr-2"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{route('adminUsers')}}" id="penggunaNav" class="block p-4 hover:bg-gray-700 transition duration-300 flex items-center">
                                    <i class="fa-solid fa-users mr-2"></i> Menu Pengguna
                                </a>
                            </li>
                            <li>
                                <a href="{{route('adminListBooking')}}" id="pengajuanNav" class="block p-4 hover:bg-gray-700 transition duration-300 flex items-center">
                                    <i class="fa-solid fa-file-alt mr-2"></i> Menu Pengajuan
                                </a>
                            </li>
                            <li>
                                <a href="{{route('adminApproval')}}" id="menyetujuiNav" class="block p-4 hover:bg-gray-700 transition duration-300 flex items-center">
                                    <i class="fa-solid fa-check-circle mr-2"></i> Menu Menyetujui
                                </a>
                            </li>
                            <li>
                                <a href="{{route('adminVehicles')}}" id="kendaraanNav" class="block p-4 hover:bg-gray-700 transition duration-300 flex items-center">
                                    <i class="fa-solid fa-car mr-2"></i> Menu Kendaraan
                                </a>
                            </li>
                            <li>
                                <a href="{{route('adminDepartments')}}" id="departmentNav" class="block p-4 hover:bg-gray-700 transition duration-300 flex items-center">
                                    <i class="fa-solid fa-building mr-2"></i> Menu Departement
                                </a>
                            </li>
                            <li>
                                <a href="{{route('adminReturns')}}" id="pengembalianNav" class="block p-4 hover:bg-gray-700 transition duration-300 flex items-center">
                                    <i class="fa-solid fa-undo mr-2"></i> Menu Pengembalian
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="p-4 text-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md w-full transition duration-300">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>
         <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold lg:block md:hidden sm:hidden hidden"> Admin Menu</h1>
                <button id="menuBtn" class="text-dark p-2 rounded-md lg:hidden md:block sm:block block text-[18px] font-bold">
                    ☰ Menu
                </button>
                <div class="flex items-center space-x-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-dark">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                        </button>
                    </form>
                </div>
                
            </header>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const menuBtn = document.getElementById("menuBtn");
            const menuBtn2 = document.getElementById("menuBtn2");
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("sidebar-overlay");

            function toggleSidebar() {
                sidebar.classList.remove("sidebar-hidden");
                overlay.classList.remove("hidden");
            }
            function closeSidebar() {
                sidebar.classList.add("sidebar-hidden");
                overlay.classList.add("hidden");
            }

            menuBtn.addEventListener("click", toggleSidebar);
            menuBtn2.addEventListener("click", closeSidebar);

            overlay.addEventListener("click", toggleSidebar);

            const sidebarLinks = sidebar.querySelectorAll("a");
            sidebarLinks.forEach(link => {
                link.addEventListener("click", () => {
                    if (window.innerWidth < 768) {
                        toggleSidebar();
                    }
                });
            });
        });
    </script>