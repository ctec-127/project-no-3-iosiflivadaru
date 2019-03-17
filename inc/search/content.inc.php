<?php 

require __DIR__ . "/../db/mysqli_connect.inc.php";
require __DIR__ . "/../app/config.inc.php";

if($_SERVER['REQUEST_METHOD']=="POST"){    
    
    $search = "";
    $flag = 0;
    $empty = 0;

    foreach ($_POST as $key => $value) {
        
        if ($_POST[$key] !== "" && $value != "") {
            $column = $key . "='{$db->real_escape_string($value)}'";
            $empty = 1;
            if ($column == "search='Search'") {                
                $column = "";

            } else if ($flag == 0) {
                $search = $search . $column;
                $flag = 1;

            } else {
                $search = $search . " AND " . $column;
            }

        }
    }
   
    if ($empty == 0) {           
        unset($_POST);
    }
}


?>