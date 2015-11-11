<?php
require_once("../DBtesting/DBconnect.php");

require("formVars.php");
$sql="SELECT $residence FROM residence_halls";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $remainingSlots=$row["$residence"];
    }
    }else{
        
    }
echo "You've chosen ".$residence." hall.<br>";
echo "There are ".$remainingSlots ." rooms remaining. <br> ";
echo "Your name is $firstname $lastname <br> You are a $year $gender who wishes to live in $residence <br>Your email is : $email
<br> Here are your requested preferences:<br>
 Kitchen: $kitchen <br> Laundry: $laundry <br> Special Services: $sservices <br>";

echo "<form action='subtractRoom.php' method='POST'>
        <input type='hidden' name='firstname' value=$firstname></input>
	    <input type='hidden' name='lastname' value=$lastname></input>
	    <input type='hidden' name='cwid' value=$cwid></input>
	    <input type='hidden' name='year' value=$year></input>
	    <input type='hidden' name='laundry' value=$laundry></input>
	    <input type='hidden' name='kitchen' value=$kitchen></input>
	    <input type='hidden' name='sservices' value=$sservices></input>
	    <input type='hidden' name='residence' value=$residence></input>
	    <input type='hidden' name='remainingSlots' value=$remainingSlots></input>
	    <input type='hidden' name='email' value=$email></input>
	    <input type='hidden' name='gender' value=$gender></input><br>
	    <input type='submit' value='Submit for Submission'>
	    </form>";
?>