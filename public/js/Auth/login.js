// public\js\Auth\login.js
$(document).ready(function () {
    // Toggle password visibility
    $("#show-password").on("change", function () {
        var passwordField = $("#password");
        passwordField.attr(
            "type",
            $(this).is(":checked") ? "text" : "password"
        );
    });

    $("#loginForm").on("submit", function (e) {
        e.preventDefault();

        const formData = $(this).serialize();
        const submitButton = $(this).find("button[type='submit']");

        submitButton.prop("disabled", true).text("Logging in...");

        $.ajax({
            type: "POST",
            url: "/login",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect_to;
                }
            },
            error: function (xhr) {
                let errorMessage = "An error occurred.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                showAlert(errorMessage, "danger");

                submitButton.prop("disabled", false).text("Login");
            },
        });
    });
});
