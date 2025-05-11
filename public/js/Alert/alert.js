// public\js\alert\alert.js
// Function to show success or error alerts with Tailwind
function showAlert(message, type = "success") {
    const alertBox = $("#alertBox");
    const alertMessage = $("#alertMessage");
    const responseContainer = $("#responseMessage");

    // Update styles based on type
    if (type === "success") {
        alertBox
            .removeClass()
            .addClass(
                "flex items-start gap-2 p-3 border border-green-400 bg-green-50 text-green-800 rounded-lg shadow-sm text-sm font-medium"
            );
        alertBox.find("svg").replaceWith(`
            <svg class="w-5 h-5 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        `);
    } else {
        alertBox
            .removeClass()
            .addClass(
                "flex items-start gap-2 p-3 border border-red-400 bg-red-50 text-red-800 rounded-lg shadow-sm text-sm font-medium"
            );
        alertBox.find("svg").replaceWith(`
            <svg class="w-5 h-5 text-red-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        `);
    }

    alertMessage.text(message);
    responseContainer.hide().removeClass("hidden").fadeIn();

    // Auto fade out
    setTimeout(() => {
        responseContainer.fadeOut(500);
    }, 3000);
}
