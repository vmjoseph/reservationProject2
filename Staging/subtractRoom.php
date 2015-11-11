<?php 

require("formVars.php");

$servername = "localhost";
$username = "lizsan708";
$password = "";
$dbname = "residenceDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$removeOne=$remainingSlots-1;

echo "There are now $removeOne rooms remaining<br>";

$sql= "UPDATE residence_halls SET $residence= '$removeOne'";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }else{
//     echo "Connetion was Sucessful.<br>";
// }

// $sql= "SELECT $residence FROM residence_halls";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       ";
//     }
// } else {
//     echo "0 results";
// }
?>
