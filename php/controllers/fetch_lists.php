<?php
    include_once(__DIR__ . '/controller.php');

    if (!isset($_SESSION['login'])) {
        $rc = new error_code("Sua sessão expirou.");
    }

    else {
        $login = $_SESSION['login'];

        try {                
            $request = new mysqli_request();
            $lists = $request->fetch_lists($login);    

            $sanitized_lists = array();
            foreach ($lists as $list) {
                $sanitized_lists[] = array(
                    'id' => $list['id'],
                    'name' => htmlspecialchars($list['name'])
                );
            }

            $rc = new success_code("Listas carregadas com sucesso.", $sanitized_lists);
        }
    
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));            
        }
    }