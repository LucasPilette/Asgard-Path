const headerEffect = document.getElementById('headerEffect');
const navList = document.querySelector('.navList');
const container = document.querySelector('.containerTop');
const header = document.querySelector('header')
const boxes = document.querySelectorAll('.box');
const logo = document.getElementById('logo');
const connection = document.getElementById('connection');
const modal = document.getElementById('modal');
const closeModal = document.getElementById('close');


window.addEventListener('scroll', ()=> {
    let scrollPos = window.scrollY;
    if(scrollPos >=100){
        headerEffect.className = 'blurEffect';
    } else {
        headerEffect.className ='invisEffect';
    }
})

window.addEventListener('scroll', ()=> {
    let scrollPos = window.scrollY;
    let containerHeight = (container.offsetHeight) 
    let headerHeight = (header.offsetHeight) 
    console.log(containerHeight)
    if(scrollPos >= (containerHeight-headerHeight)){
        navList.classList.add('navListWhite');
    } else {
        navList.classList.remove('navListWhite');
    }
})

document.querySelectorAll('li[href^="#"]').forEach(elem =>{
    elem.addEventListener("click", e => {
        e.preventDefault();
        document.querySelector(elem.getAttribute('href')).scrollIntoView({
            behavior:"smooth",
            offsetTop: 50
        });
    });
})

logo.addEventListener('click', () => {
    document.getElementById('home').scrollIntoView({
        behavior:"smooth",
        offsetTop: 50
    });
})


connection.addEventListener('click', ()=> {
    modal.style.display='block';
})

closeModal.addEventListener('click', ()=>{
    modal.style.display='none';
})


window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
