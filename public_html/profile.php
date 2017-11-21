<html>
<head>
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Carme" />
</head>
<body>

<form action="form.php" method="get">

<fieldset class="field_set" style="font-family: Impact;font-size:28px; color:#70bdcd;"><!-- Form Name --> <legend>JOBFOX PROFILE</legend>
<table class="blueTable">
<thead>
<tr>
</tr>
</thead>
<tbody>
<tr>
<td>
<label class="fb-text-label" style="font-family: Carme; font-size:16px; color:#000; for="firstname">First Name: </label> 
</td>
<td>
<label class="fb-text-label" style="font-family: Carme; font-size:16px; color:#000; for="LastName">Last Name: </label> 
</td>
</tr>
<tr>
<td><input id="FirstName" class="form-control" maxlength="55" name="FirstName" type="text" /></td>
<td><input id="LastName" class="form-control" maxlength="55" name="LastName" type="text" /></td>
</tr>
<tr>
<tr>
<td>
<div class="fb-text form-group field-Location" style="font-family: Carme; font-size:16px; color:#000;"><label class="fb-text-label" for="Location">Location: </label></div>
</td>
<td>
<div class="fb-text form-group field-Age" style="font-family: Carme; font-size:16px; color:#000;"><label class="fb-text-label" for="Age">Age: </label></div>
</td>
</tr><td>
<input id="Location" class="form-control"  maxlength="35" name="Location" type="text" />
</td>
<td>
<input id="Age" class="form-control" maxlength="2" name="Age" type="text" />
</td>
</tr>
<tr>
<td>
<div class="fb-select form-group field-Degree" style="font-family: Carme; font-size:16px; color:#000;"><label class="fb-select-label" for="Degree">Degree: </label></div
</tr>

<tr>
<td>



<?php
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
$sql="SELECT DegreeName FROM Degrees order by DegreeName"; 
/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
echo '<select style="font-family: Carme; font-size:16px; color:#000;" id="Degree" class="form-control" name="Degree">Degree Name</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Degree...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[DegreeName]'>$row[DegreeName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?>
</div>
</td>
</tbody>
</table>
</fieldset>
</tr>

<fieldset class="field_set" style="font-family: Impact; font-size:28px;color:#70bdcd;"><!-- Form Name --> <legend>Input Technical Skills</legend>
<table class="blueTable">
<thead>
<tr>
<th style="font-family: Carme; font-size:14px; color:#999;">Technical Skill</th>
<th style="font-family: Carme; font-size:14px; color:#999;">Skill Level</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php
$sql="SELECT TechSkillName FROM TechSkills order by TechSkillName"; 
/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="TechSkill1" class="form-control" name="TechSkill1">TechSkill1</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[TechSkillName]'>$row[TechSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="Slider" class="slider" style= "width: 200px;" align="center"max="10" min="0" type="range" value="0" onchange="updateTechSkill1(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="TechSkill1Weight" name= "TechSkill1Weight" value="">


<script>
function updateTechSkill1(val) {
          document.getElementById('TechSkill1Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>
<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="TechSkill2" class="form-control" name="TechSkill2">TechSkill2</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[TechSkillName]'>$row[TechSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="Slider" class="slider" style= "width: 200px;" max="10" min="0" type="range" value="0" onchange="updateTechSkill2(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="TechSkill2Weight" name= "TechSkill2Weight" value="">


<script>
function updateTechSkill2(val) {
          document.getElementById('TechSkill2Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>
<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="TechSkill3" class="form-control" name="TechSkill3">TechSkill3</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[TechSkillName]'>$row[TechSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="Slider" class="slider" style= "width: 200px;" max="10" min="0" type="range" value="0" onchange="updateTechSkill3(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="TechSkill3Weight" name= "TechSkill3Weight" value="">


<script>
function updateTechSkill3(val) {
          document.getElementById('TechSkill3Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>
<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="TechSkill4" class="form-control" name="TechSkill4">TechSkill4</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[TechSkillName]'>$row[TechSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="Slider" class="slider" style= "width: 200px;" max="10" min="0" type="range" value="0" onchange="updateTechSkill4(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="TechSkill4Weight" name= "TechSkill4Weight" value="">


<script>
function updateTechSkill4(val) {
          document.getElementById('TechSkill4Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>
<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="TechSkill5" class="form-control" name="TechSkill5">TechSkill5</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[TechSkillName]'>$row[TechSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="Slider" class="slider" style= "width: 200px;" max="10" min="0" type="range" value="0" onchange="updateTechSkill5(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="TechSkill5Weight" name= "TechSkill5Weight" value="">


<script>
function updateTechSkill5(val) {
          document.getElementById('TechSkill5Weight').value=val; 
        }
</script>
</td>
</tr>
</tbody>
</table>
</fieldset>





<fieldset class="field_set" style="font-family: Impact;font-size:28px;color:#70bdcd;"><!-- Form Name --> <legend >Input  Personal Skills</legend><table class="blueTable">
<thead>
<tr>
<th style="font-family: Carme; font-size:14px; color:#999;">Personal Skill</th>
<th style="font-family: Carme; font-size:14px; color:#999;">Skill Level</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<td><?php
$sql="SELECT SoftSkillName FROM SoftSkills order by SoftSkillName"; 
/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="SoftSkill1" class="form-control" name="SoftSkill1">SoftSkill1</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[SoftSkillName]'>$row[SoftSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer" ><input id="SoftSkill1Slider" class="slider" max="10" min="0" type="range" value="0" onchange="updateSoftSkill1(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="SoftSkill1Weight" name= "SoftSkill1Weight" value="">
<script>
function updateSoftSkill1(val) {
          document.getElementById('SoftSkill1Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>
<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="SoftSkill2" class="form-control" name="SoftSkill2">SoftSkill2</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[SoftSkillName]'>$row[SoftSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="SoftSkill2Slider" class="slider" max="10" min="0" type="range" value="0" onchange="updateSoftSkill2(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="SoftSkill2Weight" name= "SoftSkill2Weight" value="">
<script>
function updateSoftSkill2(val) {
          document.getElementById('SoftSkill2Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>
<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="SoftSkill3" class="form-control" name="SoftSkill3">SoftSkill3</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[SoftSkillName]'>$row[SoftSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="SoftSkill3Slider" class="slider" max="10" min="0" type="range" value="0" onchange="updateSoftSkill3(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="SoftSkill3Weight" name= "SoftSkill3Weight" value="">
<script>
function updateSoftSkill3(val) {
          document.getElementById('SoftSkill3Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>
<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="SoftSkill4" class="form-control" name="SoftSkill4">SoftSkill4</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[SoftSkillName]'>$row[SoftSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="SoftSkill4Slider" class="slider" max="10" min="0" type="range" value="0" onchange="updateSoftSkill4(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="SoftSkill4Weight" name= "SoftSkill4Weight" value="">
<script>
function updateSoftSkill4(val) {
          document.getElementById('SoftSkill4Weight').value=val; 
        }
</script>
</td>
</tr>
<tr>


<td><?php
echo '<select  style="font-family: Carme; font-size:16px; color:#000;" id="SoftSkill5" class="form-control" name="SoftSkill5">SoftSkill5</option>'; // list box select command
echo '<option disabled="disabled" selected="selected">Select a Skill...</option>';
foreach ($dbo->query($sql) as $row){//Array or records stored in $row
echo "<option value='$row[SoftSkillName]'>$row[SoftSkillName]</option>"; 
/* Option values are added by looping through the array */ 
}
 echo "</select>";// Closing of list box
?></td>
<td style = "padding-left: 20px">
<div id="slidecontainer"><input id="Slider" class="slider" style= "width: 200px;" max="10" min="0" type="range" value="0" onchange="updateTextInput(this.value);"/></div>
</td><td style = "padding-left: 20px">
<input type="text" size="1" id="SoftSkill5Weight" name= "SoftSkill5Weight" value="">


<script>
function updateTextInput(val) {
          document.getElementById('SoftSkill5Weight').value=val; 
        }
</script>
</td>
</tr>
</tbody>
</table>
</fieldset>
<br>

<input type="submit" value="Submit" class="myButton" id="myButton" style="font-family: Impact;font-size:28px; box-shadow: rgb(58, 123, 135) 0px -3px 7px 0px inset; background: linear-gradient(rgb(96, 201, 209) 5%, rgb(83, 147, 166) 100%) rgb(96, 201, 209); border-radius: 3px; border: 1px solid rgb(11, 14, 7); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); padding: 9px 23px; text-decoration: none; text-shadow: rgb(46, 141, 148) 0px 1px 0px;">
</form>

</body>
</html>