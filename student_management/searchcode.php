<?php
include 'db_connect.php';
$std_id=$_POST["std_id"];

$sql="SELECT * FROM product WHERE std_id='$std_id' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<tr>
                <td>{$row['std_id']}</td>
                <td>{$row['f_name']}</td>
                <td>{$row['l_name']}</td>
                <td>{$row['user_name']}</td>
                <td>{$row['email_id']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['std']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['e_year']}</td>
                <td><img src='uploads/{$row['image']}' width='50' height='50'></td>
               
              </tr>";
	}
	
}
else
{
	echo"No record Found ";
	
	
}
mysqli_close($conn);

?>
