<?php // Filename: connect.inc.php

require __DIR__ . "/../db/mysqli_connect.inc.php";
require __DIR__ . "/../app/config.inc.php";

$error_bucket = [];

// http://php.net/manual/en/mysqli.real-escape-string.php

if($_SERVER['REQUEST_METHOD']=="POST"){
    if (!empty($_POST['pid'])) {
        $pid = $_POST['pid'];
    }
    // First insure that all required fields are filled in
    if (empty($_POST['first'])) {
        array_push($error_bucket,"<p>A first name is required.</p>");
    } else {        
        #$first = $_POST['first'];        
        $first = $db->real_escape_string($_POST['first']);
    }

    if (empty($_POST['last'])) {
        array_push($error_bucket,"<p>A last name is required.</p>");
    } else {
        #$last = $_POST['last'];
        $last = $db->real_escape_string($_POST['last']);
    }

    if (empty($_POST['id'])) {
        array_push($error_bucket,"<p>A student ID is required.</p>");
    } else {
        #$id = $_POST['id'];
        $id = $db->real_escape_string($_POST['id']);
    }

    if (empty($_POST['email'])) {
        array_push($error_bucket,"<p>An email address is required.</p>");
    } else {
        #$email = $_POST['email'];
        $email = $db->real_escape_string($_POST['email']);
    }

    if (empty($_POST['phone'])) {
        array_push($error_bucket,"<p>A phone number is required.</p>");
    } else {
        #$phone = $_POST['phone'];
        $phone = $db->real_escape_string($_POST['phone']);
    }

    if (empty($_POST['gpa'])) {
        array_push($error_bucket,"<p>A GPA number is required.</p>");
    } else {
        #$gpa = $_POST['gpa'];
        $gpa = $db->real_escape_string($_POST['gpa']);
    }

    if (empty($_POST['grad_date'])) {
        array_push($error_bucket,"<p>A Graduation Date is required.</p>");
    } else {
        #$gpa = $_POST['gpa'];
        $grad_date = $db->real_escape_string($_POST['grad_date']);
    }

    if (empty($_POST['financial'])) {
        array_push($error_bucket,"<p>Do you have Financial Aid?</p>");
    } else {
        #$financial = $_POST['financial'];
        $financial = $db->real_escape_string(implode("|",$_POST['financial']));
    }

    if (empty($_POST['degree'])) {
        array_push($error_bucket,"<p>A Degree Program is required.</p>");
    } else {
        #$degree = $_POST['degree'];
        $degree = $db->real_escape_string($_POST['degree']);
    }

    // If we have no errors than we can try and insert the data
    if (count($error_bucket) == 0) {
        // Time for some SQL
        $sql = "UPDATE $db_table SET first_name='$first', last_name='$last', student_id=$id, email='$email', phone='$phone', gpa=$gpa, financial_aid='$financial', degree_program='$degree', graduation_date='$grad_date' WHERE id=$pid";
        // comment in for debug of SQL
        // echo $sql;

        $result = $db->query($sql);
        if (!$result) {
            echo '<div class="alert alert-danger" role="alert">
            I am sorry, but I could not save that record for you. ' .  
            $db->error . '.</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">
            I saved that new record for you!
          </div>';
        //   the funtion unset() is making the variables empty
        unset($first);
        unset($last);
        unset($id);
        unset($email);
        unset($phone);
        unset($gpa);
        unset($financial);
        unset($grad_date);
        unset($degree);
        }
    } else {
        display_error_bucket($error_bucket);
    }
} else {
    // check for record id (primary key)
    $pid = $_GET['pid'];
    // now we need to query the database and get the data for the record
    // note limit 1
    $sql = "SELECT * FROM $db_table WHERE id=$pid LIMIT 1";
    // query database
    $result = $db->query($sql);
    // get the one row of data
    while($row = $result->fetch_assoc()) {
        $first = $row['first_name'];
        $last = $row['last_name'];
        $id = $row['student_id'];
        $email = $row['email'];
        $phone = $row['phone'];
        $degree = $row['degree_program'];
        $gpa = $row['gpa'];
        $grad_date = $row['graduation_date'];
        $financial = $row['financial_aid'];
        
    }
}