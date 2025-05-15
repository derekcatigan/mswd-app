$(document).ready(function () {
    const $tableBody = $('#beneficiaryTable');
    const originalRows = $tableBody.html();

    function renderRows(data) {
        $tableBody.empty();

        if (data.length === 0) {
            $tableBody.html('<tr><td colspan="4" class="text-center">No results found</td></tr>');
            return;
        }

        data.forEach(b => {
            $tableBody.append(`
                <tr>
                    <td>${b.firstname} ${b.lastname}</td>
                    <td class="text-center">${b.address?.barangay ?? 'No address'}</td>
                    <td class="text-center">${b.status ?? ''}</td>
                    <td class="text-center"></td>
                </tr>
            `);
        });
    }

    $('#beneficiarySearch').on('keyup', function () {
        const query = $(this).val();

        if (query.length === 0) {
            $tableBody.html(originalRows);
            return;
        }

        if (query.length < 2) return;

        $tableBody.html('<tr><td colspan="4" class="text-center text-gray-500">Searching...</td></tr>');

        $.get('/ajax/beneficiaries/search', { query }, function (data) {
            renderRows(data);
        });
    });
});

