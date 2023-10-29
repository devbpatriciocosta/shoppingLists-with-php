function processListDeletion(content) {
    if ('error' in content) {
        throw new Error();
    }
    else if ('success' in content) {
        let id = content['payload']['id'];
        document.getElementById("list").innerHTML = "";

        let listItems = document.getElementById("lists").firstElementChild.getElementsByTagName("li");
        for (let i = 0; i < listItems.length; ++i) {
            let listId = listItems[i].firstElementChild.getAttribute("data-id");
            if (listId == id) {
                listItems[i].parentNode.removeChild(listItems[i]);
                break;
            }
        }

        deleteCookie("last_visited_list");
        showMessage("lists_message", "Lista deletada com sucesso.", "success", true);
    }
}

function deleteList(id) {
    let res = confirm("Você tem certeza que quer deletar essa lista? Essa ação não pode ser desfeita!");
    if (res) {
        let formData = new FormData();
        formData.append('controller', 'delete_list');
        formData.append('id', id);

        sendControllerRequestAsync(formData)
        .then(x => processListDeletion(x))
        .catch(function() {
            showMessage("list_message", "Não foi possível deletar a lista", "error");
        });

    }
}