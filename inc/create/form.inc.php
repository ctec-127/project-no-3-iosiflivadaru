<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->


<?php
// logic for the radio button
	$option1 = "";
	$option2 = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['financial'])) {		
		foreach ($_POST['financial'] as $value) {

			if ($value == "1") {
				$option1 = "checked";
			} 

			if ($value == "0") {
				$option2 = "checked";
			} 		
		}
    }
// logic that checks what degree is being selected 
    $program="";
    if (isset($_POST['degree'])){
        $program = $_POST['degree'];
    }

?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first: '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last: '');?>">
    <br>
    <label class="col-form-label" for="id">Student ID </label>
    <input class="form-control" type="text" id="id" name="id" value="<?php echo (isset($id) ? $id: '');?>">
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
    <label class="col-form-label">Financial Aid </label>
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial[]" id="inlineRadio1" value="1"<?php if(isset($financial)){echo $option1;}?>>
        <label class="form-check-label" for="inlineRadio1">Yes</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial[]" id="inlineRadio2" value="0" <?php if(isset($financial)){echo $option2;}?>>
        <label class="form-check-label" for="inlineRadio2">No</label>
    </div>
    <br><br>
    <label class="col-form-label">Degree Program</label>
    
      <select class="custom-select mr-sm-2" name="degree">
        <option value=" " 
        <?php 
        // if there is no degree selected echo out selected for "CHoose..."
        // $degree it's being emptied after the form is successful 
        if(isset($degree)){
        } else {
            echo 'selected';
        }
        ?> hidden >Choose...</option>
        <option value="Web Development" <?php 
        // if the $degree is set, it will check on what the $program is set to, going thorough all the options below
        if (isset($degree)) {
            if($program == "Web Development") echo "selected";
        }
        ?>>Web Development</option>
        <option value="Graphic Design" <?php 
        if (isset($degree)) {
            if($program == "Graphic Design") echo "selected";
        }
        ?>>Graphic Design</option>
        <option value="Arts" <?php 
        if (isset($degree)) {
            if($program == "Arts") echo "selected";
        }
        ?>>Arts</option>
        <option value="Engineering" <?php 
        if (isset($degree)) {
            if($program == "Engineering") echo "selected";
        }
        ?>>Engineering</option>
        <option value="Accounting" <?php 
        if (isset($degree)) {
            if($program == "Accounting") echo "selected";
        }
        ?>>Accounting</option>
      </select>
    <br><br>
    <br>
    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button>
</form>