<?php
    // echo $person = $dbio->getPerson($personId);
    // echo $address = $dbio->getAddress(echo $personId);
    // echo $contact = $dbio->getContact(echo $personId);
    
/*
    mysql_connect("localhost", "root", "");
    mysql_select_db("rkcpfk");
    // $sql = mysql_query("SELECT * FROM tbl_name");

    $query = "SELECT * FROM personalinfo";
    $allInfo = mysql_query($query);
    $info = mysql_fetch_array($allInfo);
*/
 
 
    $person = $tableinfo[0];
    $foh = $tableinfo[1];
    $isVol = $tableinfo[2];
    
    $title = $person->getTitle();
    $fName = $person->getFirst_name();
    $lName = $person->getLast_name();
    
    $street1 = $person->getContact()->getAddress()->getStreet1();
    $street2 = $person->getContact()->getAddress()->getStreet2();
    $city = $person->getContact()->getAddress()->getCity();
    $state = $person->getContact()->getAddress()->getState()->getTitle();
    $zip = $person->getContact()->getAddress()->getZip();
    
    $phone = $person->getContact()->getPhone();
    $workPhone = $person->getContact()->getPhone2();
    $email = $person->getContact()->getEmail()->getEmail();
    
    $eventname = $foh->getEvent();
    print_r($eventname);
    
    //$workExt = $contact->getExtension();
    //$employer = $person->getEmployer();
    //$jobTitle = $person->getJobtitle();
    $maritial = $person->getMarital_status()->getTitle();
    if($updated)
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';
?>

<script type="text/javascript">
  function enterEvent() {
    var chkBox = document.getElementById("isFOH");
    var txtBox = document.getElementById("events");
    if(chkBox.checked)
      txtBox.style.visibility = "visible";
    else
      txtBox.style.visibility = "hidden";
  }

  function migrate(){
    document.getElementById("act").value = "migrate";
    document.getElementById("editpersonform").submit();

  }


</script>

<hr>
<form id="editpersonform" action="index.php" method="GET" class="form-horizontal">
    <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
    <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
    <input name="pid" type="hidden" value="<?php echo $_SESSION['personid']; ?>" >
    <input id="act" name="act" type="hidden" value="update" >
    <fieldset>
    <legend>Person Info</legend>
	<div class="form-group">
      <label for="inputTitle" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <select name="title" type="text">
		    <option value="Mr" selected="selected">Mr.</option>;
		    <option value="Mrs">Mrs.</option>;
		    <option value="Ms">Ms.</option>;
		    <option value="Dr">Dr.</option>;
		    <span class="required">*</span>
		</select>
      </div>
    </div>
	<div class="form-group">
      <label for="inputfName" class="col-lg-2 control-label">First Name :</label>
      <div class="col-lg-10">
        <input name="fName" type="text" placeholder="first name" value="<?php echo $fName; ?>" >
		<span class="required">*</span>
      </div>
    </div>
		<div class="form-group">
      <label for="inputlName" class="col-lg-2 control-label">Last Name :</label>
      <div class="col-lg-10">
        <input name="lName" type="text" placeholder="last name" value="<?php echo $lName; ?>"  >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputstreet1" class="col-lg-2 control-label">Street :</label>
      <div class="col-lg-10">
        <input name="street1" type="text" placeholder="street 1" value="<?php echo $street1; ?>" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputstreet2" class="col-lg-2 control-label">Apt/Suit :</label>
      <div class="col-lg-10">
        <input name="street2" type="text" placeholder="street 2" value="<?php echo $street2; ?>" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputcity" class="col-lg-2 control-label">City :</label>
      <div class="col-lg-10">
        <input name="city" type="text" placeholder="city" value="<?php echo $city; ?>" >
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputState" class="col-lg-2 control-label">State :</label>
      <div class="col-lg-10">
        <select name="state">
		    <option value="20">MD</option>
		    <option value="38" selected="selected">PA</option>
		    <option value="43">TX</option>
		</select>
		<span class="required">*</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputzip" class="col-lg-2 control-label">Zip :</label>
      <div class="col-lg-10">
        <input name="zip" type="text" placeholder="zip" value="<?php echo $zip; ?>" >
    <span class="required">*</span></label>
      </div>
    </div>
    <div class="form-group">
      <label for="inputphone" class="col-lg-2 control-label">Phone :</label>
      <div class="col-lg-10">
        <input name="phone" type="text" placeholder="phone" value="<?php echo $phone; ?>" >
		<span class="required">*</span></label>
      </div>
    </div>
		<div class="form-group">
      <label for="inputemail" class="col-lg-2 control-label">Email :</label>
      <div class="col-lg-10">
        <input name="email" type="text" placeholder="email" value="<?php echo $email; ?>" >
		<span class="required">*</span>
      </div>
    </div>
<!--    <div class="form-group">
      <label for="inputemployer" class="col-lg-2 control-label">Employer :</label>
      <div class="col-lg-10">
       <input name="employer" type="text" placeholder="employer" value="<?php// echo $employer; ?>" >
      </div>
    </div>-->
<!--    <div class="form-group">
      <label for="inputjobtitle" class="col-lg-2 control-label">Job Title :</label>
      <div class="col-lg-10">
       <input name="jobtitle" type="text" placeholder="job title" value="<?php //echo $jobTitle; ?>" >
      </div>
    </div>-->
    <div class="form-group">
      <label for="inputworkPhone" class="col-lg-2 control-label">Work Phone :</label>
      <div class="col-lg-10">
      	<input name="workPhone" type="text" placeholder="work phone" value="<?php echo $workPhone; ?>" >
      </div>
    </div>
<!--    <div class="form-group">
      <label for="inputworkExt" class="col-lg-2 control-label">Extension :</label>
      <div class="col-lg-10">
       <input name="workExt" type="text" placeholder="ext" value="<?php //echo $workExt; ?>" >
		<span class="required">*</span>
      </div>
    </div>-->
    <div class="form-group">
     <label for="inputMarriage" class="col-lg-2 control-label">Maritial Status :</label>
    <div class="col-lg-10">
    <input type="radio" name="maritial" value="1" id="maritial" required="required" <?php if($maritial==1)echo "checked"; ?> ><label>Single</label><br>
    <input type="radio" name="maritial" value="2" id="maritial" required="required" <?php if($maritial==2)echo "checked"; ?> ><label>Married</label><br>
    <input type="radio" name="maritial" value="3" id="maritial" required="required" <?php if($maritial==3)echo "checked"; ?> ><label>Widow</label><br>
    <input type="radio" name="maritial" value="4" id="maritial" required="required" <?php if($maritial==4)echo "checked"; ?> ><label>Divorced</label><br>
    </div></div>
    <?php
    if($eventname){
      echo '<div class="form-group">
      <label for="inputjobTitle" class="col-lg-2 control-label">Friends From :</label>
      <div class="col-lg-10">';
      
        $events = $dbio->readAllEvent();
        echo '<select name="list" id="namelist" type="text">';
        foreach($events as &$event)
        {
          $eventId = $event->getEvent_id();
          $eventTitle = $event->getTitle();
          if($eventname == $eventTitle)
            echo "<option value = '" . $eventId . "' name = '" . $eventTitle . "' selected='selected'>" . $eventTitle . "</option>";
          else
            echo "<option value = '" . $eventId . "' name = '" . $eventTitle . "'>" . $eventTitle . "</option>";
        } 
        echo '</select></div></div>';

?>
  
<?php
    }
    else{
?>
     <div class="form-group">
      <label for="foh" class="col-lg-2 control-label">Is this person a Friend of Habitat ? </label>
      <div class="col-lg-10">
    <input type="checkbox" id="isFOH" name="isFOH" OnChange="enterEvent()">
  </div>
  </div>

    <div class="form-group" id="events" style="visibility: hidden;">
      <label for="inputTitle" class="col-lg-2 control-label">Where did you meet :</label>
      <div class="col-lg-10">
        <select name="events" id="eventlist" type="text">
        <?php //creates drop down menu options AND alphabetizes 
        //require_once '/class/interest.php';
        $events = $dbio->readAllEvent();
        //$hold = array();
        foreach($events as &$event)
        {
          $eventId = $event->getEvent_id();
          $eventTitle = $event->getTitle();
          echo "<option value = '{$eventId}' name = '{$eventTitle}'>{$eventTitle}</option>";
        }
      ?>
        <span class="required">*</span>
    </select>
      </div>
    </div>

    <?php
    }
    if(!$isVol){
      echo '<div class="form-group">
      <label for="migrate" class="col-lg-2 control-label">Make volunteer :</label>
      <div class="col-lg-10">
    <input type="button" value="migrate" onclick="migrate()">
  </div>
  </div>';
    }
    ?>
    
    <input type="submit" value="Update">
</form>


<hr>
