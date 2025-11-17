// WOW
const email = document.getElementById('rmail');
const alertMail = document.getElementById('rmail-err');

email.addEventListener('input', function(event) {
    const emailInput = event.target.value;
    if (emailInput === "") {
        alertMail.textContent = "Invalid Email!";
    } else {
        alertMail.textContent = "";
    }
});