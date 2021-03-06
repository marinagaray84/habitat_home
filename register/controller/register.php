<?php

    // FILE: Registration Controller

    // AUTHOR: des301

    global $act;
    global $msg;
    $total = 6;

    $act = (isset($_GET['act'])) ? $_GET['act'] : '';
    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';

    switch ($act) {

        //confirms all settings then destroys the registration session
	case 'confirm':
	    $progress = 6;
	    include ('view/confirm.php');
	    session_destroy();
        break;

	//not sure
	case 'submit':
	    include ('admin/model/create.php');
        break;

        //validates password and moves to next page or sends back to old page
	case 'validate':
            $password1=($_GET['pw1']);
            $password2=($_GET['pw2']);
	    if($password1 != $password2) {
                    $act = 'validate';
                    $progress = 4;
                    include ('view/password.php');
	    	} else {
                    $_SESSION['userName'] = (isset($_GET['userName'])) ? $_GET['userName'] : '';
                    $_SESSION['password'] = (isset($_GET['pw1'])) ? $_GET['pw1'] : '';

                    $progress = 5;
                    $act = 'confirm';
                    include ('view/validate.php');
	    	}
         break;

        //sets availability and consent 
	case 'setPassword':
	    $_SESSION['church'] = isset($_GET['church']) ? $_GET['church'] : '';
	    $_SESSION['ambassador'] = isset($_GET['ambassador']) ? $_GET['ambassador'] : '';
	    $_SESSION['organization'] = isset($_GET['organization']) ? $_GET['organization'] : '';
	    $_SESSION['checkPhone'] = isset($_GET['checkPhone']) ? $_GET['checkPhone'] : 0;
	    $_SESSION['checkMail'] = isset($_GET['checkMail']) ? $_GET['checkMail'] : 0;
	    $_SESSION['checkEmail'] = isset($_GET['checkEmail']) ? $_GET['checkEmail'] : 0;
	    $_SESSION['day'] = isset($_GET['day']) ? $_GET['day'] : 0;
	    $_SESSION['eve'] = isset($_GET['eve']) ? $_GET['eve'] : 0;
	    $_SESSION['wend'] = isset($_GET['wend']) ? $_GET['wend'] : 0;
	    $_SESSION['age'] = isset($_GET['age']) ? $_GET['age'] : 0;
	    $_SESSION['photo'] = isset($_GET['photo']) ? $_GET['photo'] : 0;
	    $_SESSION['safety'] = isset($_GET['safety']) ? $_GET['safety'] : 0;
	    $_SESSION['video'] = isset($_GET['video']) ? $_GET['video'] : 0;
	    $_SESSION['waiver'] = isset($_GET['waiver']) ? $_GET['waiver'] : 0;

	    $_SESSION['signature'] = isset($_GET['signature']) ? $_GET['signature'] : '';
	    $_SESSION['date'] = isset($_GET['date']) ? $_GET['date'] : '';
	    $email = $_SESSION['email'];
	    $act = 'validate';
	    $progress = 4;
	    include ('view/password.php');
        break;
	
	//sets interests
	case 'getOther':
	    $items = array();

	    If(!empty($_GET['interest'])){
                foreach(($_GET['interest']) as $username) {
                $items[] = $username;
                }
            }
		$_SESSION['interest'] = ($items);
		$progress = 3;
	    $act = 'setPassword';
	    include ('view/other.php');
        break;

	//sets person, contacts, address, and email
	case 'getInterests':
	    $_SESSION['title'] = isset($_GET['title']) ? $_GET['title'] : '';
	    $_SESSION['fname'] = isset($_GET['fname']) ? $_GET['fname'] : '';
	    $_SESSION['lname'] = isset($_GET['lname']) ? $_GET['lname'] : '';
	    $_SESSION['dob'] = isset($_GET['dob']) ? $_GET['dob'] : '';
	    $_SESSION['gender'] = isset($_GET['gender']) ? $_GET['gender'] : '';
	    $_SESSION['street1'] = isset($_GET['street1']) ? $_GET['street1'] : '';
	    $_SESSION['street2'] = isset($_GET['street2']) ? $_GET['street2'] : '';
	    $_SESSION['city'] = isset($_GET['city']) ? $_GET['city'] : '';
	    $_SESSION['state'] = isset($_GET['state']) ? $_GET['state'] : '';
	    $_SESSION['zip'] = isset($_GET['zip']) ? $_GET['zip'] : '';
	    $_SESSION['phone'] = isset($_GET['phone']) ? $_GET['phone'] : '';
	    $_SESSION['phone2'] = isset($_GET['phone2']) ? $_GET['phone2'] : '';
	    $_SESSION['extension'] = isset($_GET['extension']) ? $_GET['extension'] : '';
	   // $_SESSION['email'] = isset($_GET['email']) ? $_GET['email'] : '';
	    $_SESSION['emergencyname'] = isset($_GET['emergencyname']) ? $_GET['emergencyname'] : '';
	    $_SESSION['emergencyphone'] = isset($_GET['emergencyphone']) ? $_GET['emergencyphone'] : '';
	    $_SESSION['maritial'] = isset($_GET['maritial']) ? $_GET['maritial'] : '';

	    $email=($_GET['email']);
	    $usernameCheck=$dbio->getUsername($email);
	    if($email == $usernameCheck){
	    	$act = 'getInterests';
	    	$progress = 1;
	    	include ('view/info.php');
	    	print '<script type="text/javascript">'; 
                    print 'alert("The Email '. $email .' is already registered. Please try a different Email!")'; 
                print '</script>';
	    } else {
	    	$_SESSION['email'] = isset($_GET['email']) ? $_GET['email'] : '';
	    	$progress = 2;
	    	$act = 'getOther';
	    	include ('view/interests.php');
	    }
        break;
	
	//starts registration process
	case 'getInfo':
            session_destroy();    
	    $lifetime = 30 * 60;// 60 seconds * 30 minutes = 1800 seconds
	    session_set_cookie_params($lifetime, '/');
	    $progress = 1;
	    $act = 'getInterests';
	    include ('view/info.php');
        break;

        
	default:
	    include ('view/register.php');
        break;

    }// end switch

?>