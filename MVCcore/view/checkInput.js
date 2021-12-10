let email = document.getElementById('email');
let errorEmail = document.getElementById('errorEmail');
let password = document.getElementById('password');
let eye = document.getElementById('eye');
let btn = document.querySelector('span i');
let rePassword = document.getElementById('rePassword');
let errorPass = document.getElementById('errorPass');

email.addEventListener('change', function () {
    let emailInput = email.value;
    if(!is_email(emailInput)){
        errorEmail.innerText = 'Wrong email';
        errorEmail.style.color = 'red';
        errorEmail.style.fontSize = '0.5em';
    } else {
        errorEmail.innerText = "";
    }
});

function is_email(str) {
    let regexp = /^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/;
    return regexp.test(str)
    // return str.match(regexp);
}

btn.addEventListener('click', function () {
    if (password.type == 'password') {
        password.type = 'text';
        btn.classList.value = 'far fa-eye-slash';
    } else {
        password.type = 'password';
        btn.classList.value = 'far fa-eye'
    }
})
password.addEventListener('change', function () {
    checkRePassword()
});
rePassword.addEventListener('change', function () {
    checkRePassword()
});
function checkRePassword() {
    let inputPass = password.value;
    let inputRePass = rePassword.value;
    if (inputRePass != '' && inputRePass != inputPass) {
        errorPass.innerText = 'Wrong password';
        errorPass.style.color = 'red';
        errorPass.style.fontSize = '0.5em';
    } else {
        errorPass.innerText = "";
    }
}