<?php // Filename: advanced-search.php
$pageTitle = "Advanced Search";
require 'inc/layout/header.inc.php'; 
?>

<div class="container">
	<div class="row mt-5">
		<div class="col-lg-12">
			<h1>Advanced Search</h1>
			<?php require __DIR__ .'/inc/search/form.inc.php' ?>
			<?php require __DIR__ .'/inc/search/content.inc.php'; ?>
			
			<?php 
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if(!empty($_POST['search'])){

                   // If we have no errors than we can try and insert the data
    
                    // Time for some SQL
                    $sql = "SELECT * FROM $db_table WHERE $search";
                    echo $sql;
                    

                    // comment in for debug of SQL
                    // echo $sql;

                    $result = $db->query($sql);

                    
                    if ($result->num_rows == 0 ) {
                        echo "<p class=\"display-4 mt-4 text-center\">No results found for \"<strong>{$_POST['search']}</strong>\"</p>";
                        echo '<img class="mx-auto d-block mt-4" src="img/frown.png" alt="A sad face">';
                        echo "<p class=\"display-4 mt-4 text-center\">Please try again.</p>";
                        // echo "<h2 class=\"mt-4\">There are currently no records to display for <strong>last names</strong> starting with <strong>$filter</strong></h2>";
                    } else {
                        echo "<h2 class=\"mt-4 text-center\">$result->num_rows record(s) found for \"" . $_POST['search'] . '"</h2>';
                        display_record_table($result);
                    }
                } else {
                    echo "<p class=\"display-4 mt-4 text-center\">I can't search if you don't give<br>me something to search for.</p>";
                    echo '<img class="mx-auto d-block mt-4" src="img/nosmile.png" alt="A face with no smile">';
                }
            }
        ?>
		</div>
    </div>
</div>

<?php require 'inc/layout/footer.inc.php'; ?>