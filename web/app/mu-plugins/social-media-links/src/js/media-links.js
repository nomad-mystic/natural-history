const mediaLinksFunctions = function() {

    const init = function() {
        window.addEventListener('load', function(event) {
            if (!window.location.href.includes('media-links')) {
                return;
            }

            const mediaForm = window.document.getElementById('media-links-form');
            mediaForm.addEventListener('submit', function(event) {
                // event.preventDefault();
                // console.log(media_links_exchanger.ajax_url);
                // Example POST method implementation:

            //     const formData = {};
            //     let elements = event.target.elements;
            //     console.log(elements);
            //     let elementsLength = event.target.elements.length;
            //     for (let i = 0; i < elementsLength; i++) {
            //         let inputName = '';
            //         if ('Submit' !== elements[i].value && 'Submit' !== elements[i].name) {
            //             inputName = elements[i].name;
            //             // console.log(inputName);
            //             // console.log(elements[i].value);
            //             // console.log(elements[i].name);
            //             formData[inputName] = elements[i].value;
            //         }
            //     }
            //     // http://192.168.10.10/wp-json/wp/v2/posts/100
            //     console.log(formData);
            //     console.log(typeof formData);
            //     // postData(`${media_links_exchanger.ajax_url}`, formData)
            //     postData('http://192.168.10.10/wp-json/wp/v2/posts/100', formData)
            //         .then(function(data) {
            //             console.log('testing this was called postData');
            //              console.log(JSON.stringify(data));
            //         }) // JSON-string from `response.json()` call
            //         .catch(error => console.error(error));
            }, false);
        }, false);
    };

    const postData = function(url = ``, data = {}) {
        // Default options are marked with *
        return fetch(url, {
            method: "POST", // *GET, POST, PUT, DELETE, etc.
            // mode: "cors", // no-cors, cors, *same-origin
            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
            credentials: "same-origin", // include, *same-origin, omit
            headers: {
                "Content-Type": "application/json; charset=utf-8",
                // "Content-Type": "application/x-www-form-urlencoded",
            },
            redirect: "follow", // manual, *follow, error
            referrer: "no-referrer", // no-referrer, *client
            body: JSON.stringify(data), // body data type must match "Content-Type" header
        }).then(function(response) {
            console.log(response);
            return response.json();
        });
    };

    return init;
};

let init = mediaLinksFunctions();
init();
