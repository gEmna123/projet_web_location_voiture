const menubtn = document.querySelector('.menubtn');
const navlinks = document.querySelector('.nav-links');
menubtn.addEventListener('click', ()=>{
navlinks.classList.toggle('menu-mobile');
});
const navLinks = document.querySelectorAll('.nav__link');

function linkAction() {
    const navMenu = document.getElementById('nav-links');
    navMenu.classList.remove('menu-mobile');
}

navLinks.forEach(link => {
    link.addEventListener('click', linkAction);
});

