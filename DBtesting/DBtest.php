<?php
$servername = "localhost";
$username = "lizsan708";
$password = "";
$DBname = "residenceDB";
#(>;v;)># Rejection Waffle \o/ victory screech!! leedle leedle leedle
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $DBname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connection successful!";
    // .
    // "<audio controls autoplay='autoplay' loop='loop' controls='controls' >
    //  <source src='leedle.mp3' type='audio/mpeg'>
    //  Your browser does not support the audio element.
    // </audio>";
}
 
// Create database
// $sql = "CREATE DATABASE myDB";
// if (mysqli_query($conn, $sql)) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }
 
mysqli_close($conn);
?>