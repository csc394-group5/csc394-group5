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

?>
<!DOCTYPE html>


<html>
<head>
<link rel="stylesheet" href="result.css">
<style>a:link {
    color: #926fc9;
}

/* visited link */
a:visited {
    color: #9500fd;
}

/* mouse over link */
a:hover {
    color: #c97bff;
}

/* selected link */
a:active {
    color: #953fd2;
}</style>
</head>
<body>
<div id="Title">
	<div class="type-js headline">
<h1 id = "headline" class="text-js"></h1>

</div>
    <script src="js/index.js"></script>
</div>
<div id= "test"></div>
    <div id="canvas-holder" style="width:100%">
    <canvas id="chart-area"></canvas>
</div><br><br>
<div id="list5">
<!-- Form Name -->
   <fieldset class="field_set">
		<h2 id="Job1Title"></h2>
		<div id="Job1Desc"></div>
		<h3> Career Links: </h3>
        <ul id="Job1List"></ul>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Job2Title"></h2>
		<div id="Job2Desc"></div>
		<h3> Career Links: </h3>
        <ul id="Job2List"></ul>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Job3Title"></h2>
		<div id="Job3Desc"></div>
		<h3> Career Links: </h3>
        <ul id="Job3List"></ul>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Job4Title"></h2>
		<div id="Job4Desc"></div>
		<h3> Career Links: </h3>
        <ul id="Job4List"></ul>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Job5Title"></h2>
		<div id="Job5Desc"></div>
		<h3> Career Links: </h3>
        <ul id="Job5List"></ul>
	</fieldset>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="chart/Chart.bundle.js"></script>
<script src="chart/utils.js"></script>
<script src="https://rmacwan.pythonanywhere.com"></script>
<script>
 window.onload = function() {
 
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
 
 var Job1Description = ""; 
 var Job2Description = ""; 
 var Job3Description = ""; 
 var Job4Description = "";
 var Job5Description = ""; 
 
 var JobLinks1 = [];
 var JobLinks2 = [];
 var JobLinks3 = [];
 var JobLinks4 = [];
 var JobLinks5 = []; 
    
    jQuery.ajax({
        url: "/app/api.php?r=" + <?php echo $user->id;?>,
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
		
		// Remove special characters from job names
		Job1 = Job1.replace(/\_/g, ' '); 
		Job2 = Job2.replace(/\_/g, ' '); 
		Job3 = Job3.replace(/\_/g, ' '); 
		Job4 = Job4.replace(/\_/g, ' '); 
		Job5 = Job5.replace(/\_/g, ' '); 
		
		JobResult1 = arr[0].JobResult1;
		JobResult2 = arr[0].JobResult2;
		JobResult3 = arr[0].JobResult3;
		JobResult4 = arr[0].JobResult4;
		JobResult5 = arr[0].JobResult5;
		$("h1").append("Your Top Career Path is: "+ Job1);

	}
    });

		jQuery.ajax({
		url: "https://rmacwan.pythonanywhere.com/api/jobs/" +Job1,
		type: "GET",
		datatype: 'json',
		headers: { 'Access-Control-Allow-Origin': '*' },
		xhrFields: { withCredentials: false }, 
		success: function (data) {
			Job1Description = data["description"]; 
			document.getElementById("Job1Desc").innerHTML = "<i>" + Job1Description + "</i>"; 
			JobLinks1= data["jobs"]; 
			document.getElementById("Job1Title").innerHTML = "1) " + Job1; 
			for(x=0; x < JobLinks1.length; x++){
				document.getElementById("Job1List").innerHTML += "<li><a href=\' " + JobLinks1[x] + "\' target='_blank' style='text-decoration:none'>" + JobLinks1[x] + "</a></li>"; 
			}
		}, 
		failure: function() {
			alert("Something bad happened."); 
			}
	}); 
	
	jQuery.ajax({
		url: "https://rmacwan.pythonanywhere.com/api/jobs/" +Job2,
		type: "GET",
		datatype: 'json',
		headers: { 'Access-Control-Allow-Origin': '*' },
		xhrFields: { withCredentials: false }, 
		success: function (data) {
			Job2Description = data["description"]; 
			document.getElementById("Job2Desc").innerHTML = "<i>" + Job2Description + "</i>"; 
			JobLinks2= data["jobs"]; 
			document.getElementById("Job2Title").innerHTML = "2) " + Job2; 
			for(x=0; x < JobLinks2.length; x++){
				document.getElementById("Job2List").innerHTML += "<li><a href=\' " + JobLinks2[x] + "\' target='_blank' style='text-decoration:none'>" + JobLinks2[x] + "</a></li>"; 
			}
		}, 
		failure: function() {
			alert("Something bad happened."); 
			}
	}); 
	
	jQuery.ajax({
		url: "https://rmacwan.pythonanywhere.com/api/jobs/" +Job3,
		type: "GET",
		datatype: 'json',
		headers: { 'Access-Control-Allow-Origin': '*' },
		xhrFields: { withCredentials: false }, 
		success: function (data) {
			Job3Description = data["description"]; 
			document.getElementById("Job3Desc").innerHTML = "<i>" + Job3Description + "</i>"; 
			JobLinks3= data["jobs"]; 
			document.getElementById("Job3Title").innerHTML = "3) " + Job3; 
			for(x=0; x < JobLinks3.length; x++){
				document.getElementById("Job3List").innerHTML += "<li><a href=\' " + JobLinks3[x] + "\' target='_blank' style='text-decoration:none'>" + JobLinks3[x] + "</a></li>"; 
			}
		}, 
		failure: function() {
			alert("Something bad happened."); 
			}
	}); 
	
	jQuery.ajax({
		url: "https://rmacwan.pythonanywhere.com/api/jobs/" +Job4,
		type: "GET",
		datatype: 'json',
		headers: { 'Access-Control-Allow-Origin': '*' },
		xhrFields: { withCredentials: false }, 
		success: function (data) {
			Job4Description = data["description"]; 
			document.getElementById("Job4Desc").innerHTML = "<i>" + Job4Description + "</i>"; 
			JobLinks4= data["jobs"]; 
			document.getElementById("Job4Title").innerHTML = "4) " + Job4; 
			for(x=0; x < JobLinks4.length; x++){
				document.getElementById("Job4List").innerHTML += "<li><a href=\' " + JobLinks4[x] + "\' target='_blank' style='text-decoration:none'>" + JobLinks4[x] + "</a></li>"; 
			}
		}, 
		failure: function() {
			alert("Something bad happened."); 
			}
	}); 
	
	jQuery.ajax({
		url: "https://rmacwan.pythonanywhere.com/api/jobs/" +Job5,
		type: "GET",
		datatype: 'json',
		headers: { 'Access-Control-Allow-Origin': '*' },
		xhrFields: { withCredentials: false }, 
		success: function (data) {
			Job5Description = data["description"]; 
			document.getElementById("Job5Desc").innerHTML = "<i>" + Job5Description + "</i>"; 
			JobLinks5= data["jobs"]; 
			document.getElementById("Job5Title").innerHTML = "5) " + Job5; 
			for(x=0; x < JobLinks5.length; x++){
				document.getElementById("Job5List").innerHTML += "<li><a href=\' " + JobLinks5[x] + "\' target='_blank' style='text-decoration:none'>" + JobLinks5[x] + "</a></li>"; 
			}
		}, 
		failure: function() {
			alert("Something bad happened."); 
			}
	}); 
	
var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    var config = {
        data: {
            datasets: [{
                data: [
                    100*JobResult1,
                    100*JobResult2,
                    100*JobResult3,
                    100*JobResult4,
                    100*JobResult5,
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
                text: '',
           	padding: 10
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
</html>
