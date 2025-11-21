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
        alertVPass.textContent = ""
    } else {
        alertVPass.textContent = "Passwords do not match"
    }
}

function pwdValid() {
    const reg_num = /[0-9]/;
    const reg_low = /[a-z]/;
    const reg_upr = /[A-Z]/;
    const reg_schar = /[\W]/;
    const reg_space = /[\s]/;
    const pass1 = password.value;

    if (pass1.length < 8) { 
        alertPass.textContent = "Should be at least 8 characters long";
    } else if (!reg_low.test(pass1)) {
        alertPass.textContent = "Should contain at least one lowercase";
    } else if (!reg_upr.test(pass1)) {
        alertPass.textContent = "Should contain at least one uppercase";
    } else if (!reg_num.test(pass1)) {
        alertPass.textContent = "Should contain at least one number";
    } else if (!reg_schar.test(pass1)) {
        alertPass.textContent = "Should contain at least one special character";
    } else if (reg_space.test(pass1)) {
        alertPass.textContent = "Should not contain any spaces";
    } else {
        alertPass.textContent = "";
    }
}

username.addEventListener('input', function(event) {
    const usrInput = event.target.value;
    if (usrInput === "") {
        alertUsr.textContent = "Invalid Username!";
    } else if (usrInput.length < 4) {
        alertUsr.textContent = "Username should be at least be 4 characters long";
    } else {
        alertUsr.textContent = "";
    }
});

email.addEventListener('input', function(event) {
    const emailInput = event.target.value;
    if (emailInput === "") {
        alertMail.textContent = "Invalid Email!";
    } else {
        alertMail.textContent = "";
    }
});

phone.addEventListener('input', function(event) {
    const phoneInput = event.target.value;
    if (phoneInput === "") {
        alertPhone.textContent = "Invalid Phone Number!";
    } else if (!/[\d+]/.test(phoneInput)) { 
        alertPhone.textContent = "Should only contain numbers";
    } else if (!/09\d{9}/.test(phoneInput)) {
        alertPhone.textContent = "Should start with 09... and 11 characters long";
    } else {
        alertPhone.textContent = "";
    }
});

password.addEventListener('input', pwdValid);
password.addEventListener('input', pwdCompare);
cpassword.addEventListener('input', pwdCompare);
