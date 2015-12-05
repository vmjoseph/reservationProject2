<head>
	<style>
	
	</style>
</head>
<?php
require_once("connect.php");
#declaring vars from previous index.html page
$firstname = ucfirst(trim($_POST["firstname"]));
$lastname= ucfirst(trim($_POST["lastname"]));
$cwid= trim($_POST["cwid"]);
$year= $_POST["year"];
$laundry= isset($_POST["laundry"]);
$sservices= isset($_POST["sservices"]);
$kitchen=isset($_POST["kitchen"]);
$residence= ($_POST["residence"]);
#Placing each group of residence halls (halls for seniors/juniors, halls for freshman ect) into an array
$seniorJunior= array("newfulton", "lowerwest","upperwest","fulton","talmadge");
$freshman=array("sheahan","leo","marian","champagnat");
$sophomore=array("midrise","gartland","foy","uppernew","lowernew");
$email=$_POST["email"];
$errorCounter;
$gender=$_POST["gender"];

// echo $year."<br>";
// echo $residence."<br>";
#testing Kitchen return value
#echo $kitchen."<br>";

#checks if a residence hall was selected
	if ($residence== ""){
		echo "You did not select a residence hall!!<br>";
		$errorCounter++;
	} else{
#Checks to see if you are a freshman, then checks to see the selection you have chosen for residence halls
    if($year=="freshman"){
        #searches user-selected year's array for residence hall, if the hall is found in another group's array, returns error
        if(in_array($residence,$sophomore) || in_array($residence, $seniorJunior)){
            echo "Sorry, you are a $year, so you cannot choose $residence.<br>";
            $errorCounter++;
            }else {
            #checks to see if user wants a kitchen, if so and they have chosen Marian, the user will receieve an error
                if($kitchen== TRUE && $residence=="marian" ){
                    // echo $residence."<br>";
                    echo "Sorry, $residence does not have the amenities you requested. Please try another residence hall. <br>";
                    $errorCounter++;
                } else{
                # echo "Congrats, you are a $year, so you can choose $residence. <br>";
                }
        
        }
    }
	
	if ($year == "sophomore"){
		if(in_array($residence,$freshman) || in_array($residence, $seniorJunior)){
			echo "Sorry, you are a $year, so you cannot chose $residence. <br>";
			$errorCounter++;
		}else {
			if($kitchen== TRUE && $residence=="midrise" ){
				#checks to see if user wants a kitchen, if so and they have chosen Midrise, the user will receieve an error
				echo "Sorry, $residence does not have the amenities you requested. Please try another residence hall. <br>";
				$errorCounter++;
			
		} else{
			#echo "Congrats, you are a $year, so you can choose $residence. <br>";
				}
			}
	}
	if ($year == "senior" || $year == "junior"){
		if(in_array($residence,$freshman) || in_array($residence, $sophomore)){
			echo "Sorry, you are a $year, so you cannot chose $residence. <br>";
			$errorCounter++;
		}else {
			#echo "Congrats, you are a $year, so you can choose $residence. <br>";
		}	
	}

	}	
	echo "Your residence choice was $residence<br>";
	
	#does not record off-campus choices on the residence hall table
	if ($residence == "offcampus"){
			echo "First Name: $firstname <br> Last Name: $lastname <br> Gender: $gender <br> Year: $year <br>
		CWID: $cwid <br> Email: $email <br>";
		echo "Please verify the information above. If there is an error, please go back.<br>";
		
		#pass on the variables to different pages
	    echo "<button onclick='window.history.back();'>Go Back</button>";
		echo "<form action='submit.php' method='POST'>
		 <form action='roomCheck.php' method='post'>
	    <input type='hidden' name='firstname' value=$firstname></input>
	    <input type='hidden' name='lastname' value=$lastname></input>
	    <input type='hidden' name='cwid' value=$cwid></input>
	    <input type='hidden' name='year' value=$year></input>
	    <input type='hidden' name='gender' value=$gender></input>
	    <input type='hidden' name='laundry' value=$laundryChoice></input>
	    <input type='hidden' name='kitchen' value=$kitchenChoice></input>
	    <input type='hidden' name='sservices' value=$sservicesChoice></input>
	    <input type='hidden' name='residence' value=$residence></input>
	    <input type='hidden' name='email' value=$email></input>
	    <input type='hidden' name='roomsRemaining' value=$roomsRemaining></input>
	    <input type='submit' value='Submit'>
	    </form>";
			  
	}else{
		#checks if other fields were left empty
	if (empty($firstname)){
		echo "You did not input your name!!<br>";
		$errorCounter++;
	}else{
	    echo "Your first name is ". $firstname.".<br>";
	}
	
	if (empty($lastname)){
		echo "You did not input your last name!!<br>";
		$errorCounter++;
	}else{
		echo "Your last name is ". $lastname.".<br>";
	}
	
	if (empty($cwid)){
		echo "You did not input your CWID!!<br>";
		$errorCounter++;
	}else{
		echo "Your CWID is ". $cwid.".<br>";
	}
	
	if ($year== ""){
		echo "You did not input your year!!<br>";
		$errorCounter++;
	}else{
		echo "Your year is ". $year.".<br>";
	}
	if($email==""){
	    echo "You did not input your email!<br>";
	}else{
	    echo "Your email is $email <br>";
	}
	$errorRate=(($errorCounter/5)*100)."%";
// 	echo "Total Errors Caught: ".$errorCounter."<br> Error percentage: ".$errorRate."<br>";
	if ($errorCounter>0){
	   // echo "<script>alert('Your submission has a few errors, please return to the form');</script>";
	    echo "<button onclick='window.history.back()';>Go Back</button>";
	    
	}else{
	    
$laundryChoice;
$kitchenChoice;
$sservicesChoice;

    if($kitchen==1){
        $kitchenChoice="Yes";
    }
    else{
        $kitchenChoice="No";
    }
    
    if($laundry==1){
        $laundryChoice="Yes";
    }
    else{
        $laundryChoice="No";
    }
    if($sservices==1){
        $sservicesChoice="Yes";
    }
    else{
        $sservicesChoice="No";
    }

$sql="SELECT $residence FROM residence_halls";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $roomsRemaining= $row["$residence"];
    }
} else {
    echo "0 results";
}

		#pass on the variables to different pages
	    echo "Your gender is $gender<br>";
	    echo "Please verify the information above. If there is an error, please go back.<br>";
	    echo "<button onclick='window.history.back();'>Go Back</button>
	    <form action='roomCheck.php' method='post'>
	    <input type='hidden' name='firstname' value=$firstname></input>
	    <input type='hidden' name='lastname' value=$lastname></input>
	    <input type='hidden' name='cwid' value=$cwid></input>
	    <input type='hidden' name='year' value=$year></input>
	    <input type='hidden' name='gender' value=$gender></input>
	    <input type='hidden' name='laundry' value=$laundryChoice></input>
	    <input type='hidden' name='kitchen' value=$kitchenChoice></input>
	    <input type='hidden' name='sservices' value=$sservicesChoice></input>
	    <input type='hidden' name='residence' value=$residence></input>
	    <input type='hidden' name='email' value=$email></input>
	    <input type='hidden' name='roomsRemaining' value=$roomsRemaining></input>
	    <input type='submit' value='Check Room Availability'>
	    </form>";
	}
	
		
	}
	


?>