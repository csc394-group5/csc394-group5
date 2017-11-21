<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="chart/Chart.bundle.js"></script>
<script src="chart/utils.js"></script>
<script>
 function query() {

 var UserID = document.getElementById("input").value;
 var Degree1 = "";
 var Degree2 = "";
 var Degree3 = "";
 var Degree4 = "";
 var Degree5 = "";

 var DegreeResult1 = 0;
 var DegreeResult2 = 0;
 var DegreeResult3 = 0;
 var DegreeResult4 = 0;
 var DegreeResult5 = 0;
 
    jQuery.ajax({
        url: "/app/api.php?r=" + UserID,
        type: "GET",
        async: false,
        success: function (data) {
		var arr = [];
		for(var x in data){
			arr.push(data[x]);
			}
        			
		Degree1 = arr[0].Degree1;
		Degree2 = arr[0].Degree2;
		Degree3 = arr[0].Degree3;
		Degree4 = arr[0].Degree4;
		Degree5 = arr[0].Degree5;
		
		DegreeResult1 = arr[0].DegreeResult1;
		DegreeResult2 = arr[0].DegreeResult2;
		DegreeResult3 = arr[0].DegreeResult3;
		DegreeResult4 = arr[0].DegreeResult4;
		DegreeResult5 = arr[0].DegreeResult5;
	
	/*
		$("div").append(Job1);
		$("div").append(Job2);
		$("div").append(Job3);
		$("div").append(Job4);
		$("div").append(Job5);

		$("div").append(JobResult1);
		$("div").append(JobResult2);
		$("div").append(JobResult3);
		$("div").append(JobResult4);
		$("div").append(JobResult5);]
		*/
}
		
    });





	var chartColors = window.chartColors;
    	var color = Chart.helpers.color;
    	var config = {
        data: {
            datasets: [{
                data: [
                    100*DegreeResult1,
                    100*DegreeResult2,
                    100*DegreeResult3,
                    100*DegreeResult4,
                    100*DegreeResult5,
                ],
                backgroundColor: [
                    color(chartColors.red).alpha(0.5).rgbString(),
                    color(chartColors.orange).alpha(0.5).rgbString(),
                    color(chartColors.yellow).alpha(0.5).rgbString(),
                    color(chartColors.green).alpha(0.5).rgbString(),
                    color(chartColors.blue).alpha(0.5).rgbString(),
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                Degree1,
                Degree2,
                Degree3,
                Degree4,
                Degree5
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: ' '
            },
            scale: {
              ticks: {
                beginAtZero: true
              },
              reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };

        var ctx = document.getElementById("chart-area");
        window.myPolarArea = Chart.PolarArea(ctx, config);
    };


    var colorNames = Object.keys(window.chartColors);
    

</script>
</head>
<body>
<h1><center>Student Degree Viewer</center></h3>
<?php

/*
$servername = "localhost";
$username = "nichol29_user";
$password = "Capstone5$";
$dbname = "nichol29_application";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/
$host_name = "localhost";
$database = "nichol29_application"; // Change your database name
$username = "nichol29_user";          // Your database user id 
$password = "Capstone5$";          // Your password

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

//$sql="SELECT name,id FROM student"; 

$sql="SELECT FirstName,LastName, UserID FROM Users order by LastName"; 

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select id=input name=student value=UserID>Student Name</option>"; // list box select command

foreach ($dbo->query($sql) as $row){//Array or records stored in $row

echo "<option value=$row[UserID]>$row[LastName], $row[FirstName]</option>"; 

/* Option values are added by looping through the array */ 

}

 echo "</select>";// Closing of list box
?>
<button onclick="query()">Submit</button>
<button onClick= location.reload()>Clear</button>
<div id= "test"></div>
    <div id="canvas-holder" style="width:100%">
    <canvas id="chart-area"></canvas>
    </div>
</body>
</html>