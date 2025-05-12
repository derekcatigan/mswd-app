{{-- resources\views\Pages\Beneficiary\create.blade.php --}}
@extends('Layouts.layout')

@section('head')
@endsection

@section('content')
    <div class="mb-4">
        <a href="{{ route('beneficiary.index') }}"
            class="inline-flex items-center px-4 py-2 text-slate-800 text-sm font-medium rounded hover:bg-slate-300 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Go Back
        </a>
    </div>

    <form action="" method="POST">
        @csrf

        <div class="flex items-center ms-5">
            <span class="text-sm font-semibold text-gray-600 uppercase mr-2">Create</span>
            <div class="flex-grow border-t border-gray-300 mr-5"></div>
        </div>

        <div class="m-5 p-5 bg-white border border-gray-300 rounded">
            <div class="w-full flex space-x-2">
                <div class="w-full">
                    <label for="firstname">First Name:<span class="text-red-500">*</span></label>
                    <input type="text" name="firstname" id="firstname" placeholder="e.g. John" class="input-text"
                        required>
                </div>

                <div class="w-full">
                    <label for="middlename">Middle Name or Initial:</label>
                    <input type="text" name="middlename" id="middlename" placeholder="e.g. Alexander or A."
                        class="input-text">
                </div>

                <div class="w-full">
                    <label for="lastname">Last Name:<span class="text-red-500">*</span></label>
                    <input type="text" name="lastname" id="lastname" placeholder="e.g. Doe" class="input-text" required>
                </div>

                <div class="w-full">
                    <label for="suffix">Suffix:</label>
                    <select name="suffix" id="suffix" class="input-select">
                        <option value="">Select suffix</option>
                        <option value="Jr.">Jr.</option>
                        <option value="Sr.">Sr.</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="w-full flex space-x-2">
                <div class="w-full">
                    <label for="sex">Sex:<span class="text-red-500">*</span></label>
                    <select name="sex" id="sex" class="input-select" required>
                        <option value="">Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="w-full">
                    <label for="birthdate">Birthdate:<span class="text-red-500">*</span></label>
                    <input type="date" name="birthdate" id="birthdate" class="input-text" required>
                </div>

                <div class="w-full">
                    <label for="age">Age:</label>
                    <input type="text" name="age" id="age" class="input-text" readonly>
                </div>

                <div class="w-full">
                    <label for="status">Status:<span class="text-red-500">*</span></label>
                    <select name="status" id="status" class="input-select" required>
                        <option value="">Select status</option>
                        <option value="PWD">PWD</option>
                        <option value="Regular Client">Regular Client</option>
                        <option value="Child or Youth">Child or Youth</option>
                        <option value="Senior Citizen">Senior Citizen</option>
                        <option value="Solo Parent">Solo Parent</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="w-full flex space-x-2">
                <div class="w-full">
                    <label for="streetname">Street Name:</label>
                    <input type="text" name="streetname" id="streetname" placeholder="e.g Osmeña Street"
                        class="input-text">
                </div>

                <div class="w-full">
                    <label for="barangay">Barangay:<span class="text-red-500">*</span></label>

                    <div class="relative">
                        <button id="dropdownButton" type="button"
                            class="w-full min-h-10 p-2 text-sm border border-gray-300 rounded focus:outline-none flex justify-between items-center">
                            <span id="selectedBarangay">Select Barangay</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="dropdownMenu"
                            class="absolute z-10 w-full bg-white border border-gray-300 rounded shadow mt-1 hidden">
                            <input type="text" id="barangaySearch" placeholder="Search barangay..."
                                class="w-full p-2 text-sm border-b border-gray-200 focus:outline-none">

                            <ul id="barangayList" class="max-h-40 overflow-y-auto">
                                <!-- Barangay list items go here -->
                            </ul>
                        </div>
                        <input type="hidden" name="barangay" id="barangayValue" required>
                    </div>
                </div>


                <div class="w-full">
                    <label for="municipality">Municipality:</label>
                    <input type="text" name="municipality" id="municipality" value="Sogod" class="input-text"
                        readonly>
                </div>

                <div class="w-full">
                    <label for="province">Province:</label>
                    <input type="text" name="province" id="province" value="Southern Leyte" class="input-text"
                        readonly>
                </div>
            </div>
            <br>
            <div class="w-full flex space-x-2">
                <div class="w-full">
                    <label for="category">Category:</label>
                    <textarea name="category" id="category" rows="3"
                        class="w-full p-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200"
                        placeholder="Enter category..."></textarea>
                </div>

                <div class="w-full">
                    <label for="remarks">Remarks:</label>
                    <textarea name="remarks" id="remarks" rows="3"
                        class="w-full p-2 text-sm border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200"
                        placeholder="Additional remarks..."></textarea>
                </div>
            </div>

        </div>

        <div class="flex items-center ms-5">
            <span class="text-sm font-semibold text-gray-600 uppercase mr-2">Services</span>
            <div class="flex-grow border-t border-gray-300 mr-5"></div>
        </div>

        <div class="m-5 p-5 bg-white border border-gray-300 rounded">
            <div class="w-full flex space-x-2">
                <div class="w-full">
                    <label for="serviceType">Service Type:<span class="text-red-500">*</span></label>
                    <select name="serviceType" id="serviceType" class="input-select" required>
                        <option value="">Select type</option>
                        <option value="AICS">AICS</option>
                        <option value="Woman">Woman</option>
                        <option value="Child or Youth">Child or Youth</option>
                        <option value="CAR">CAR</option>
                        <option value="CICL">CICL</option>
                    </select>
                </div>

                <div class="w-full">
                    <label for="service">Service:<span class="text-red-500">*</span></label>

                    <div class="relative">
                        <button id="serviceDropdownButton" type="button"
                            class="w-full min-h-10 p-2 text-sm border border-gray-300 rounded focus:outline-none flex justify-between items-center">
                            <span id="selectedService">Select Service</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="serviceDropdownMenu"
                            class="absolute z-10 w-full bg-white border border-gray-300 rounded shadow mt-1 hidden">
                            <input type="text" id="serviceSearch" placeholder="Search service..."
                                class="w-full p-2 text-sm border-b border-gray-200 focus:outline-none">

                            <ul id="serviceList" class="max-h-40 overflow-y-auto">

                            </ul>
                        </div>
                        <input type="hidden" name="service" id="serviceValue" required>
                    </div>
                </div>

            </div>

        </div>
    </form>

@section('scripts')
    <script>
        $(document).ready(function() {
            function initDropdown({
                buttonId,
                menuId,
                searchInputId,
                listId,
                valueInputId,
                displaySpanId,
                items
            }) {
                const $button = $('#' + buttonId);
                const $menu = $('#' + menuId);
                const $search = $('#' + searchInputId);
                const $list = $('#' + listId);
                const $value = $('#' + valueInputId);
                const $display = $('#' + displaySpanId);

                function populateList(filtered = items) {
                    $list.empty();
                    filtered.forEach(function(item) {
                        $list.append(
                            `<li class="p-2 text-sm hover:bg-gray-100 cursor-pointer">${item}</li>`);
                    });
                }

                populateList();

                $button.click(function() {
                    $menu.toggle();
                });

                $search.on('input', function() {
                    const val = $(this).val().toLowerCase();
                    const filtered = items.filter(item => item.toLowerCase().includes(val));
                    populateList(filtered);
                });

                $(document).on('click', `#${listId} li`, function() {
                    const selected = $(this).text();
                    $display.text(selected);
                    $value.val(selected);
                    $menu.hide();
                });

                $(document).click(function(event) {
                    if (!$(event.target).closest(`#${buttonId}, #${menuId}`).length) {
                        $menu.hide();
                    }
                });
            }

            // Init for Barangays
            initDropdown({
                buttonId: 'dropdownButton',
                menuId: 'dropdownMenu',
                searchInputId: 'barangaySearch',
                listId: 'barangayList',
                valueInputId: 'barangayValue',
                displaySpanId: 'selectedBarangay',
                items: [
                    "Benit", "Buac Daku", "Buac Gamay", "Cabadbaran", "Concepcion", "Consolacion",
                    "Dagsa",
                    "Hibod-hibod", "Hindangan", "Hipantag", "Javier", "Kahupian", "Kanangkaan",
                    "Kauswagan",
                    "La Purisima Concepcion", "Libas", "Lum-an", "Mabicay", "Mac", "Magatas", "Malinao",
                    "Maria Plana", "Milagroso", "Olisihan", "Pancho Villa", "Pandan", "Rizal",
                    "Salvacion",
                    "San Francisco Mabuhay", "San Isidro", "San Jose", "San Juan", "San Miguel",
                    "San Pedro",
                    "San Roque", "San Vicente", "Santa Maria", "Suba", "Tampoong", "Zone I", "Zone II",
                    "Zone III",
                    "Zone IV", "Zone V"
                ]
            });

            // Init for Services
            initDropdown({
                buttonId: 'serviceDropdownButton',
                menuId: 'serviceDropdownMenu',
                searchInputId: 'serviceSearch',
                listId: 'serviceList',
                valueInputId: 'serviceValue',
                displaySpanId: 'selectedService',
                items: [
                    "Burial Assistance", "Counseling", "Financial Assistance", "Food Assistance",
                    "Hospital Bill", "Medicine Assistance", "Shelter Assistance"
                ]
            });
        });
    </script>
@endsection
@endsection
