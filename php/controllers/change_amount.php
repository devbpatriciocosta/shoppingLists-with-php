<?php   
    include_once(__DIR__ . '/controller.php');

    if (!isset($_SESSION['login'])) {
        $rc = new error_code("Sessão expirada.");
    }

    else if (!isset($_POST['id']) || !isset($_POST['amount']) || !isset($_COOKIE['last_visited_list'])) {
        $rc = new error_code("Faltando parâmetros.");
    }

    else {
        $login = $_SESSION['login'];
        $list_id = $_COOKIE['last_visited_list'];   
        $id = $_POST['id'];  
        $amount = $_POST['amount'];          

        try {
            if (empty($amount)) {
                throw new Exception("Todos os campos precisam ser preenchidos.");
            }

            if (!is_numeric($amount) || ((int)$amount) < 1) {
                throw new Exception("Não foi possível editar item, argumento inválido.");
            }
            
            $request = new mysqli_request();
            $result = $request->change_amount($id, $amount, $list_id, $login);
            $rc = new success_code("Item editado com sucesso.", $result);
        }
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));
        }
    }