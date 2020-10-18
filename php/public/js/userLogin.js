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

    if (username.value.length < 4) {
        username.classList.add('error');
        valid = false;
        username.addEventListener('input', () => {
            if (username.value.length >= 4) {
                username.classList.remove('error');
            }
            if (username.value.length < 4) {
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

    return valid;
}

function submitted(event) {
    event.preventDefault();
    login(event.target);
}

function login(form) {
    post(routes['ajaxLogin'], new FormData(form)).then((response) => {
        response = JSON.parse(response);
        if (response === 'OK') {
            window.location.href = routes['home'];
        } else {
            let alert = document.querySelector('#alert');
            alert.classList.remove('hidden');
        }
    });
}
