<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$u = intval($_GET['u']);

$con = mysqli_connect('localhost','nichol29_user','Capstone5$','nichol29_application');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"nichol29_application");
$sql="SELECT * FROM Users WHERE userid = '".$u."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Degree</th>
<th>Tech Skill 1</th>
<th>#</th>

<th>Tech Skill 2</th>
<th>#</th>

<th>TechSkill 3</th>
<th>#</th>

<th>TechSkill 4</th>
<th>#</th>

<th>TechSkill 5</th>
<th>#</th>

<th>SoftSkill 1</th>
<th>#</th>

<th>SoftSkill 2</th>
<th>#</th>

<th>SoftSkill 3</th>
<th>#</th>

<th>SoftSkill 4</th>
<th>#</th>

<th>SoftSkill 5</th>
<th>#</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Location'] . "</td>";
    echo "<td>" . $row['Degree'] . "</td>";
	
	echo "<td>" . $row['TechSkill1'] . "</td>";
	echo "<td>" . $row['TechSkill1Weight'] . "</td>";
	
	echo "<td>" . $row['TechSkill2'] . "</td>";
	echo "<td>" . $row['TechSkill2Weight'] . "</td>";

	echo "<td>" . $row['TechSkill3'] . "</td>";
	echo "<td>" . $row['TechSkill3Weight'] . "</td>";

	echo "<td>" . $row['TechSkill4'] . "</td>";
	echo "<td>" . $row['TechSkill4Weight'] . "</td>";

	echo "<td>" . $row['TechSkill5'] . "</td>";
	echo "<td>" . $row['TechSkill5Weight'] . "</td>";

	echo "<td>" . $row['SoftSkill1'] . "</td>";
	echo "<td>" . $row['SoftSkill1Weight'] . "</td>";

	echo "<td>" . $row['SoftSkill2'] . "</td>";
	echo "<td>" . $row['SoftSkill2Weight'] . "</td>";

	echo "<td>" . $row['SoftSkill3'] . "</td>";
	echo "<td>" . $row['SoftSkill3Weight'] . "</td>";

	echo "<td>" . $row['SoftSkill4'] . "</td>";
	echo "<td>" . $row['SoftSkill4Weight'] . "</td>";

	echo "<td>" . $row['SoftSkill5'] . "</td>";
	echo "<td>" . $row['SoftSkill5Weight'] . "</td>";

    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>