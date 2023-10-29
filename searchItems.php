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
                        <li id="search">Pesquisar por itens e ver em quais listas estão presentes</li>
                    </ul>
                </div>

                    <div>
                        <div id="inputContainer">
                            <form method="post" class="formStyle">
                                <input type="text" placeholder="Pesquisar" name="search" class="inputStyle"/>
                                <button name="submit" class="red searchButton">Buscar</button>
                            </form>
                            <div class="container">
                            <?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    // Use the mysqli class to query the database
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $search = mysqli_real_escape_string($mysqli, $search); // Sanitize the input to prevent SQL injection

    // Modify the SQL query to search for items, list names, and amounts
    $sql = "SELECT l.name AS list_name, i.name AS item_name, li.amount
            FROM lists AS l
            LEFT JOIN list AS li ON l.id = li.list_id
            LEFT JOIN items AS i ON li.item_id = i.id
            WHERE l.name = '$search' OR i.name = '$search'";

    $result = $mysqli->query($sql);

    $totalAmount = 0; // Initialize a variable to track the total

    if ($result) {
        if ($result->num_rows > 0) {
            $previousItemName = ''; // Initialize a variable to store the previous item name
            $previousListName = ''; // Initialize a variable to store the previous list name

            while ($row = $result->fetch_assoc()) {
                $listName = $row['list_name'];
                $itemName = $row['item_name'];
                $amount = $row['amount'];

                $totalAmount += $amount; // Add the current amount to the total

                // Check if the item name has changed
                if ($itemName !== $previousItemName) {
                    // Display the item name
                    echo '<strong>O item </strong>' . $itemName . '<strong> está presente nas listas: </strong>' . '<br>';
                    $previousItemName = $itemName; // Update the previous item name
                }

                // Check if the list name has changed
                if ($listName !== $previousListName) {
                    // Display the list name and amount
                    echo '<div style="text-align: center; margin-top: 20px;">' . $listName . ' - Quantidade: ' . $amount . '</div><br>';
                    $previousListName = $listName; // Update the previous list name
                }
            }

            // Display the total amount only once
            echo '<div style="text-align: center; margin-top: 20px;">Total: ' . $totalAmount . '</div>';
        } else {
            echo '<h2>Nenhum item com esse nome foi encontrado</h2>';
        }
    }
    $mysqli->close(); // Close the database connection when done.
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
