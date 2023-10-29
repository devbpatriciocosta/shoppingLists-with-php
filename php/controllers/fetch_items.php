<?php
    include_once(__DIR__ . '/controller.php');

    try {                
        $request = new mysqli_request();
        $items = $request->fetch_items();
    
        if ($items) {
            $sanitized_items = array();
            foreach ($items as $item) {
                $sanitized_items[] = htmlspecialchars($item);
            }
    
            $rc = new success_code("Items fetched successfully.", $sanitized_items);
        } else {
            // Handle the case when no items are found.
            echo "No items found.";
        }
    } catch (Exception $e) {
        // Log the error providing a user-friendly message.
        echo "An error occurred: " . $e->getMessage();
    }