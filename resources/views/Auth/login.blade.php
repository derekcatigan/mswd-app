{{-- resources\views\Auth\login.blade.php --}}
@extends('Layouts.app')

@section('head')
    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center">

        <div class="p-6 w-full max-w-md bg-white shadow rounded-sm">
            {{-- Logo & Title --}}
            <div class="flex flex-col items-center justify-center gap-1 mb-8 fade-in-up">
                <img src="{{ asset('images/logos/mswdicon.png') }}" alt="mswdo icon" class="h-20 w-auto object-contain">
                <h1 class="text-2xl font-bold text-gray-800 leading-none mb-0">MSWDO - Login</h1>
                <p class="text-xs text-gray-500 mt-0">Sogod, Southern Leyte</p>
            </div>

            <div id="responseMessage" class="my-4 hidden">
                <div id="alertBox">
                    <svg>
                    </svg>
                    <span id="alertMessage"></span>
                </div>
            </div>

            {{-- Login Form --}}
            <form id="loginForm" class="space-y-3 fade-in-up">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="example@mswdosogod.com"
                        class="w-full p-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="password"
                        class="w-full p-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200"
                        required>

                    {{-- Show Password & Forgot --}}
                    <div class="flex items-center justify-between mt-2">
                        <div class="flex items-center gap-1">
                            <input type="checkbox" id="show-password" class="accent-blue-600 transform scale-110">
                            <label for="show-password" class="text-sm text-gray-700 cursor-pointer select-none">Show
                                Password</label>
                        </div>

                        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div>
                    <button type="submit"
                        class="w-full text-white font-semibold p-2 rounded bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                        Login
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script src="{{ asset('js/Auth/login.js') }}"></script>
    <script src="{{ asset('js/Alert/alert.js') }}"></script>
@endsection
