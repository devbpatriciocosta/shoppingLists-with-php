const url = "/shopping-lists-php" // Change this if moving to another server. This serves for AJAX purposes to create an absolute URL.

function showMessage(id, message, className, fade = false) {
    let element = document.getElementById(id);
    if (element !== null) {
        element.className = className;
        element.innerText = message;
        
        element.style.opacity = 1;
        if (fade) {         
            setTimeout(function() { 
                element.style.opacity = 0;
            }, 5000);
        }

        if (window.location.href.indexOf("?") != -1) {
            window.history.replaceState(null, null, window.location.pathname); // Remove the message from GET so it does not show again in case of reload.
        }
    }
}

function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    return parts.length == 2 ? parts.pop().split(";").shift() : null;
}

function setCookie(name, value) {
    document.cookie = name + "=" + value + ";";
}

function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }

function formatDate(date) {
    let diff = new Date() - date; 

    if (diff < 1000) { 
        return 'right now';
    }

    let sec = Math.floor(diff / 1000); 

    if (sec < 60) {
        return sec + ' seconds ago';
    }

    let min = Math.floor(diff / 60000); 
    if (min < 60) {
        return min == 1 ? "a minute ago" : min + ' minutes ago';
    }

    let d = new Date(date);
    d = [
        '0' + d.getDate(),
        '0' + (d.getMonth() + 1),
        '' + d.getFullYear(),
        '0' + d.getHours(),
        '0' + d.getMinutes()
    ].map(component => component.slice(-2)); 

    return d.slice(0, 3).join('.') + ' ' + d.slice(3).join(':');
}

function decodeEntities(html) {
	let txt = document.createElement('textarea');
	txt.innerHTML = html;
	return txt.value;
};

function sendControllerRequestAsync(formData) {
    return fetch(url + "/php/controllers/controller.php", {
        method: 'POST',
        body: formData
    })
    .then(x => {
        if (!x.ok) {
            throw Error();
        }
        return x.json();
    })
}