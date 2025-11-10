// Form Validation
const username = document.getElementById('regusr_input');
const email = document.getElementById('regmail_input');
const phone = document.getElementById('regphone_input');
const password = document.getElementById('regpwd_input');
const cpassword = document.getElementById('validpwd_input');
const alertUsr = document.getElementById('usr-err');
const alertPhone = document.getElementById('phone-err');
const alertPass = document.getElementById('pwd-err');
const alertVPass = document.getElementById('vpwd-err');
const alertMail = document.getElementById('mail-err');

function pwdCompare() {
    const pass1 = password.value;
    const pass2 = cpassword.value;

    if (pass1 === pass2) {
        alertVPass.innerText = ""
    } else {
        alertVPass.innerText = "Passwords do not match"
    }
}

function pwdValid() {
    const reg_num = /[0-9]/;
    const reg_low = /[a-z]/;
    const reg_upr = /[A-Z]/;
    const reg_schar = /[!@#$%^&*]/;
    const reg_space = /[\s]/;
    const pass1 = password.value;

    if (pass1.length < 8) { 
        alertPass.innerText = "Should be at least 8 characters long";
    } else if (!reg_low.test(pass1)) {
        alertPass.innerText = "Should contain at least one lowercase";
    } else if (!reg_upr.test(pass1)) {
        alertPass.innerText = "Should contain at least one uppercase";
    } else if (!reg_num.test(pass1)) {
        alertPass.innerText = "Should contain at least one number";
    } else if (!reg_schar.test(pass1)) {
        alertPass.innerText = "Should contain at least one special character";
    } else if (reg_space.test(pass1)) {
        alertPass.innerText = "Should not contain any spaces";
    } else {
        alertPass.innerText = "";
    }
}

username.addEventListener('input', function(event) {
    const usrInput = event.target.value;
    if (usrInput === "") {
        alertUsr.innerText = "Invalid Username!";
    } else if (usrInput.length < 4) {
        alertUsr.innerText = "Username should be at least be 4 characters long";
    } else {
        alertUsr.innerText = "";
    }
});

email.addEventListener('input', function(event) {
    const emailInput = event.target.value;
    if (emailInput === "") {
        alertMail.innerText = "Invalid Email!";
    } else {
        alertMail.innerText = "";
    }
});

phone.addEventListener('input', function(event) {
    const phoneInput = event.target.value;
    if (phoneInput === "") {
        alertPhone.innerText = "Invalid Phone Number!";
    } else if (!/[0-9]/.test(phoneInput)) { 
        alertPhone.innerText = "Should only contain numbers";
    } else {
        alertPhone.innerText = "";
    }
});

password.addEventListener('input', pwdValid);
password.addEventListener('input', pwdCompare);
cpassword.addEventListener('input', pwdCompare);
