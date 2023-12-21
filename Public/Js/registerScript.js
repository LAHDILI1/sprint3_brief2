document.addEventListener('DOMContentLoaded', function () {
    // Add your JavaScript code here
    // This could include form validation logic using Bootstrap's classes and functions
    // For example, using Bootstrap's tooltip to show error messages
    var form = document.getElementById('registerForm');

    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    });
});
