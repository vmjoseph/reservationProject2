<?php
include("formVars.php");
$subtractRoom=$roomsRemaining-1;

	

echo "Are you sure you want to reserve a room in $residence?<br> 
There are currently $roomsRemaining rooms <br>
There will be $subtractRoom rooms left after you submit.<br>";
	   // echo "<script>alert('Your submission has a few errors, please return to the form');</script>";
	    echo "<button onclick='window.history.back()';>Go Back</button>";
	    
 echo "<form action='submit.php' method='post'>
	    <input type='hidden' name='firstname' value=$firstname></input>
	    <input type='hidden' name='lastname' value=$lastname></input>
	    <input type='hidden' name='cwid' value=$cwid></input>
	    <input type='hidden' name='year' value=$year></input>
	    <input type='hidden' name='laundry' value=$laundryChoice></input>
	    <input type='hidden' name='kitchen' value=$kitchenChoice></input>
	    <input type='hidden' name='sservices' value=$sservicesChoice></input>
	    <input type='hidden' name='residence' value=$residence></input>
	    <input type='hidden' name='email' value=$email></input>
	    <input type='hidden' name='roomsRemaining' value=$roomsRemaining></input>
	    <input type='submit' value='Submit for Submission'>
	    </form>";

?>
