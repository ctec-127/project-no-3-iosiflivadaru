<?php 

require __DIR__ . "/../db/mysqli_connect.inc.php";
require __DIR__ . "/../app/config.inc.php";

if($_SERVER['REQUEST_METHOD']=="POST"){    
    
    $search = "";
    $flag = 0;

    foreach ($_POST as $key => $value) {
        if ($_POST[$key] == "search") {
            echo "THIS IS SEARCH";
        } else if ($_POST[$key] !== "" && $value != "") {
            $column = $key . "='{$db->real_escape_string($value)}'";
            echo "our key value is: $key | with a value of: $value    ***** ";
            
            if ($flag == 0) {
                $search = $search . $column;
                $flag = 1;
            } else if ($column == "search='Submit'") {
                # do nothing
            } else {
                $search = $search . " AND " . $column;
            }

        }
    }
        
    
}


?>