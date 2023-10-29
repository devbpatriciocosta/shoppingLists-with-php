<?php   
    include_once(__DIR__ . '/controller.php');

    if (!isset($_SESSION['login'])) {
        $rc = new error_code("Sua sessão expirou.");
    }

    else if (!isset($_POST['id'])) {
        $rc = new error_code("Faltando parâmetros.");
    }

    else {
        $login = $_SESSION['login'];
        $id = $_POST['id'];    
        
        try {
            $request = new mysqli_request();
            $result = $request->delete_list($id, $login);
            $rc = new success_code("Lista deletada com sucesso.", $result);
        }
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));
        }
    }