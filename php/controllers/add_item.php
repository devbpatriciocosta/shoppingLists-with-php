<?php   
    include_once(__DIR__ . '/controller.php');

    if (!isset($_SESSION['login'])) {
        $rc = new error_code("Sua sessão expirou.");
    }

    else if (!isset($_POST['item']) || !isset($_COOKIE['last_visited_list']) || !isset($_POST['amount'])) {
        $rc = new error_code("Faltando parâmetros.");
    }

    else {
        $login = $_SESSION['login'];
        $list_id = $_COOKIE['last_visited_list'];   
        $item = $_POST['item'];     
        $amount = $_POST['amount'];      
        
        try {
            if (empty($item) || empty($amount)) {
                throw new Exception("Todos os campos precisam ser preenchidos.");
            }

            if (!is_numeric($amount) || ((int)$amount) < 1) {
                throw new Exception("Não foi possível adicionar um novo item, argumento inválido.");
            }
            
            $request = new mysqli_request();
            $result = $request->add_item($item, $amount, $list_id, $login);
            $rc = new success_code("Item adicionado com sucesso.", array('name' => htmlspecialchars($item), 'id' => $result, 'login' => htmlspecialchars($login)));
        }
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));
        }
    }