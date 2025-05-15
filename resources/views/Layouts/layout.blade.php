{{-- resources\views\Layouts\layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MSWDO - Sogod Municipality</title>
    <link rel="icon" href="{{ asset('images/logos/mswdicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/Layouts/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Layouts/table.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    @yield('head')
</head>

<body class="h-screen bg-slate-50">

    {{-- Navbar --}}
    <nav class="navbar flex items-center justify-end p-3 border-b border-gray-200">
        <div class="relative flex items-center gap-2 cursor-default">
            <div class="text-right">
                <h4 class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</h4>
                <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
            </div>
            <button id="userDropdownButton"
                class="p-1 rounded-md hover:bg-gray-100 transition duration-200 cursor-pointer">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div id="userDropdownMenu"
                class="absolute right-0 top-9 w-40 bg-white border border-gray-200 rounded-lg shadow-md hidden z-50">
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-lg transition">Profile</a>
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">Settings</a>
            </div>

        </div>
    </nav>


    {{-- Sidebar --}}
    <aside class="sidebar">
        <div class="w-full flex px-1 py-2 border-b border-b-gray-300">
            <img src="{{ asset('images/logos/mswdicon.png') }}" alt="mswdo logo" class="h-16 w-auto object-contain">
            <div class="mt-2 ms-2">
                <h3 class="font-medium">MSWDO</h3>
                <p class="text-xs">Sogod, Southern Leyte</p>
            </div>
        </div>

        <div class="mt-5 flex-1">
            <ul>
                <li>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('dashboard.admin') }}"
                            class="w-full flex items-center p-2 text-sm {{ Route::is('dashboard.admin') ? 'bg-gray-200 rounded' : '' }}">
                            <i class="hgi hgi-stroke hgi-home-03 me-3"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('dashboard.employee') }}"
                            class="w-full flex items-center p-2 text-sm {{ Route::is('dashboard.employee') ? 'bg-gray-200 rounded' : '' }}">
                            <i class="hgi hgi-stroke hgi-home-03 me-3"></i> Dashboard
                        </a>
                    @endif
                </li>

                <li class="mt-1">
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('account.page') }}"
                            class="{{ Route::is('account.page') ? 'bg-gray-200 rounded' : '' }} w-full flex items-center p-2 text-sm">
                            <i class="hgi hgi-stroke hgi-account-setting-03 me-3"></i> Accounts
                        </a>
                    @endif
                </li>

                <label class="text-xs ms-1 font-medium text-gray-500 ">Manage</label>
                <li class="mt-1">
                    <a href="{{ route('beneficiary.index') }}"
                        class="{{ Route::is('beneficiary.index') ? 'bg-gray-200 rounded' : '' }} w-full flex items-center p-2 text-sm">
                        <i class="hgi hgi-stroke hgi-user-multiple me-2"></i> Beneficiary
                    </a>
                </li>
                <li class="mt-1">
                    <a href="#">
                        <i class="hgi hgi-stroke hgi-justice-scale-01 me-2"></i> Case Management
                    </a>
                </li>
                <li class="mt-1">
                    <a href="#">
                        <i class="hgi hgi-stroke hgi-megaphone-01 me-2"></i> Announcement
                    </a>
                </li>
                <li class="mt-1">
                    <a href="#">
                        <i class="hgi hgi-stroke hgi-analysis-text-link me-2"></i> Reports
                    </a>
                </li>
            </ul>
        </div>

        <div class="logout-container">
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="hgi hgi-stroke hgi-logout-01 me-2"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="main-contents">
        @yield('content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/Alert/alert.js') }}"></script>
    <script src="{{ asset('js/Layouts/layout.js') }}"></script>
    <script src="{{ asset('js/Auth/logout.js') }}"></script>
    @yield('scripts')
</body>

</html>
