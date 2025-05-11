{{-- resources\views\Auth\account.blade.php --}}
@extends('Layouts.layout')

@section('head')
@endsection

@section('content')
    {{-- Search and Add Account Section --}}
    <div class="flex items-center justify-between mb-4 p-5">
        {{-- Search Input --}}
        <div class="relative w-72 bg-white">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" />
                </svg>
            </span>
            <input type="text" placeholder="Search accounts..."
                class="w-full pl-9 p-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        {{-- Add Account Button --}}
        <button
            class="flex items-center gap-1 bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded hover:bg-blue-700 transition cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Account
        </button>
    </div>

    {{-- Accounts Table --}}
    <div class="p-5">
        <div class="table-responsive">
            <table class="custom-table">
                <thead class="bg-slate-200">
                    <tr>
                        <th class="px-4 py-3 font-medium">Name</th>
                        <th class="px-4 py-3 font-medium">Email</th>
                        <th class="px-4 py-3 font-medium">Role</th>
                        <th class="px-4 py-3 font-medium text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="accountTable">
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{ ucfirst($account->name) }}</td>
                            <td class="text-center">{{ $account->email }}</td>
                            <td class="text-center">
                                @if ($account->role === 'admin')
                                    <div
                                        class="bg-blue-300 p-1 rounded text-blue-800 text-xs font-medium inline-block w-24 text-center">
                                        {{ ucfirst($account->role) }}
                                    </div>
                                @elseif ($account->role === 'employee')
                                    <div
                                        class="bg-green-300 p-1 rounded text-green-800 text-xs font-medium inline-block w-24 text-center">
                                        {{ ucfirst($account->role) }}
                                    </div>
                                @else
                                    <div
                                        class="bg-gray-300 p-1 rounded text-gray-800 text-xs font-medium inline-block w-24 text-center">
                                        {{ ucfirst($account->role) }}
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <button
                                    class="p-2 rounded hover:bg-gray-100 transition duration-200 focus:outline-none cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-700"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/Auth/accounts.js') }}"></script>
@endsection
@endsection
