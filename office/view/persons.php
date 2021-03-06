<?php

// TITLE: Office Persons View
// FILE: office/view/persons.php
// AUTHOR: Martin Arabi; mv5164
if($updated)
      echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';

?>

<style> /* css */ 

input[type=submit] 
{
width: 150px;
height: 40px;
}

select
{
alignment: center;
}

#searchBy
{
width: 150px;
height: 30px;
alignment: bottom;
}

#alignment
{
position:relative;
float:left;
width:100%;
}
</style>


<script type="text/javascript" src="js/searchByHandler.js"></script>  <!-- I cant get this to work externally --> <!--This script changes the input boxes after drop down menu-->
<script type="text/javascript">
function searchByHandler() {

var show = "inline";
var hide = "none";

var v = document.getElementById("searchBy").value;
var i1 = document.getElementById("input1");
var i2 = document.getElementById("input2");

// city, street, address, amount, municipality, bank, organization, zip code
// mortgage number, interest, auction item, sponsor, event

//alert(v);

switch (v) {

   case "name":
i1.placeholder = "first name";
i2.placeholder = "last name";
i2.style.display = show;
break;

   
   case "organization":
i1.placeholder = "organization name";
i2.placeholder = "organization name";
i2.style.display = hide;
break;

   default:
i1.placeholder = "input 1";
i2.placeholder = "input 2";
i2.style.display = show;
break;

}// end switch

}// end function
</script>
<div id="alignment">
<h2>Persons Search </h2>
<hr>
<br>
<form name="input" action="index.php" method="get">
<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
<input name="act" type="hidden" value="list" > <!-- view all button -->
<input type="submit" value="View All">
</form><br>

<form name="input" action="index.php" method="get"> 
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="create" >
	<input type="submit" value="Create New">
</form><br>

<form class='searchBy' method="GET" action="index.php"> <!-- search by, drop down menu, and input boxes -->
   <input name="dir" type="hidden" value="<?php echo $dir; ?>" >
   <input name="sub" type="hidden" value="<?php echo $sub; ?>" >
   <input type="hidden" name="act" value="search">
   <input name="searchBtn" type="submit" value="Search" action="index.php" method="get">

<select id="searchBy" name="searchBy" action="/habitat/office/model/accounts.php" method="get" onclick='searchByHandler()'>
<option value="name" selected="selected" >Name</option>
<option value="organization" >Organization</option>
</select>
<input id="input1" name="input1" placeholder="first name" type="text">
<input id="input2" name="input2" placeholder="last name" type="text">
</form><br>

<!--results can be listed here, pushing text down.-->

<br>
<h5>Here is where you will be able to search for a person and make changes, such as
<br><br>1. Edit Account Information
<br>2. Create New a Account
<br>3. Search For an Account by <b>Name</b> or <b>Organization</b>
</h5>
<br><br>
</div>


<!-- end-->
