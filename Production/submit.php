<?php
require_once("connect.php");
$firstname = ucfirst(trim($_POST["firstname"]));
$lastname= ucfirst(trim($_POST["lastname"]));
$cwid= trim($_POST["cwid"]);
$year= $_POST["year"];
$laundry= isset($_POST["laundry"]);
$sservices= isset($_POST["sservices"]);
$kitchen=isset($_POST["kitchen"]);
$residence= ($_POST["residence"]);
$gender=$_POST["gender"];
#Placing each group of residence halls (halls for seniors/juniors, halls for freshman ect) into an array
$seniorJunior= array("newfulton", "lowerwest","upperwest","fulton","talmadge");
$freshman=array("sheahan","leo","marian","champagnat");
$sophomore=array("midrise","gartland","foy","uppernew","lowernew");
$email=$_POST["email"];
$laundryChoice=$_POST["laundry"];
$kitchenChoice=$_POST["kitchen"];
$sservicesChoice=$_POST["sservices"];
$roomsRemaining=$_POST["roomsRemaining"];
$subtractRoom=$_POST["subtractRoom"];
$confCode = substr(md5(uniqid(rand(), true)), 16, 16);
#displays final submission
echo "<table>
        <tr><td>Name: </td><td>$firstname $lastname</td</tr>
        <tr><td>Year: </td><td>".ucfirst($year)."</td</tr>
        <tr><td>Residence Hall: </td><td>".ucfirst($residence)."</td</tr>
        <tr><td>Gender:</td><td>$gender</td></tr>
        <tr><td>Email:</td><td>$email</td></tr>
        <tr><td>Preferences: </td><td>Preference</td><td>Yes/No</td></tr>
        <tr><td></td><td> Kitchen: </td><td>$kitchenChoice</td></tr>
        <tr><td></td><td> Laundry: </td><td>$laundryChoice</td></tr>
        <tr><td></td><td>  Special Services: </td><td>$sservicesChoice</td></tr>
        </table>";
        

#logs user input into the residence area table        
$sql =  "INSERT INTO residence_areas (first_name, last_name, year, gender, cwid, hall, special_services, kitchen, laundry, email,confirm_code)
 VALUES ('$firstname', '$lastname', '$year', '$gender', '$cwid' , '$residence' , '$sservicesChoice' , '$kitchenChoice' , '$laundryChoice' , '$email', '$confCode' )";

if (mysqli_query($conn, $sql)) {
    echo "<br> Student Choices Inserted Successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
if($residence == "offcampus"){
    
}else{
    echo "Remaining rooms in $residence are : ".$subtractRoom;
    $sql2 = "UPDATE residence_halls SET $residence = $subtractRoom";
if (mysqli_query($conn, $sql2)) {
    echo "<br> Residence Remaining Rooms Updated Successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
}


echo "<br> Confirmation Code: <a href='#'>$confCode</a>";
?>