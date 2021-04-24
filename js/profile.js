let buttonEl = document.getElementById('btn-subscribe')
buttonEl.addEventListener('click', function (event) {
    event.preventDefault();
    if (buttonEl.classList.contains('btn-danger')) {
        buttonEl.classList.remove('btn-danger')
        buttonEl.classList.add('btn-outline-secondary')
        buttonEl.innerText = 'Отменить подписку'
        //buttonEl.classList.remove('active')
    } else {
        buttonEl.classList.add('btn-danger')
        buttonEl.classList.remove('btn-outline-secondary')
        buttonEl.innerText = 'Подписаться'
        //buttonEl.classList.remove('active')
    }
})
