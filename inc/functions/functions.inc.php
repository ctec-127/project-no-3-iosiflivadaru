<?php // Filename: function.inc.php

function display_message(){
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo '<div class="mt-4 alert alert-success" role="alert">';
        echo $message;
        echo '</div>';
    }
}

// function that creates the filter by last names based on the first letter of the last name
function display_letter_filters($filter){  
    echo '<span class="mb-3 d-inline-block">Filter by <strong>Last Name</strong></span><br>';
 
    $letters = range('A','Z');

    for($i=0 ; $i < count($letters) ; $i++){ 
        if ($filter == $letters[$i]) {
            $class = 'class="text-light font-weight-bold p-1 mr-3 mb-2 bg-dark d-inline-block"';
        } else {
            $class = 'class="text-secondary p-1 mr-3 mb-2 bg-light border rounded d-inline-block"';
        }
        echo "<u><a $class href='?filter=$letters[$i]' title='$letters[$i]'>$letters[$i]</a></u>";
    }
    echo '<a class="text-secondary p-2 mr-2 bg-success text-light border rounded" href="?clearfilter" title="Reset Filter">Reset</a>&nbsp;&nbsp;';
}


function display_record_table($result){
    // creating the table and the head table 
    echo '<div class="table-responsive">';
    echo "<table class=\"table table-striped table-hover table-sm mt-4\">";
    echo '<thead class="thead-dark"><tr><th>Actions</th>
    <th><a href="?sortby=student_id">Student&nbsp;ID</a></th>
    <th><a href="?sortby=first_name">First&nbsp;Name</a></th>
    <th><a href="?sortby=last_name">Last&nbsp;Name</a></th>
    <th><a href="?sortby=email">Email</a></th>
    <th><a href="?sortby=phone">Phone</a></th>
    <th><a href="?sortby=gpa">GPA</a></th>
    <th><a href="?sortby=financial_aid">Financial&nbsp;Aid</a></th>
    <th><a href="?sortby=graduation_date">Graduation&nbsp;Date</a></th>
    <th><a href="?sortby=degree_program">Degree&nbsp;Program</a></th>
    
    </tr></thead>';
    # $row will be an associative array containing one row of data at a time
    while ($row = $result->fetch_assoc()){
        # display rows and columns of data
        echo '<tr>';
        echo "<td><a href=\"update-record.php?pid={$row['id']}\">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"delete-record.php?id={$row['id']}\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>";
        echo "<td>{$row['student_id']}</td>";
        echo "<td><strong>{$row['first_name']}</strong></td>";
        echo "<td><strong>{$row['last_name']}</strong></td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['gpa']}</td>";
        echo "<td>{$row['financial_aid']}</td>";
        echo "<td>{$row['graduation_date']}</td>";
        echo "<td>{$row['degree_program']}</td>";
        echo '</tr>';
    } // end while
    // closing table tag and div
    echo '</table>';
    echo '</div>';
}

// this function displays errors from an array
function display_error_bucket($error_bucket){
    echo '<p>The following errors were deteced:</p>';
    echo '<div class="pt-4 alert alert-warning" role="alert">';
        echo '<ul>';
        foreach ($error_bucket as $text){
            echo '<li>' . $text . '</li>';
        }
        echo '</ul>';
    echo '</div>';
    echo '<p>All of these fields are required. Please fill them in.</p>';
}

function echoActiveClassIfRequestMatches($requestUri){
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'active';
}
?>