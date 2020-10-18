document.querySelector("#submit").addEventListener("click", function (event) {
    if (checkForm()) {
        let form = document.querySelector("#form");
        form.onsubmit = submitted.bind(form);
    } else {
        event.preventDefault();
    }
});

function checkForm() {
    let valid = true;
    let username = document.querySelector('#username');
    let password = document.querySelector('#password');
    let verifyPassword = document.querySelector('#verify-password');

    if (username.value.length < 4) {
        username.classList.add('error');
        valid = false;
        username.addEventListener('input', () => {
            if (username.value.length >= 8) {
                username.classList.remove('error');
            }
            if (username.value.length < 8) {
                username.classList.add('error');
            }
        })
    }

    if (password.value.length < 8) {
        password.classList.add('error');
        valid = false;
        password.addEventListener('input', () => {
            if (password.value.length >= 8) {
                password.classList.remove('error');
            }
            if (password.value.length < 8) {
                password.classList.add('error');
            }
        })
    }

    if (password.value !== verifyPassword.value) {
        verifyPassword.classList.add('error');
        valid = false;
        verifyPassword.addEventListener('input', () => {
            if (password.value === verifyPassword.value) {
                password.classList.remove('error');
            }
            if (password.value !== verifyPassword.value) {
                password.classList.add('error');
            }
        })
    }

    return valid;
}

function submitted(event) {
    event.preventDefault();
    register(event.target);
}

function register(form) {
    post(routes['ajaxRegister'], new FormData(form)).then((response) => {
        response = JSON.parse(response);
        if (response === 'OK') {
            window.location.href = routes['userLogin'];
        } else {
            let alert = document.querySelector('#alert');
            alert.classList.remove('hidden');
        }
    });
}
