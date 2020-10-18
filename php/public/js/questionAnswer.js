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
    let answer = document.querySelector('#answer');

    if (!answer.value.length) {
        answer.classList.add('error');
        valid = false;
        answer.addEventListener('input', () => {
            if (answer.value.length) {
                answer.classList.remove('error');
            }
            if (!answer.value.length < 4) {
                answer.classList.add('error');
            }
        })
    }

    return valid;
}

function submitted(event) {
    event.preventDefault();
    answer(event.target);
}

function answer(form) {
    let id = document.querySelector('#id');

    post(routes['ajaxQuestionAnswer'].replace(':question', id.value), new FormData(form)).then((response) => {
        response = JSON.parse(response);
        if (response === 'OK') {
            window.location.href = routes['roomDetail'].replace(':room', room);
        } else {
            let alert = document.querySelector('#alert');
            alert.classList.remove('hidden');
        }
    });
}
