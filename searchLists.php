<?php 
    include(__DIR__ . '/php/session_start.php');
    include(__DIR__ . '/php/main_logic.php');
    include(__DIR__ . '/db/db_proc.php');
    include(__DIR__ . '/db/db_config.php');
?>

<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'lxtec-shopping-list');
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
                        <li id="search">Pesquisar por listas para ver seus itens</li>
                    </ul>
                </div>

                <div>
                    <div id="inputContainer">
                            <form method="post" class="formStyle">
                                <input class="inputStyle" type="text" placeholder="Pesquisar" name="search"/>
                                <button class="red searchButton" name="submit">Buscar</button>
                            </form>

                            <div class="container">
                                        <?php 
                                            if(isset($_POST['submit'])) {
                                                $search=$_POST['search'];

                                                // Use the mysqli class to query the database
                                                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

                                                if ($mysqli->connect_error) {
                                                    die("Connection failed: " . $mysqli->connect_error);
                                                }

                                                $search = mysqli_real_escape_string($mysqli, $search); // Sanitize the input to prevent SQL injection

                                                $sql = "SELECT l.id, l.name, li.list_id, i.name AS item_name
                                                            FROM lists AS l
                                                            LEFT JOIN list AS li ON l.id = li.list_id
                                                            LEFT JOIN items AS i ON li.item_id = i.id
                                                            WHERE l.name = '$search'";

                                                    $result = $mysqli->query($sql);

                                                    if ($result) {
                                                        if ($result->num_rows > 0) {
                                                            $previousListName = ''; // Initialize a variable to store the previous list name

                                                            while ($row = $result->fetch_assoc()) {
                                                                $listId = $row['id'];
                                                                $listName = $row['name'];
                                                                $listIdFromListTable = $row['list_id'];
                                                                $itemName = $row['item_name'];
                                                                
                                                                // Check if the list name has changed
                                                                if ($listName !== $previousListName) {
                                                                    // Display the list name
                                                                    echo ' <strong> Lista: </strong> ' . $listName . '<br>';
                                                                    $previousListName = $listName; // Update the previous list name
                                                                }
                                                                // Display the item name
                                                                echo '<div style="text-align: center; margin-top: 20px;">' . $itemName . '</div><br>';
                                                            }
                                                        } else {
                                                            echo '<h2>Nenhuma lista ou item com esse nome foi encontrado(a)</h2>';
                                                        }
                                                    }
                                                $mysqli->close(); // Fechar a conexão com o banco de dados quando terminar.
                                            }
                                        ?>
                                  <ul>
                                    <li id="backPage">
                                        <a href="main.php">Voltar</a>
                                    </li>
                                  </ul>
                            </div>
                        </div>                      
                    </div>
                <div class="spacer"></div>
            </div>
        </div>
    </body>
</html>
