let confirmedPassword = document.getElementById('confirmedPassword');
let password = document.getElementById('password');

password.addEventListener('keyup', () => {
    if(password.value.length >= 8){
        password.classList.remove('redBorder');
        password.classList.add('greenBorder');

} else {
        password.classList.remove('greenBorder');
        password.classList.add('redBorder');
}})

confirmedPassword.addEventListener('keyup', () => {
    if( password.value.length >= 8 && confirmedPassword.value == password.value){
        confirmedPassword.classList.remove('redBorder');
        confirmedPassword.classList.add('greenBorder');
} else {
        confirmedPassword.classList.remove('greenBorder');
        confirmedPassword.classList.add('redBorder');
}})

