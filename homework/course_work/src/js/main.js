const mainNavBtns = document.querySelectorAll('.header__main-link');
const subNavBtns = document.querySelectorAll('.header__sub-link');
const subNav = document.querySelector('.header__sub-nav');
const alertBtn = document.querySelector('.alert-btn');
const addPostBtn = document.getElementById('add-post');

function changeMainNavLink(id) {
    let item = document.getElementById(id);
    for (let link of mainNavBtns) {
        if (link.id !== item.id) {
            link.classList.remove('header__main-link--active');
        }
        else {
            if (!link.classList.contains('header__main-link--active')) {
                link.classList.add('header__main-link--active');
                if (item.id === 'channels') {
                    subNav.style.display = 'flex';
                }
                else {
                    subNav.style.display = 'none';
                }
            }
        }
    }
}

function changeSubNavLink(id) {
    if (!id) return;
    let item = document.getElementById(id);
    for (let link of subNavBtns) {
        if (link.id !== item.id) {
            link.classList.remove('header__sub-link--active');
        }
        else {
            if (!link.classList.contains('header__sub-link--active')) {
            link.classList.add('header__sub-link--active');
        }
        }
    }
}


if (alertBtn) {
    alertBtn.addEventListener('click', ()=>{
        document.querySelector('.alert').style.display = 'none';
    })
}

if (addPostBtn) {
    addPostBtn.addEventListener('click', ()=>{
        document.querySelector('.post-form').classList.toggle('post-form--hidden');
    })
}