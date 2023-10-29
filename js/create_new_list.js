function processListAddition(content) {
    if ('success' in content) {
        showMessage("lists_message", content['success'], "success", true);

        // Add a new node to DOM.
        let list = document.getElementById("lists").getElementsByTagName("ul")[0];
        let newLi = document.createElement("li");

        let newA = document.createElement("a");
        newA.setAttribute("data-id", content['payload']['id']);
        newA.innerHTML = content['payload']['name'];
        newLi.appendChild(newA);

        addOnClickEventToList(newLi);
        list.appendChild(newLi);
    }
    else if ('error' in content) {
        showMessage("lists_message", content['error'], "error", true);
    }
}

function addList(name) {
    let formData = new FormData();
    formData.append('controller', 'create_new_list');
    formData.append('name', name);

    sendControllerRequestAsync(formData)
    .then(x => processListAddition(x))
    .catch(function() {
        showMessage("lists_message", "Não foi possível criar uma nova lista.", "error");
    });
}

document.addEventListener('DOMContentLoaded', function() {
    let button = document.getElementById("create_new_list");

    button.addEventListener('click', function (event) {
        let name = prompt("Digite o nome da nova lista:", "");

        if (name !== null && name.trim()) {
            addList(name);
        }
    });
});