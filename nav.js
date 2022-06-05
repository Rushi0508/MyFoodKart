burger = document.querySelector('.burger')
navbar = document.querySelector('.navbar')
buttons = document.querySelector('.buttons')
navlist = document.querySelector('.nav-list')
logo = document.querySelector('.title')

burger.addEventListener('click', ()=>{
    navlist.classList.toggle('v-class');
    buttons.classList.toggle('v-class');
    navbar.classList.toggle('h-nav');
    logo.classList.toggle('v-class');

})