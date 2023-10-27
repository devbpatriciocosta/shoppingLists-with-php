<?php
    include(__DIR__ . '/php/session_start.php');
    include(__DIR__ . '/php/index_logic.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include('templates/head_contents.php'); ?> 
    </head>
    <body>
        <div id="content">  
            
            <?php include('templates/header.php'); ?>

            <div id="main">
                <div id="login">
                    <h2>Por favor, faça o login para acessar suas listas!</h2>
                    
                    <span id="login_message"></span>

                    <form action="./index.php" method="POST">
                        <input type="hidden" name="controller" value="login">
                        <table>
                            <tr>
                                <td>Usuário</td>
                                <td><input type="text" name="login" required></td>
                            </tr>
                            <tr>
                                <td>Senha:</td>
                                <td><input type="password" name="pw" required></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="blue" type="submit" name="submit" value="Log-in">
                                </td>
                            </tr>
                        </table>                   
                    </form>
                </div>

                <div id="signup">
                    <h2>Você não tem cadastro? Por favor, SIGN UP!</h2>

                    <span id="signup_message"></span>

                    <form action="./index.php" method="POST">
                        <input type="hidden" name="controller" value="signup">
                        <table>
                            <tr>
                                <td>Nome completo:</td>
                                <td><input type="text" name="fullname" maxlength="191" 
                                           pattern=".{5,}"
                                           title="Must contain at least 5 characters."
                                           required></td>
                            </tr>
                            <tr>
                                <td>Usuário:</td>
                                <td><input type="text" name="login" maxlength="191"
                                           pattern=".{5,}" 
                                           title="Must contain at least 5 characters."
                                           required></td>
                            </tr>
                            <tr>
                                <td>Senha:</td>
                                <td><input type="password" name="pw" maxlength="191"
                                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{6,}$" 
                                           title="Must contain at least one number, one special char, one uppercase and lowercase letter, and at least 6 or more characters." 
                                           required></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="green" type="submit" name="submit" value="Sign-up">
                                </td>
                            </tr>
                        </table>                       
                    </form>
                </div>
                <div class="spacer"></div>
            </div>
        </div>
    </body>
</html>