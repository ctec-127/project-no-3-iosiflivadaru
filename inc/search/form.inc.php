<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->

<?php
    // logic for the radio button and select dropdown
    $option1 = "";
    $option2 = "";
    $program= "";
    if (isset($financial)) {
        if ($financial == "1") {
            $option1 = " checked";
        }

        if ($financial == "0") {
            $option2 = " checked";
        }
    }

    if (isset($degree)){
        $program = $degree;
    }
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first_name" value="<?php echo (isset($first) ? $first: '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last_name" value="<?php echo (isset($last) ? $last: '');?>">
    <br>
    <label class="col-form-label" for="id">Student ID </label>
    <input class="form-control" type="text" id="id" name="student_id" value="<?php echo (isset($id) ? $id: '');?>">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email: '');?>">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone: '');?>">
    <br>
    
    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="number" id="gpa" name="gpa" min="1" max="4" value="<?php echo (isset($gpa) ? $gpa: '');?>">
    <br>

    <label class="col-form-label" for="date">Graduation Date </label>
    <input class="form-control" type="date" id="date" name="graduation_date" value="<?php echo (isset($grad_date) ? $grad_date: '');?>">
    <br>

    <label class="col-form-label">Financial Aid </label>
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial_aid" id="inlineRadio1" value="1"<?=$option1;?>>
        <label class="form-check-label" for="inlineRadio1">Yes</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial_aid" id="inlineRadio2" value="0"<?=$option2;?>>
        <label class="form-check-label" for="inlineRadio2">No</label>
    </div>
    <br><br>
    <label class="col-form-label">Degree Program</label>
    
      <select class="custom-select mr-sm-2" name="degree_program">
        <option disabled selected value hidden>Choose...</option>

        <!-- if the $degree is set, it will check on what the $program is set to, going thorough all the options below -->

        <option value="Web Development"<?=($program == "Web Development") ? " selected" : "";?>>Web Development</option>
        <option value="Graphic Design"<?=($program == "Graphic Design") ? " selected" : "";?>>Graphic Design</option>
        <option value="Arts"<?=($program == "Arts") ? " selected" : "";?>>Arts</option>
        <option value="Engineering"<?=($program == "Engineering") ? " selected" : "";?>>Engineering</option>
        <option value="Accounting"<?=($program == "Accounting") ? " selected" : "";  ?>>Accounting</option>
      </select>
    <br><br>
    <br>
    <input class="btn btn-primary" name="search" type="submit">
</form>