<?php
    
    // FILE: Registration Validation Page
    // AUTHOR: des301
/*
    echo isset($_SESSION['fname']) ? 1 : 0;
    echo isset($_SESSION['lname']) ? 1 : 0;
    echo isset($_SESSION['street']) ? 1 : 0;
    echo isset($_SESSION['city']) ? 1 : 0;
    echo isset($_SESSION['state']) ? 1 : 0;
    echo isset($_SESSION['zip']) ? 1 : 0;
    echo isset($_SESSION['phone']) ? 1 : 0;
    echo isset($_SESSION['email']) ? 1 : 0;
    echo isset($_SESSION['employer']) ? 1 : 0;
    echo isset($_SESSION['workPhone']) ? 1 : 0;
    echo isset($_SESSION['occupation']) ? 1 : 0;
    echo isset($_SESSION['cellPhone']) ? 1 : 0;
    
    echo isset($_SESSION['interests']) ? 1 : 0;
    
    echo isset($_SESSION['receive']) ? 1 : 0;
    echo isset($_SESSION['day']) ? 1 : 0;
    echo isset($_SESSION['eve']) ? 1 : 0;
    echo isset($_SESSION['wend']) ? 1 : 0;
    echo isset($_SESSION['age']) ? 1 : 0;
    echo isset($_SESSION['photo']) ? 1 : 0;
    echo isset($_SESSION['signature']) ? 1 : 0;
    echo isset($_SESSION['date']) ? 1 : 0;

*/

    global $dbio;

    $title = isset($_SESSION['title']) ? $_SESSION['title'] : 'null';
    $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'null';
    $lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : 'null';
    $dob = isset($_SESSION['dob']) ? $_SESSION['dob'] : 'null';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : 'null';
    $street1 = isset($_SESSION['street1']) ? $_SESSION['street1'] : 'null';
    $street2 = isset($_SESSION['street2']) ? $_SESSION['street2'] : 'null';
    $city = isset($_SESSION['city']) ? $_SESSION['city'] : 'null';
    $state = isset($_SESSION['state']) ? $_SESSION['state'] : 'null';
    $zip = isset($_SESSION['zip']) ? $_SESSION['zip'] : 'null';
    $phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : 'null';
    $phone2 = isset($_SESSION['phone2']) ? $_SESSION['phone2'] : 'null';
    $extension = isset($_SESSION['extension']) ? $_SESSION['extension'] : 'null';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : 'null';
    $emergencyname = isset($_SESSION['emergencyname']) ? $_SESSION['emergencyname'] : 'null';
    $emergencyphone = isset($_SESSION['emergencyphone']) ? $_SESSION['emergencyphone'] : 'null';
    $maritial = isset($_SESSION['maritial']) ? $_SESSION['maritial'] : 'null';
    
    // $interests = isset($_SESSION['interests']) ? $_SESSION['interests'] : 'null';

    $interests=isset($_SESSION['interest']) ? $_SESSION['interest'] : 'NotWorking';
   /* $items = array();
                foreach($interests as $username) {
                $items[] = $username;
                }
    
    */
    $receive = isset($_SESSION['receive']) ? $_SESSION['receive'] : 'null';
    $day = isset($_SESSION['day']) ? $_SESSION['day'] : 'null';
    $eve = isset($_SESSION['eve']) ? $_SESSION['eve'] : 'null';
    $wend = isset($_SESSION['wend']) ? $_SESSION['wend'] : 'null';
    $age = isset($_SESSION['age']) ? $_SESSION['age'] : 'null';
    $photo = isset($_SESSION['photo']) ? $_SESSION['photo'] : 'null';
    $signature = isset($_SESSION['signature']) ? $_SESSION['signature'] : 'null';
    $date = isset($_SESSION['date']) ? $_SESSION['date'] : 'null';

?>
<h4>Please validate your info</h4>
<br/>
<?php include 'progress.php'; ?>
<hr>
<form  action="index.php" method="get">
    <input name="act" type="hidden" value="<?php echo '' . $act;?>" >
<?php
    echo '<b>Personal Information:</b><br>';
    echo 'Title:' .$title . '<br>';
    echo 'first name: ' . $fname . '<br>';
    echo 'last name: ' . $lname . '<br>';
    echo 'Date of Birth:'.$dob.'<br>';
    echo 'Gender:'.$gender.'<br>';

    echo '<b>Address:</b><br>';
    echo 'Street1: ' . $street1 . '<br>';
    echo 'Street2:'.$street2.'<br>';
    echo 'City: ' . $city . '<br>';
    echo 'State: ' . $state . '<br>';
    echo 'Zip: ' . $zip . '<br>';

    echo '<b>Contact Information:</b><br>';
    echo 'Phone: ' . $phone . '<br>';
    echo 'Sec. Phone:'.$phone2.'&nbsp &nbsp ext. :'.$extension.'<br>';
    echo 'Email Address: ' . $email . '<br>';
    echo 'Emergency Contact Name: ' . $emergencyname . '<br>';
    echo 'Emergency Contact Phone: ' . $emergencyphone . '<br>';
    $maritialstatus=$dbio->getMaritialStatus($maritial);

    echo '<b>Maritial Status:</b> ' . $maritialstatus . '<br>';
     '<br><br><br>';

    
    //Displaying Interest
    echo '<b>Interests:</b><br>';
    //foreach ($items as $i) {
    
    $count=1;
    $interestIds='';
    foreach ($interests as $i) {
                
                If($count==1){
                $interestIds= $interestIds . $i;
                }

                else{
                   $interestIds= $interestIds . ',' . $i; 
                }

                $count++;
                }

    $selectedInterests = $dbio->getInterestsByIds($interestIds);
    foreach($selectedInterests as $int){
        echo $int->getTitle().'<br>';
    }

    ?>
    
    
    
    <?php
    echo '<br><br><b>Preferences:</b><br>';
    echo 'receive: ' . $receive . '<br>';
    echo 'day: ' . $day . '<br>';
    echo 'eve: ' . $eve . '<br>';
    echo 'weekend: ' . $wend . '<br>';
    echo 'age: ' . $age . '<br>';
    echo 'photo: ' . $photo . '<br>';
    echo 'signature: ' . $signature . '<br>';
    echo 'date: ' . $date . '<br>';
?>
    <br>
    <input class="btn btn-success" name="submit" type="submit" value="submit" >
    <br>
</form>
<br>
<hr>