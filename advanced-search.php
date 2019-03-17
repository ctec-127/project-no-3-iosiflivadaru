<?php // Filename: advanced-search.php
$pageTitle = "Advanced Search";
require 'inc/layout/header.inc.php'; 
?>
<div class="container">
	<div class="row mt-5">
		<div class="col-lg-12">
			<h1 class="text-center">Advanced Search</h1>
			<?php require __DIR__ .'/inc/search/form.inc.php' ?>
			<?php require __DIR__ .'/inc/search/content.inc.php'; ?>
			
			
		</div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

        <button class="btn btn-outline-primary my-2 my-sm-0 d-none" onclick="showForm()">Show Form</button>

        <?php 
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if(!empty($_POST)){

                   // If we have no errors than we can try and insert the data
    
                    // Time for some SQL
                    $sql = "SELECT * FROM $db_table WHERE $search";                              

                    // comment in for debug of SQL
                    // echo $sql;

                    $result = $db->query($sql);

                    if (!empty($result)) {
                        if ($result->num_rows == 0 ) {
                            echo "<h2 class=\"my-3 text-center\">No results found</h2>";
                            echo "<div class=\"text-center\">";
                            echo "<a class=\"btn btn-primary\" href=\"advanced-search.php\">Search Again</a>";
                            echo "</div>";
                            echo '<img class="mx-auto d-block mt-4" src="img/frown.png" alt="A sad face">';
                        } else {
                            echo "<h2 class=\"my-4 text-center\">$result->num_rows record(s) found </h2>";
                            echo "<div class=\"text-center\">";
                            echo "<a class=\"btn btn-primary\" href=\"advanced-search.php\">Search Again</a>";
                            echo "</div>";
                            display_record_table($result);
                        }
                    }
                    ?> 
                    <script src="js/jquery-3.3.1.min.js"></script>
                    <script>$( document ).ready(function() {hideForm();});</script>
                    <?php
                    
                } else {
                    echo "<h2 class=\"my-3 text-center\">I can't search if you don't give<br>me something to search for.</h2>";
                    echo "<div class=\"text-center\">";
                    echo "<a class=\"btn btn-primary\" href=\"advanced-search.php\">Search Again</a>";
                    echo "</div>";
                    echo '<img class="mx-auto d-block mt-4" src="img/nosmile.png" alt="A face with no smile">';
                    
                    ?> 
                    <script src="js/jquery-3.3.1.min.js"></script>
                    <script>$( document ).ready(function() {hideForm();});</script>
                    <?php
                }
            }
        ?>


        </div>
    </div>
</div>

<script>
function showForm() {
    $("#btn").removeClass("d-block");
    $("#btn").addClass("d-none");
    $("#advanceForm").removeClass("d-none");
}

function hideForm() {
    $("#advanceForm").addClass("d-none");
}
</script>

<?php require 'inc/layout/footer.inc.php'; ?>