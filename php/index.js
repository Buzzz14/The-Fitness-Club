function validatePasswords() {
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;

    if (password !== cpassword) {
        alert("Passwords do not match!!!");
        return false;
    }
    return true;
}

const urlParams = new URLSearchParams(window.location.search);
const signup = urlParams.get('signup');

if (signup === 'success') {
    alert("Congratulations! You are all signed up. Time to log in and get started!");
}

