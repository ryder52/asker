get = (url) => {
    let options = {
        method: 'GET'
    };
    return fetch(url, options).then(response => response.text());
};

post = (url, body) => {
    let options = {
        method: 'POST',
        body: body
    };
    return fetch(url, options).then(response => response.text());
};
