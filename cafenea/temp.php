<?php 

if(isset($_POST['verif-submit']))
{

require 'dbhorders.inc.php';
$number = $_POST['number'];

if(empty($number))
{
 header("Location: ../verif.php?error=emptyfield");
	exit();
}
else
{
$sql = "SELECT * FROM orders WHERE numberOrders=? ;";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location: ../verif.php?error=sqlerror");
	exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $number);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if($row=mysqli_fetch_assoc($result))
		{
          echo
                "<tr>
          <td>{$row['uidOrders']}</td>
          <td>{$row['totalTime']}</td>
        </tr>";
 
date_default_timezone_set('Europe/Bucharest');

$time_remaining=$row['temp']-time();

	if($time_remaining<=0)
	{
		echo "Time is up!";
	}
else
	echo round(abs($time_remaining) / 60, 2) . ' minutes to go ...';
        
     }
     else
     {
     	header("Location: ../verif.php?error=noorder");
		exit();
     }
           
     }
}
}
else
{
	 header("Location: ../verif.php");
	exit();
}


 ?>