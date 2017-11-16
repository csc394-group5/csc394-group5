<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="chart/Chart.bundle.js"></script>
<script src="chart/utils.js"></script>
<script>
 function query() {
 
 var UserID = document.getElementById("input").value;
 var Job1 = "";
 var Job2 = "";
 var Job3 = "";
 var Job4 = "";
 var Job5 = "";

 var JobResult1 = 0;
 var JobResult2 = 0;
 var JobResult3 = 0;
 var JobResult4 = 0;
 var JobResult5 = 0;
 
    jQuery.ajax({
        url: "/app/api.php?r=" + UserID,
        type: "GET",
        async: false,
        success: function (data) {
		var arr = [];
		for(var x in data){
			arr.push(data[x]);
			}
        			
		Job1 = arr[0].Job1;
		Job2 = arr[0].Job2;
		Job3 = arr[0].Job3;
		Job4 = arr[0].Job4;
		Job5 = arr[0].Job5;
		
		JobResult1 = arr[0].JobResult1;
		JobResult2 = arr[0].JobResult2;
		JobResult3 = arr[0].JobResult3;
		JobResult4 = arr[0].JobResult4;
		JobResult5 = arr[0].JobResult5;
	
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
                    JobResult1,
                    JobResult2,
                    JobResult3,
                    JobResult4,
                    JobResult5,
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
                Job1,
                Job2,
                Job3,
                Job4,
                Job5
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Custom Career Match'
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
<div id= "test"></div>
    <div id="canvas-holder" style="width:100%">
    <canvas id="chart-area"></canvas>
    </div>
</body>
</html>