// public\js\Auth\logout.js
$(document).ready(function () {
    $("#logoutForm").on("submit", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out from your session.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, logout",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
});
