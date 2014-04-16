<?php

/*
 * File: /view/listVolunteer.php 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: rwg5215 list all volunteers
 */
?>

<html>
	<head>
		<meta charset="utf-8">
		<style>
			table {border-collapse: collapse;}
			tr:nth-child(2n) {background-color: lavender;}
			tr:hover {background-color: gold;}
			td {padding: 0px 10px;}
		</style>
                


<script type="text/javascript">
	function retrieve(n) {
		document.getElementById("vid").value=n;
		document.getElementById("editVolunteers").submit();
			}
</script>
 
	</head>
	<body>
            <form id="editVolunteers" action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
                <input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
                <input name="act" id="act" type="hidden" value="retrieve" >
                <input name="vid" id="vid" type="hidden" value="0">
                <center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>
                <br/>
		<table>
		<?php
                echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Title</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Street 1</th><th>Address 2</th><th>City</th><th>State</th><th>Zip</th><th>Email</th></tr>';
			
                   foreach  ($volunteers as $volunteer) {

                            $person_id = $volunteer->getPerson_id();
                            $title = $volunteer->getTitle();
                            $first_name = $volunteer->getFirst_name();
                            $last_name = $volunteer->getLast_name();
                            $contact = $volunteer->getContact();
                            
                           
                                $contacts = $dbio->readContact($contact);
                                $phone = $contacts->getPhone();
                                $email = $contacts->getEmail();
                                $address = $contacts->getAddress();
                            
                                    $addresses = $dbio->readAddress($address);
                                    $address_id = $addresses->getAddress_id();
                                    $street1 = $addresses->getStreet1();
                                    $street2 = $addresses->getStreet2();
                                    $city = $addresses->getCity();
                                    $state = $addresses->getState();
                                    $zip = $addresses->getZip();
                           
				
                                
				
				echo '<tr onclick="retrieve(' . $person_id . ');">'; 
				
				echo '<td>' . $title .'</td>';
                                echo '<td>' . $first_name .'</td>';
                                echo '<td>' . $last_name .'</td>';
				echo '<td class="right">' . $phone . '</td>';
				echo '<td class="right">' . $street1 . '</td>';
                                echo '<td class="right">' . $street2 . '</td>';
                                echo '<td class="right">' . $city . '</td>';
                                echo '<td class="right">' . $state . '</td>';
                                echo '<td class="right">' . $zip . '</td>';
				echo '<td>' . $email . '</td>';
							
				echo '</tr>';
			}
                        
                        //var_dump($volunteers);
		?>
		</table>
		<br>
            </form>
		<hr>
		<br>
		<div id="notes"></div>

    </body>	<footer>
	2014 <span class="habitatBlue">|</span> York Habitat for Humanity
	</footer>
</html>
