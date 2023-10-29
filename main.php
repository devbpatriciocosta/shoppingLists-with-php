<?php 
    include(__DIR__ . '/php/session_start.php');
    include(__DIR__ . '/php/main_logic.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include('templates/head_contents.php'); ?>
        <script src="js/list_entry.js" type="text/javascript"></script>  
        <script src="js/create_new_list.js" type="text/javascript"></script> 
        <script src="js/delete_list.js" type="text/javascript"></script> 
        <script src="js/load_datalist.js" type="text/javascript"></script>     
        <script src="js/load_list.js" type="text/javascript"></script>   
    </head>
    <body>
        <div id="content">   

            <?php include('templates/header.php'); ?>

            <div id="main">
                <div id="lists">
                    <ul>
                        <?php
                            include(__DIR__ . '/templates/print_lists.php');
                        ?>
                    </ul>
                    <ul>
                        <li id="create_new_list"><a>Criar uma nova lista</a></li>
                    </ul>
                    <ul>
                        <li id="search"><a href="searchLists.php">Buscar por listas para ver seus itens</a></li>
                    </ul>
                    <ul>
                        <li id="search"><a href="searchItems.php">Buscar por itens e ver em quais listas estão presentes</a></li>
                    </ul>
                    <span id="lists_message"></span>
                </div>
    
                <div id="current">
                    <span id="list_message"></span>
                    <div id="list"></div>
                </div>

                <div class="spacer"></div>
            </div>
        </div>
    </body>
</html>