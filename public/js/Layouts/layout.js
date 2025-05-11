// public\js\Layouts\layout.js
$(document).ready(function () {
    $("#userDropdownButton").click(function (e) {
        e.stopPropagation();
        $("#userDropdownMenu").toggle();
    });

    $(document).click(function () {
        $("#userDropdownMenu").hide();
    });
});
