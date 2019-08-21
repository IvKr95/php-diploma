
/**
 * Основная функция для совершения запросов
 * на сервер.
 * */

const createRequest = (options = {}) => {

    const xhr = new XMLHttpRequest();

    if (options.method === 'GET') {
        try {
            xhr.open('GET', modifyURL(options));
            xhr.responseType = options.responseType;
            xhr.send();
        } catch(e) {
            options.callback(e, null);
        };          
    } else {
        try {
            xhr.open(options.method, options.url);
            xhr.responseType = options.responseType;
            xhr.send(options.data);
        } catch(e) {
            options.callback(e, null);
        };
    };

    xhr.ontimeout = 10000;

    xhr.addEventListener('load', e => {
        
        if (xhr.status === 200) {
            options.callback(null, xhr.response);
        } else {
            options.callback('Ошибка', null);
        };
        
        e.preventDefault();
    });
};

function modifyURL(options) {

    if (options.data === undefined || Object.keys(options.data).length === 0) {
        return options.url;
    };

    let modifiedURL = options.url + '?';

    for (const key in options.data) {
        modifiedURL += key + '=' + options.data[key] + '&';
    };

    return modifiedURL;
};