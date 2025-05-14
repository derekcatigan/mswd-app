// public\js\Pages\beneficiary.js
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
        let selectedServices = [];

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

            if (buttonId === 'serviceDropdownButton') {
                if (!selectedServices.includes(selected)) {
                    selectedServices.push(selected);
                    $('#selectedServicesContainer').append(`
                        <span class="badge inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-sm text-sm" data-service="${selected}">
                            ${selected}
                            <button type="button" class="ml-2 text-blue-500 hover:text-red-600 removeService" data-service="${selected}" title="Remove">
                                &times;
                            </button>
                        </span>
                    `);

                    // Update hidden input
                    $value.val(selectedServices.join(','));
                }
            } else {
                $display.text(selected);
                $value.val(selected);
            }
        });

        $(document).click(function(event) {
            if (!$(event.target).closest(`#${buttonId}, #${menuId}`).length) {
                $menu.hide();
            }
        });

        $(document).on('click', '.removeService', function() {
            const serviceToRemove = $(this).data('service');
            selectedServices = selectedServices.filter(item => item !== serviceToRemove);
        
            // Remove badge
            $(`[data-service="${serviceToRemove}"]`).remove();
        
            // Update hidden input
            $('#serviceValue').val(selectedServices.join(','));
        
            // If no more services selected, reset label
            if (selectedServices.length === 0) {
                $('#selectedService').text('Select Service');
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