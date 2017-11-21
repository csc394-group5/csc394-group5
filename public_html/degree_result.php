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
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="result.css">
</head>
<body>

 <h1 id = "headline" class="text-js"></h1>

  <center>   
<div id= "test"></div>
    <div id="canvas-holder" style="width:100%">
    <canvas id="chart-area"></canvas>
    </div>
	</center>
<div id="content">
<!-- Form Name -->
   <fieldset class="field_set">
		<h2 id="Degree1Title"></h2>
		<div id="Degree1Desc"></div>
		<div id="Degree1About"></div>
		<div id="Degree1Curriculum"></div>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Degree2Title"></h2>
		<div id="Degree2Desc"></div>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Degree3Title"></h2>
		<div id="Degree3Desc"></div>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Degree4Title"></h2>
		<div id="Degree4Desc"></div>
	</fieldset>
	<br>
	   <fieldset class="field_set">
		<h2 id="Degree5Title"></h2>
		<div id="Degree5Desc"></div>
	</fieldset>
</div>		
</body>
<script src="js/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="chart/Chart.bundle.js"></script>
<script src="chart/utils.js"></script>
<script src="https://rmacwan.pythonanywhere.com"></script>
<script>
 window.onload = function() {
 
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
        url: "/app/api.php?r=" + <?php echo $user->id;?>,
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
		
		Degree1 = Degree1.replace(/\_/g, ' '); 
		Degree2 = Degree2.replace(/\_/g, ' '); 
		Degree3 = Degree3.replace(/\_/g, ' '); 
		Degree4 = Degree4.replace(/\_/g, ' '); 
		Degree5 = Degree5.replace(/\_/g, ' '); 
		
		DegreeResult1 = 100*arr[0].DegreeResult1;
		DegreeResult2 = 100*arr[0].DegreeResult2;
		DegreeResult3 = 100*arr[0].DegreeResult3;
		DegreeResult4 = 100*arr[0].DegreeResult4;
		DegreeResult5 = 100*arr[0].DegreeResult5;

		$("h1").append("Your Top Education Path is: "+ Degree1);
}
		
    });
	
	// Get degree info from python api
	jQuery.ajax({
		url: "https://rmacwan.pythonanywhere.com/api/degrees/" +Degree1,
		type: "GET",
		datatype: 'json',
		headers: { 'Access-Control-Allow-Origin': '*' },
		xhrFields: { withCredentials: false }, 
		success: function (data) {
			Degree1Description = data["Description"]; 
			document.getElementById("Degree1Desc").innerHTML = "<i>" + Degree1Description + "</i>"; 
			document.getElementById("Degree1Title").innerHTML = "1) " + Degree1; 
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
                    DegreeResult1,
                    DegreeResult2,
                    DegreeResult3,
                    DegreeResult4,
                    DegreeResult5,
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
