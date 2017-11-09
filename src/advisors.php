<html>
<body>
<h1>Select a student:</h1>
<select class="options">
<option>--Student Name--</option>

<?php 
    
$servername = "localhost";
$username = "nichol29_user";
$password = "Capstone5$";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Query db
$sql = mysqli_query($connection, "SELECT UserID, FirstName, LastName from Users");
$result = mysql_query ($query);
echo "<select name='dropdown' value=''><option>Dropdown</option>";
while ($row = $sql->fetch_assoc()){
    $stringRes = $row['LastName'] . ', ' . $row['FirstName'] . ' - ' . $row['UserID']
    echo '<option value = $stringRes'.'</option>';
}
?>

</select>
<p><input type="submit" value="Submit" /></p>
</body>
</html>