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
 
// sql to create table
$sql = "CREATE TABLE Students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
cwid VARCHAR(10) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
 
if (mysqli_query($conn, $sql)) {
    echo "Table Students created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
 
mysqli_close($conn);
?>