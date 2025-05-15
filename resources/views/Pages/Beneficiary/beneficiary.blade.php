{{-- resources\views\Pages\beneficiary.blade.php --}}
@extends('Layouts.layout')

@section('head')
@endsection

@section('content')
    {{-- Search and Add Beneficiary Section --}}
    <div class="flex items-center justify-between mb-4 p-5">
        {{-- Search Input --}}
        <div class="relative w-72 bg-white">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" />
                </svg>
            </span>
            <input type="text" id="beneficiarySearch" placeholder="Search beneficiary..."
                class="w-full pl-9 p-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        {{-- Add Beneficiary Button --}}
        <a href="{{ route('beneficiary.create') }}"
            class="flex items-center gap-1 bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded hover:bg-blue-700 transition cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Beneficiary
        </a>
    </div>

    <div id="responseMessage" class="m-5 hidden">
        <div id="alertBox">
            <svg></svg>
            <span id="alertMessage"></span>
        </div>
    </div>

    {{-- Beneficiary Table --}}
    <div class="p-5">
        <div class="table-responsive h-[485px] max-h-[485px]">
            <table class="custom-table">
                <thead class="bg-slate-200">
                    <tr>
                        <th class="px-4 py-3 font-medium">Name</th>
                        <th class="px-4 py-3 font-medium">Address</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="beneficiaryTable">
                    @foreach ($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary->firstname }} {{ $beneficiary->lastname }}</td>
                            <td class="text-center">{{ $beneficiary->address->barangay ?? 'No address' }}</td>
                            <td class="text-center">{{ $beneficiary->status }}</td>
                            <td class="text-center">

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mx-5">
        {{ $beneficiaries->links('pagination::tailwind') }}
    </div>
@section('scripts')
    <script>
        $(document).ready(function() {
            const originalTable = $('#beneficiaryTable').html();
            let debounceTimer;
            let lastQuery = '';

            $('#beneficiarySearch').on('keyup', function() {
                const query = $(this).val();

                clearTimeout(debounceTimer);

                debounceTimer = setTimeout(function() {
                    if (query.length < 2) {
                        $('#beneficiaryTable').html(originalTable);
                        lastQuery = '';
                        return;
                    }

                    lastQuery = query;

                    // Show loading indicator
                    $('#beneficiaryTable').html(`
                        <tr><td colspan="4" class="text-center text-gray-500">Searching...</td></tr>
                    `);
                    $.get('/search/beneficiaries', {
                        query
                    }, function(data) {
                        // Ignore if this is an old request
                        if (query !== lastQuery) return;

                        let rows = '';
                        if (data.length === 0) {
                            rows =
                                `<tr><td colspan="4" class="text-center">No results found</td></tr>`;
                        } else {
                            data.forEach(b => {
                                rows += `
                                <tr>
                                    <td>${b.firstname} ${b.lastname}</td>
                                    <td class="text-center">${b.address ?? 'No address'}</td>
                                    <td class="text-center">${b.status ?? ''}</td>
                                    <td class="text-center"></td>
                                </tr>`;
                            });
                        }
                        $('#beneficiaryTable').html(rows);
                    });

                }, 20);
            });
        });
    </script>



    @if (session('success'))
        <script>
            $(document).ready(function() {
                showAlert(@json(session('success')), 'success');
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            $(document).ready(function() {
                showAlert(@json(session('error')), 'error');
            });
        </script>
    @endif
@endsection
@endsection
