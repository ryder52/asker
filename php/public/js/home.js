document.querySelector("#connect").addEventListener("click", () => {
    let id = document.querySelector('#id');
    if (id.value.length === 10) {
        window.location.href = routes['roomDetail'].replace(':room', id.value);
    } else {
        id.classList.add('error');
    }
});

const create = document.querySelector('#create');
if (create) {
    create.addEventListener("click", function (event) {
        event.preventDefault();
        if (checkForm()) {
            let formData = new FormData;
            formData.append('name', document.querySelector('#name').value);
            add(formData);
        }
    });
}


function checkForm() {
    let valid = true;
    let name = document.querySelector('#name');

    if (name.value.length < 4) {
        name.classList.add('error');
        valid = false;
        name.addEventListener('input', () => {
            if (name.value.length >= 4) {
                name.classList.remove('error');
            }
            if (name.value.length < 4) {
                name.classList.add('error');
            }
        })
    }

    return valid;
}

function add(formData) {
    post(routes['ajaxRoomAdd'], formData).then((response) => {
        response = JSON.parse(response);
        if (response !== 'INVALID') {
            window.location.href = routes['roomDetail'].replace(':room', response);
        } else {
            let alert = document.querySelector('#alert');
            alert.classList.remove('hidden');
        }
    });
}
