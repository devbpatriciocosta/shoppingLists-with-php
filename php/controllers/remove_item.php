<?php   
    include_once(__DIR__ . '/controller.php');

    if (!isset($_SESSION['login'])) {
        $rc = new error_code("Sua sessão expirou.");
    }

    else if (!isset($_POST['id']) || !isset($_COOKIE['last_visited_list'])) {
        $rc = new error_code("Faltando parâmetros.");
    }

    else {
        $login = $_SESSION['login'];
        $list_id = $_COOKIE['last_visited_list'];   
        $id = $_POST['id'];  

        try {
            $request = new mysqli_request();
            $result = $request->remove_item($id, $list_id, $login);
            $rc = new success_code("Item removido com sucesso.", $result);
        }
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));
        }
    }