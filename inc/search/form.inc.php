<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->


<form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" id="advanceForm">

    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first_name">
    <br>

    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last_name">
    <br>

    <label class="col-form-label" for="id">Student ID </label>
    <input class="form-control" type="text" id="id" name="student_id">
    <br>

    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email">
    <br>

    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone">
    <br>
    
    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="number" id="gpa" name="gpa" min="1" max="4">
    <br>

    <label class="col-form-label" for="date">Graduation Date </label>
    <input class="form-control" type="date" id="date" name="graduation_date">
    <br>

    <label class="col-form-label">Financial Aid </label>
    <br>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial_aid" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">Yes</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial_aid" id="inlineRadio2" value="0">
        <label class="form-check-label" for="inlineRadio2">No</label>
    </div>

    <br><br>
    <label class="col-form-label">Degree Program</label>
    
    <select class="custom-select mr-sm-2" name="degree_program">
    <option disabled selected value hidden>Choose...</option>

    <!-- if the $degree is set, it will check on what the $program is set to, going thorough all the options below -->

    <option value="Web Development">>Web Development</option>
    <option value="Graphic Design">>Graphic Design</option>
    <option value="Arts">Arts</option>
    <option value="Engineering">Engineering</option>
    <option value="Accounting">Accounting</option>
    </select>
    
    <button class="btn btn-primary mt-4" type="submit">Search</button>
</form>