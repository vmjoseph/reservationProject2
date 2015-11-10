<?php
require_once("../DBtesting/DBconnect.php");
$firstname = ucfirst(trim($_POST["firstname"]));
$lastname= ucfirst(trim($_POST["lastname"]));
$cwid= trim($_POST["cwid"]);
$year= $_POST["year"];
$laundry= ($_POST["laundry"]);
$sservices= ($_POST["sservices"]);
$kitchen=($_POST["kitchen"]);
$gender=$_POST["gender"];
$residence= ($_POST["residence"]);
#Placing each group of residence halls (halls for seniors/juniors, halls for freshman ect) into an array
$seniorJunior= array("newfulton", "lowerwest","upperwest","fulton","talmadge");
$freshman=array("sheahan","leo","marian","champagnat");
$sophomore=array("midrise","gartland","foy","uppernew","lowernew");
echo "<table>
        <tr><td>Name: </td><td>$firstname $lastname</td</tr>
        <tr><td>Year: </td><td>".ucfirst($year)."</td</tr>
        <tr><td>Residence Hall: </td><td>".ucfirst($residence)."</td</tr>
        <tr><td>Gender:</td><td>$gender</td></tr>
        <tr><td>Preferences: </td><td>Preference</td><td>Yes/No</td></tr>
        <tr><td></td><td> Kitchen: </td><td>$kitchen</td></tr>
        <tr><td></td><td> Laundry: </td><td>$laundry</td></tr>
        <tr><td></td><td>  Special Services: </td><td>$sservices</td></tr>
        </table>";
        
$sql =  "SELECT * FROM residence_halls ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $selectedResidence= $row["$residence"];
    }
} else {
    echo "0 results";
}
echo "The $residence hall started with $selectedResidence rooms left";
$finalResidence=$selectedResidence-1;
echo"<br> Now $residence has $finalResidence rooms left";
$sql2= "UPDATE $residence SET '$residence";

$sql3 =  "INSERT INTO residence_areas (first_name, last_name, year, gender ,cwid, hall, special_services, kitchen, laundry)
 VALUES ('$firstname', '$lastname', '$year', '$gender','$cwid' , '$residence' , '$sservicesChoice' , '$laundryChoice' , '$kitchenChoice') ";

if (mysqli_query($conn, $sql3)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>