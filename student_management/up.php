<?php
include 'db_connect.php';
$std_id = $_POST['std_id'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$user_name = $_POST['user_name'];
$email_id = $_POST['email_id'];
$dob = $_POST['dob'];
$std = $_POST['std'];
$gender = $_POST['gender'];
$e_year = $_POST['e_year'];


$sql="UPDATE product SET  f_name='$f_name',l_name='$l_name',user_name='$user_name',email_id='$email_id',dob='$dob',std='$std'
,gender='$gender',e_year='$e_year' WHERE std_id='$std_id'";
if(mysqli_query($conn,$sql))
{
	$i=mysqli_affected_rows($conn);;
	echo"$i record updated";
}
else
{
	echo"error in Updating ".mysqli_error($conn);
}
mysqli_close($conn);
?>
