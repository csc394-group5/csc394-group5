<?php
$u = intval($_GET['u']);
$j = intval($_GET['j']);
$d = intval($_GET['d']);
$r = intval($_GET['r']);


$con = mysqli_connect('localhost','nichol29_user','Capstone5$','nichol29_application');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

if ($u != null) {
mysqli_select_db($con,"nichol29_application");
$user_sql="SELECT * FROM Users WHERE userid = '".$u."'";
$user_result = mysqli_query($con,$user_sql);

  $user_rows = array();
  while($ur = mysqli_fetch_array($user_result,MYSQLI_ASSOC)) {
    $user_rows[] = $ur;
  }
  header('Content-Type: application/json');
  echo json_encode($user_rows);
}elseif ($d != null) {
mysqli_select_db($con,"nichol29_application");
$degree_sql="SELECT * FROM Degrees WHERE DegreeID = '".$d."'";
$degree_result = mysqli_query($con,$degree_sql);

  $degree_rows = array();
  while($dr = mysqli_fetch_array($degree_result,MYSQLI_ASSOC)) {
    $degree_rows[] = $dr;
  }
  header('Content-Type: application/json');
  echo json_encode($degree_rows);
}elseif ($j != null) {
 mysqli_select_db($con,"nichol29_application");
$job_sql="SELECT * FROM Jobs WHERE JobID = '".$j."'";
$job_result = mysqli_query($con,$job_sql);

  $job_rows = array();
  while($jr = mysqli_fetch_array($job_result,MYSQLI_ASSOC)) {
    $job_rows[] = $jr;
  }
  header('Content-Type: application/json');
  echo json_encode($job_rows);
  
}elseif ($r != null){ mysqli_select_db($con,"nichol29_application");
$result_sql="SELECT * FROM Results WHERE UserID = '".$r."'";
$result_result = mysqli_query($con,$result_sql);

  $result_rows = array();
  while($rr = mysqli_fetch_array($result_result,MYSQLI_ASSOC)) {
    $result_rows[] = $rr;
  }
  header('Content-Type: application/json');
  echo json_encode($result_rows);
}
mysqli_close($con);

?>