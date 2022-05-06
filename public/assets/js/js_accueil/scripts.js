const headerEffect = document.getElementById('headerEffect');
const navList = document.querySelector('.navList');
const container = document.querySelector('.containerTop');
const header = document.querySelector('header')
const boxes = document.querySelectorAll('.box');
const logo = document.getElementById('logo');
const connection = document.querySelectorAll('.connection');
const modal = document.getElementById('modal');
const closeModal = document.getElementById('close');
const burgersvg = document.getElementById('burgersvg');
const listNavMobile = document.querySelector('.listNavMobile')

window.addEventListener('scroll', () => {
    let scrollPos = window.scrollY;
    if (scrollPos >= 100) {
        headerEffect.className = 'blurEffect';
    } else {
        headerEffect.className = 'invisEffect';
    }
})

window.addEventListener('scroll', () => {
    let scrollPos = window.scrollY;
    let containerHeight = (container.offsetHeight)
    let headerHeight = (header.offsetHeight)
    if (scrollPos >= (containerHeight - headerHeight)) {
        navList.classList.add('navListWhite');
    } else {
        navList.classList.remove('navListWhite');
    }
})

document.querySelectorAll('li[href^="#"]').forEach(elem => {
    elem.addEventListener("click", e => {
        e.preventDefault();
        document.querySelector(elem.getAttribute('href')).scrollIntoView({
            behavior: "smooth",
            offsetTop: 50
        });
    });
})

logo.addEventListener('click', () => {
    document.getElementById('home').scrollIntoView({
        behavior: "smooth",
        offsetTop: 50
    });
})

connection.forEach( elem => {
    elem.addEventListener('click', () => {
        modal.style.display = 'block';
    })
})


closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
})


window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



burgersvg.addEventListener('click',()=> {
    if (listNavMobile.style.display === "block"){
        listNavMobile.style.display = "none";
    } else {
        listNavMobile.style.display = "block";
    }
})

login.addEventListener('keyup', () => {
    if(login.value.length >= 4){
        let formLogin = new FormData();
        formLogin.append('login',login.value);
        formLogin.append('ajax',true);
        fetch('/controllers/page-controller-home.php', {
            method: 'POST',
            body : formLogin
        } )
        .then(response => response.json())
        .then(userCheck =>  {
                if (userCheck == login.value){
                    login.classList.remove('redBorder');
                    login.classList.add('greenBorder');

                } else {
                    login.classList.remove('greenBorder');
                    login.classList.add('redBorder');
                }
        })
    } else {
        login.classList.remove('greenBorder');
        login.classList.remove('redBorder');
    }

} )



showPassword.addEventListener('change', () => {
    if(password.type === "password"){
        password.type = "text"
    } else {
        password.type = "password"
    }
})
