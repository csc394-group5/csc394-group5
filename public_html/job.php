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
</head>
<body>
</body>
</html>
