<?php

	// TITLE: account personal info view
	// FILE: account/view/info.php
	// AUTHOR: 
	//displays an accounts info, and allows it to be updated

        //person object
	$title = $person->getTitle();
	$fName = $person->getFirst_name();
	$lName = $person->getLast_name();
        
        //address object
	$street1 = $address->getStreet1();
	$street2 = $address->getStreet2();
	$city = $address->getCity();
	$state = $address->getState();
	$zip = $address->getZip();
        
        //contact object
        //some things have been commented out due to not bein in the new database
	$phone = $contact->getPhone();
	$email = $_SESSION['username'];
	//$employer = $person->getEmployer();
	$workPhone = $contact->getPhone2();
	//$workExt = $contact->getExtension();
	//$jobTitle = $person->getJobTitle();

        //checks for page update
	if($update)
            echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';
?>

<!--html-->
<!--form for showing and updating the data-->
<!--some things have been commented out due to not bein in the new database-->
<h2>Personal Information</h2>

<hr>
<!-- input that updates account, person, contact, and address -->
<form action="index.php" method="GET">
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="act" type="hidden" value="update" >
    <input name="pid" type="hidden" value="<?php echo $pid; ?>" >
    
    <table>
	<tr>
	    <th>Name Info</th>
	    <th>Address Info</th>
	    <th>Contact Info</th>
	</tr>
	<tr>
	    <td>
		<select name="title" type="text">
		    <option value="<?php echo $title; ?>" disabled selected="selected"><?php echo $title; ?></option>;
		    <option value="Mr">Mr.</option>;
		    <option value="Mrs">Mrs.</option>;
		    <option value="Ms">Ms.</option>;
		    <option value="Dr">Dr.</option>;
		</select>
		<span class="required">*</span>
		<br>
		<input name="fName" type="text" placeholder="first name" value="<?php echo $fName; ?>" >
		<span class="required">*</span>
		<br>
		<input name="lName" type="text" placeholder="last name" value="<?php echo $lName; ?>"  >
		<span class="required">*</span>
		<br>
	    </td>
            
	    <td>
		<input name="street1" type="text" placeholder="street 1" value="<?php echo $street1; ?>" >
		<span class="required">*</span>
		<br>
		<input name="street2" type="text" placeholder="street 2" value="<?php echo $street2; ?>" >
		<br>
		<input name="city" type="text" placeholder="city" value="<?php echo $city; ?>" >
		<span class="required">*</span>
		<br>
		<select name="state">
		    <option value="20">MD</option>
		    <option value="38" selected="selected">PA</option>
		    <option value="43">TX</option>
		</select>
		<span class="required">*</span>
		<br>
		<input name="zip" type="text" placeholder="zip" value="<?php echo $zip; ?>" >
		<span class="required">*</span>
	    </td>
            
	    <td>
		<input name="phone" type="text" placeholder="phone" value="<?php echo $phone; ?>" >
		<span class="required">*</span></label>
		<br>
		<input name="email" type="text" placeholder="email" value="<?php echo $email; ?>" >
		<span class="required">*</span>
		<br>
<!--		<input name="employer" type="text" placeholder="employer" value="<?php //echo $employer; ?>" >-->
		<br>
		<input name="workPhone" type="text" placeholder="work phone" value="<?php echo $workPhone; ?>" >
		<br>
<!--		<input name="workExt" type="text" placeholder="ext" value="<?php //echo $workExt; ?>" >
		<br>
		<input name="jobTitle" type="text" placeholder="job title" value="<?php //echo $jobTitle; ?>" >-->
	    </td>
	</tr>
    </table>
    <input type="submit" value="Update">
</form>
<hr>
