import './bootstrap';


const replyBtns = document.querySelectorAll('#reply-btn')

replyBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        btn.nextElementSibling.classList.toggle('d-none')
    })
})
