// Yet Another Form Validation
const password = document.getElementById('rpass1');
const cpassword = document.getElementById('rpass2');
const alertPass = document.getElementById('rpass1-err');
const alertVPass = document.getElementById('rpass2-err');

function pwdValid() {
    const reg_num = /[0-9]/;
    const reg_low = /[a-z]/;
    const reg_upr = /[A-Z]/;
    const reg_schar = /[!@#$%^&*]/;
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

function pwdCompare() {
    const pass1 = password.value;
    const pass2 = cpassword.value;

    if (pass1 === pass2) {
        alertVPass.textContent = ""
    } else {
        alertVPass.textContent = "Passwords do not match"
    }
}

password.addEventListener('input', pwdValid);
password.addEventListener('input', pwdCompare);
cpassword.addEventListener('input', pwdCompare);