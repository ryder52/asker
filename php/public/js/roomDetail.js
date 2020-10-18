const likeButtons = document.querySelectorAll('.like');
const dislikeButtons = document.querySelectorAll('.dislike');

likeButtons.forEach(el => el.addEventListener('click', event => {
    vote(true, event.target.value, event.target);
}));

dislikeButtons.forEach(el => el.addEventListener('click', event => {
    vote(false, event.target.value, event.target);
}));

const setCookie = (cookieKey, cookieValue, expirationDays) => {
    let expiryDate = '';

    if (expirationDays) {
        const date = new Date();
        date.setTime(+`${date.getTime()}${(expirationDays || 30 * 24 * 60 * 60 * 1000)}`);
        expiryDate = `; expiryDate=" ${date.toUTCString()}`;
    }
    document.cookie = `${cookieKey}=${cookieValue || ''}${expiryDate}; path=/`;
}

const getCookie = (cookieKey) => {
    let cookieName = `${cookieKey}=`;
    let cookieArray = document.cookie.split(';');

    for (let cookie of cookieArray) {
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
}

function vote(action, question, element) {
    const voted = getCookie('voted');
    action = action ? 'like' : 'dislike';
    if (voted) {
        let votedIds = JSON.parse(voted);
        if (!votedIds.includes(question)) {
            votedIds.push(question);
            setCookie('voted', JSON.stringify(votedIds), 7);
            sendVote(action, question, element);
        }
    } else {
        let votedIds = [question];
        setCookie('voted', JSON.stringify(votedIds), 7);
        sendVote(action, question, element);
    }
}

function sendVote(action, question, element) {
    get(routes['ajaxQuestionReact'].replace(':id', question).replace(':action', action)).then(() => {
        let count = element.dataset.count;
        count++;
        element.dataset.count = count;
        element.innerHTML = action.charAt(0).toUpperCase() + action.slice(1) + ' ' + count;
    });
}
