<?php
if (!defined('_JEXEC'))
{
    // Initialize Joomla framework
    define('_JEXEC', 1);
}

// Load system defines
if (file_exists(dirname(__FILE__) . '/defines.php'))
{
    require_once dirname(__FILE__) . '/defines.php';
}
if (!defined('JPATH_BASE'))
{
    define('JPATH_BASE', dirname(__FILE__));
}
if (!defined('_JDEFINES'))
{
    require_once JPATH_BASE . '/includes/defines.php';
}

// Get the framework.
require_once JPATH_BASE . '/includes/framework.php';

$app = JFactory::getApplication('site');
$app->initialise();

$user = JFactory::getUser();
// echo "id:".$user->id; //to call JOOMLA userID
// DEFINE INPUT VARIABLES
$UserID = $user->id;
$FirstName = $_GET["FirstName"];
$LastName = $_GET["LastName"];
$Age = $_GET["Age"];
$Degree = $_GET["Degree"];
$Location = $_GET["Location"];

//Tech Skills
$TechSkill1 = $_GET["TechSkill1"];
$TechSkill1Weight = $_GET["TechSkill1Weight"];
$TechSkill2 = $_GET["TechSkill2"];
$TechSkill2Weight = $_GET["TechSkill2Weight"];
$TechSkill3 = $_GET["TechSkill3"];
$TechSkill3Weight = $_GET["TechSkill3Weight"];
$TechSkill4 = $_GET["TechSkill4"];
$TechSkill4Weight = $_GET["TechSkill4Weight"];
$TechSkill5 = $_GET["TechSkill5"];
$TechSkill5Weight = $_GET["TechSkill5Weight"];

//Soft Skills
$SoftSkill1 = $_GET["SoftSkill1"];
$SoftSkill1Weight = $_GET["SoftSkill1Weight"];
$SoftSkill2 = $_GET["SoftSkill2"];
$SoftSkill2Weight = $_GET["SoftSkill2Weight"];
$SoftSkill3 = $_GET["SoftSkill3"];
$SoftSkill3Weight = $_GET["SoftSkill3Weight"];
$SoftSkill4 = $_GET["SoftSkill4"];
$SoftSkill4Weight = $_GET["SoftSkill4Weight"];
$SoftSkill5 = $_GET["SoftSkill5"];
$SoftSkill5Weight = $_GET["SoftSkill5Weight"];

//connect to database
$conn = mysqli_connect('localhost','nichol29_user','Capstone5$','nichol29_application');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO Users (UserID, FirstName, LastName, Age, Location, Degree, TechSkill1, TechSkill1Weight, TechSkill2, TechSkill2Weight, TechSkill3, TechSkill3Weight, TechSkill4, TechSkill4Weight, TechSkill5, TechSkill5Weight, SoftSkill1, SoftSkill1Weight, SoftSkill2, SoftSkill2Weight, SoftSkill3, SoftSkill3Weight, SoftSkill4, SoftSkill4Weight, SoftSkill5, SoftSkill5Weight)
VALUES ('$UserID', '$FirstName','$LastName','$Age','$Location', '$Degree', '$TechSkill1', '$TechSkill1Weight', '$TechSkill2', '$TechSkill2Weight', '$TechSkill3', '$TechSkill3Weight', '$TechSkill4', '$TechSkill4Weight', '$TechSkill5', '$TechSkill5Weight', '$SoftSkill1', '$SoftSkill1Weight', '$SoftSkill2', '$SoftSkill2Weight', '$SoftSkill3', '$SoftSkill3Weight', '$SoftSkill4', '$SoftSkill4Weight', '$SoftSkill5', '$SoftSkill5Weight')
ON DUPLICATE KEY UPDATE UserID='$UserID', FirstName = '$FirstName', LastName= '$LastName', Age = '$Age', Location='$Location', Degree='$Degree', TechSkill1='$TechSkill1',TechSkill1Weight='$TechSkill1Weight',TechSkill2='$TechSkill2',TechSkill2Weight='$TechSkill2Weight',TechSkill3='$TechSkill3',TechSkill3Weight='$TechSkill3Weight',TechSkill4='$TechSkill4',TechSkill4Weight='$TechSkill4Weight',TechSkill5='$TechSkill5',TechSkill5Weight='$TechSkill5Weight',SoftSkill1='$SoftSkill1',SoftSkill1Weight='$SoftSkill1Weight',SoftSkill2='$SoftSkill2',SoftSkill2Weight='$SoftSkill2Weight',SoftSkill3='$SoftSkill3',SoftSkill3Weight='$SoftSkill3Weight',SoftSkill4='$SoftSkill4',SoftSkill4Weight='$SoftSkill4Weight',SoftSkill5='$SoftSkill5',SoftSkill5Weight='$SoftSkill5Weight';";
	
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
	//make request to neural net

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "<html>";
echo"<body>";
echo"User ID:".$UserID." <br>";
echo"First Name:".$FirstName." <br>";
echo"Last Name:".$LastName." <br>";
echo"Age:".$Age." <br>";
echo"Location:".$Location." <br>";
echo"Degree:".$Degree." <br>";

echo"Tech Skill 1:".$TechSkill1." <br>";
echo"Tech Skill 1 Weight:".$TechSkill1Weight." <br>";
echo"Tech Skill 2:".$TechSkill2." <br>";
echo"Tech Skill 2 Weight:".$TechSkill2Weight." <br>";
echo"Tech Skill 3:".$TechSkill3." <br>";
echo"Tech Skill 3 Weight:".$TechSkill3Weight." <br>";
echo"Tech Skill 4:".$TechSkill4." <br>";
echo"Tech Skill 4 Weight:".$TechSkill4Weight." <br>";
echo"Tech Skill 5:".$TechSkill5." <br>";
echo"Tech Skill 5 Weight:".$TechSkill5Weight." <br><br>";

echo"Soft Skill 1:".$SoftSkill1." <br>";
echo"Soft Skill 1 Weight:".$SoftSkill1Weight." <br>";
echo"Soft Skill 2:".$SoftSkill2." <br>";
echo"Soft Skill 2 Weight:".$SoftSkill2Weight." <br>";
echo"Soft Skill 3:".$SoftSkill3." <br>";
echo"Soft Skill 3 Weight:".$SoftSkill3Weight." <br>";
echo"Soft Skill 4:".$SoftSkill4." <br>";
echo"Soft Skill 4 Weight:".$SoftSkill4Weight." <br>";
echo"Soft Skill 5:".$SoftSkill5." <br>";
echo"Soft Skill 5 Weight:".$SoftSkill5Weight." <br><br>";
echo"</body>";
echo"</html>";

?>
<!DOCTYPE html>


<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
 window.onload = function() {
    jQuery.ajax({
        url: "http://192.168.1.122:8081/?user="+<?php echo $user->id;?>+"&type=job" ,
        type: "GET",
        async: false,
        success: function (data) {
		var arr = [];
		for(var x in data){
			arr.push(data[x]);
			}
        			

}
		
    });
 }
</script>
 <script type="text/JavaScript">
      setTimeout("location.href = 'http://nicholash2.sgedu.site/degree.php';",1500);
 </script>
</head>
<body>
</body>
</html>
