<?php   
    include_once(__DIR__ . '/controller.php');

    if (!isset($_SESSION['login'])) {
        $rc = new error_code("Sua sessão expirou");
    }

    else if (!isset($_POST['id1']) || !isset($_POST['id2']) || !isset($_COOKIE['last_visited_list'])) {
        $rc = new error_code("Faltando parâmetros.");
    }

    else {
        $login = $_SESSION['login'];
        $list_id = $_COOKIE['last_visited_list'];   
        $id1 = $_POST['id1'];  
        $id2 = $_POST['id2'];

        try {
            $request = new mysqli_request();
            $result = $request->swap_items($id1, $id2, $list_id, $login);
            $rc = new success_code("Ordem dos items modificada com sucesso.", $result);
        }
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));
        }
    }