<?php   
    include_once(__DIR__ . '/controller.php');

    if (!isset($_SESSION['login'])) {
        $rc = new error_code("Sua sessão expirou.");
    }

    else if (!isset($_POST['name'])) {
        $rc = new error_code("Parâmetros inválidos.");
    }

    else {
        $login = $_SESSION['login'];
        $name = $_POST['name'];    
        
        try {
            if (empty($name)) {
                throw new Exception("Todos os campos precisam ser preenchidos.");
            }
            
            $request = new mysqli_request();
            $result = $request->create_new_list($name, $login);
            $rc = new success_code("A nova lista foi criada com sucesso.", array('name' => htmlspecialchars($name), 'login' => $login, 'id' => $result));
        }
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));
        }
    }