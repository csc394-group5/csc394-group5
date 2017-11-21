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
$content=file_get_contents("app/api.php?u=1");
$data=json_decode($content,true);
// Then just access the data from the assoc array like:
echo $data['UserID']['FirstName'];
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.getJSON("app/api.php?u=1", function(result){
            $.each(result, function(i, field){
                $("div").append(field.FirstName + " ");
				$("div").append(field.LastName + " ");
				$("div").append(field.Age + " ");
				$("div").append(field.Location + " ");
				$("div").append(field.Degree + " ");
				$("div").append(field.TechSkill1 + " ");
				$("div").append(field.TechSkill1Weight + " ");
				$("div").append(field.TechSkill2 + " ");
				$("div").append(field.TechSkill2Weight + " ");
				$("div").append(field.TechSkill3 + " ");
				$("div").append(field.TechSkill3Weight + " ");
				$("div").append(field.TechSkill4 + " ");
				$("div").append(field.TechSkill4Weight + " ");
				$("div").append(field.TechSkill5 + " ");
				$("div").append(field.TechSkill5Weight + " ");
				
				$("div").append(field.SoftSkill1 + " ");
				$("div").append(field.SoftSkill1Weight + " ");
				$("div").append(field.SoftSkill2 + " ");
				$("div").append(field.SoftSkill2Weight + " ");
				$("div").append(field.SoftSkill3 + " ");
				$("div").append(field.SoftSkill3Weight + " ");
				$("div").append(field.SoftSkill4 + " ");
				$("div").append(field.SoftSkill4Weight + " ");
				$("div").append(field.SoftSkill5 + " ");
				$("div").append(field.SoftSkill5Weight + " ");



            });
        });
    });
});
</script>
</head>
<body>

<button>Get JSON data</button>

<div></div>

</body>
</html>
