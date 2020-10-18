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
    let text = document.querySelector('#text');

    if (!text.value.length) {
        text.classList.add('error');
        valid = false;
        text.addEventListener('input', () => {
            if (text.value.length) {
                text.classList.remove('error');
            }
            if (!text.value.length < 4) {
                text.classList.add('error');
            }
        })
    }

    return valid;
}

function submitted(event) {
    event.preventDefault();
    add(event.target);
}

function add(form) {
    post(routes['ajaxQuestionAdd'], new FormData(form)).then((response) => {
        response = JSON.parse(response);
        if (response === 'OK') {
            let id = document.querySelector('#id');
            window.location.href = routes['roomDetail'].replace(':room', id.value);
        } else {
            let alert = document.querySelector('#alert');
            alert.classList.remove('hidden');
        }
    });
}
