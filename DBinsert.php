<?php
$servername = "localhost";
$username = "lizsan708";
$password = "";
$dbname = "myDB";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "INSERT INTO Students (firstname, lastname, cwid)
VALUES ('John', 'Smith', '123456789')";
 
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
mysqli_close($conn);
?>