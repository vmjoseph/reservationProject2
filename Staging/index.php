<?php
include_once("../DBtesting/DBconnect.php");

$sql="SELECT * FROM residence_halls";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $roomsLeft=$row["champagnat"];
    }
} else {
    echo "0 results";
}

?>
<html>
	<head>
	</head>
<body>
	<form action="roomCheck.php" method="POST">
		<table>
			<tr><th colspan="2"> General Information: </th></tr>
			<tr><td> First Name: </td><td><input type="text" name="firstname"></td></tr>
			<tr><td> Last Name: </td><td><input type="text" name="lastname"></td></tr>
			<tr><td> CWID: </td><td><input type="number" min="1"  name="cwid"/></td></tr>
			<tr><td> Year </td><td>
							<select name= "year">
								<option value= "">Select a Year</option>
								<option value="freshman">Freshman</option>
								<option value="sophomore">Sophomore</option>
								<option value="junior">Junior</option>
								<option value="senior"> Senior </option>
							</select>
							</td></tr>
			<tr><td>Gender</td><td>
					<select name="gender" id="gender">
					<option value="">Select a Gender</option>
					<option value="transgender">Transgender</option>
					<option value="female">Female</option>
					<option value="other">Other</option>
					<option value="male">Male</option>
					</select>
				</td></tr>
			<tr><th colspan="2">Preferences:</th></tr>
			<tr><td> Laundry?: </td><td><input type="checkbox" name="laundry"></td></tr>
			<tr><td> Special Services?: </td><td><input type="checkbox" name="sservices"></td></tr>
			<tr><td> Kitchen?: </td><td><input type="checkbox" name="kitchen"></td></tr>
			<tr><th colspan="2">Residence Selection</th></tr>
			<tr><td>Where would you like to live?:</td><td>
															<select name="residence">
																<option value="">Select a residence</option>
																<option value="champagnat">Champagnat Hall</option>
																<option value="leo">Leo Hall</option>
																<option value="marian">Marian Hall</option>
																<option value="sheahan">Sheahan Hall</option>
																<option value="midrise">Midrise Hall</option>
																<option value="foy">Foy Townhouses</option>
																<option value="gartland">Gartland Commons</option>
																<option value="uppernew">Upper New Townhouses</option>
																<option value="lowernew">Lower New Townhouses</option>
																<option value="newfulton">New Fulton Townhouses</option>
																<option value="lowerwest">Lower West Cedar Townhouses</option>
																<option value="upperwest">Upper West Cedar Townhouses</option>
																<option value="fulton">Fulton Street Townhouses</option>
																<option value="talmadge">Talmadge Court</option>
																<option value="offcampus">Off Campus</option>
															</td></tr>
															<?php
															echo "<input type='hidden' name='remainingSlots' value='$roomsLeft'>";
															?>
			<tr><td>Email</td><td><input type="email" required="required" name="email"></td></tr>
			<tr><th colspan="2"><input type="submit" value="Submit"></th></tr>
</body>
</html>