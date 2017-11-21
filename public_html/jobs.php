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
// DEFINE INPUT VARIABLES
$u = $user->id;

$con = mysqli_connect('localhost','nichol29_user','Capstone5$','nichol29_application');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"nichol29_application");
$user_sql="SELECT * FROM Results WHERE userid = '".$u."'";
$user_result = mysqli_query($con,$user_sql);

$user_rows = array();
while($ur = mysqli_fetch_array($user_result,MYSQLI_ASSOC)) {
    $user_rows[] = $ur;
  }
header('Content-Type: application/json');

mysqli_close($con); 
echo json_encode($user_rows);
?>
