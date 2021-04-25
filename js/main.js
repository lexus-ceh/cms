let submitSubscription = document.getElementById('formSubscribe')

submitSubscription.addEventListener('submit', function (event) {
    event.preventDefault();
    if (submitSubscription.checkValidity()) {
        let email = submitSubscription[0].value
        let promise = changeSubscription('subscribe', email)
        promise.then(response => {
            if (response == 'success') {
                let success = document.querySelector('.valid-feedback')
                success.style.display = "block"
                if (submitSubscription[0].readOnly) {
                    setTimeout(() => submitSubscription.style.display = 'none', 2000);
                }
            }
        });
    }
})