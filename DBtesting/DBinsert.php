<?php
require_once('DBconnect.php');
// Db Connect Script
// $servername = "localhost";
// $username = "lizsan708";
// $password = "";
// $dbname = "residenceDB";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

$sql =  "INSERT INTO residence_areas (first_name, last_name, year, gender, cwid, hall, special_services, kitchen, laundry, email, timestamp)
 VALUES ('Patrick', 'Star', 'freshman', 'male', '10293847' , 'champagnat' , 'yes' , 'yes' , 'no' , 'patrick.star1@marist.edu' , '00:18:50' )";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// $sql = "INSERT INTO residence_areas (first_name, last_name, year, gender, cwid, hall, special_services, kitchen, laundry, email, timestamp)
// VALUES ('Patrick', 'Star', 'freshman', 'male', '10293847' , 'champagnat' , 'yes' , 'yes' , 'no' , 'patrick.star1@marist.edu' , '00:18:50' );";
//  //;-;
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
//  #this is a test
mysqli_close($conn);
?>