<?php


$servername = "localhost";
$username = "lizsan708";
$password = "";
$dbname = "residenceDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connected succesfully! \o/";
}

$sql="SELECT * FROM residence_halls"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>champagnat spaces left: " . $row["champagnat"]. " " . "<br>".
        "sheahan spaces left: " . $row["sheahan"]. " " . "<br>";
    }
} else {
    echo "0 results";
}

// if (mysqli_query($conn, $sql)) {
    
    
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

 
mysqli_close($conn);
?>