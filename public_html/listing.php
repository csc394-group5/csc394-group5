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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="chart/Chart.bundle.js"></script>
<script src="chart/utils.js"></script>
<script>
 window.onload = function() {
 
 var UserID =0;
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
        url: "http://api.glassdoor.com/api/api.htm?t.p=25738&t.k=iRCtcWJQamE&format=json&v=1&action=employers&q=",
        type: "GET",
        async: false,
        success: function (data) {
		var arr = [];
		for(var x in data){
			arr.push(data[x]);
			}
        			
		Job1 = arr[0].jsessionid;

	
	
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
<div id= "test"></div>
    <div id="canvas-holder" style="width:100%">
    <canvas id="chart-area"></canvas>
    </div>
</body>
</html>
