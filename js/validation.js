// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

    // var passwordValidation = document.getElementById('validation-password');
    // var passwordValidationConf = document.getElementById('validation-password-conf');
    //
    // passwordValidationConf.addEventListener('change', function () {
    //     if (passwordValidation.value !== passwordValidationConf.value) {
    //         passwordValidationConf.validity.valid = false;
    //     }
    // })

})()

function validation_conf(pw2) {
    var passwordValidation = document.getElementById('validation-password');
    if (pw2.value !== passwordValidation.value) {
        pw2.setCustomValidity("Пароли не совпадают!");
    } else {
        pw2.setCustomValidity(""); // is valid
    }
}