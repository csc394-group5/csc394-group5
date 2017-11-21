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

  $rows = array();
  while($r = mysqli_fetch_array($result,MYSQLI_BOTH)) {
    $rows[] = $r;
  }
  echo json_encode($rows);

mysqli_close($con);
?>
</body>
</html>