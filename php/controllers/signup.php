<?php
    include_once(__DIR__ . '/controller.php');

    if (!isset($_POST['fullname']) || !isset($_POST['login']) || !isset($_POST['pw'])) {
        $rc = new error_code("Faltando parâmetros.");
    }

    else {
        $fullname = $_POST['fullname'];
        $login = $_POST['login'];
        $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

        try {
            if (empty($fullname) || empty($login) || empty($pw)) {
                throw new Exception("Todos os campos precisam ser preenchidos.");
            }

            $request = new mysqli_request();
            $result = $request->sign_up($fullname, $login, $pw);
            
            $rc = new success_code("Cadastro efetuado com sucesso.", array(
                'fullname' => htmlspecialchars($fullname), 
                'login' => htmlspecialchars($login), 
                'pw' => htmlspecialchars($pw), 
                'id' => $result)
            );
        }
        catch (Exception $e) {
            $rc = new error_code(htmlspecialchars($e->getMessage()));
        }
    }