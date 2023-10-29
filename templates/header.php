<?php
    $logged = isset($_SESSION['name']) && isset($_SESSION['login']);
?>

<div id="header">
    <div id="logo">
        <img src="img/logo.png" alt="Shopping Planner">
        Minha lista de compras
    </div> 
    <div id="info">
        Data de acesso: <?= date('d.m.Y H:i'); ?> <br>
        Usuário: <?= $logged ? htmlspecialchars($_SESSION['name']) : "Ninguém está logado"; ?><br>
        <?php
            if ($logged) {
                ?>
                <a href= <?= "index.php?logout" ?>>Sair</a>
                <?php
            }
            else {
                ?>
                <a href="index.php">Entrar</a>
                <?php
            }
        ?>        
    </div>
</div>