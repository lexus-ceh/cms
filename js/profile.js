let buttonEl = document.getElementById('btn-subscribe')
buttonEl.addEventListener('click', function (event) {
    event.preventDefault();
    if (buttonEl.classList.contains('btn-danger')) {
        let promise = changeSubscription('subscribe')
        promise.then(response => {
            if (response == 'success') {
                buttonEl.classList.remove('btn-danger')
                buttonEl.classList.add('btn-outline-secondary')
                buttonEl.innerText = 'Отменить подписку'
            }
        });
        //buttonEl.classList.remove('active')
    } else {
        let promise = changeSubscription('unsubscribe')
        promise.then(response => {
            if (response == 'success') {
                buttonEl.classList.add('btn-danger')
                buttonEl.classList.remove('btn-outline-secondary')
                buttonEl.innerText = 'Подписаться'
            }
        });
        //buttonEl.classList.remove('active')
    }
})
