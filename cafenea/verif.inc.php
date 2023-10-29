

 <!DOCTYPE html>
<html>
	<head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="style.css">
	<body>


<main>
    <div>
        <section>
        	<p>
        	<ul class="temp_verif">
					<li>
						<a href="index.php" class="LinkButtons">Home</a>

                        <a href="verif.php"  class="LinkButtons">Verificati alta comanda</a>

					</li>
				</ul></p>

<p >
<?php 
if(isset($_POST['verif-submit']))
{

require 'includes/dbh.inc.php';
$number = $_POST['number'];

if(empty($number))
{
 header("Location:verif.php?error=emptyfield");
	exit();
}
else
{
$sql = "SELECT * FROM orders WHERE numberOrders=? ;";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location:verif.php?error=sqlerror");
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
          <td><p class='temp_verif'>{$row['uidOrders']}, </p></td>
          <td><i class='temp_verif'>Comanda dvs. pentru {$row['coffee']} </i> </td>
        </tr>";
 
date_default_timezone_set('Europe/Bucharest');

$time_remaining=$row['temp']-time();

	if(round(abs($time_remaining) / 60, 0)<1)
	{
		echo "<i class='temp_verif'><nobr>ar trebui sa ajunga in orice secunda !</nobr></i>";
		$id=$row['idOrders'];
		  $sql = "DELETE FROM orders WHERE idOrders=$id ;";

		if ($conn->query($sql) === TRUE) {
 		 echo "Record deleted successfully";
} else {
  		 echo "Error deleting record: " . $conn->error;
}

$conn->close();
	}
else
	{	echo "<i class='temp_verif'><nobr> va sosi in aproximativ  </nobr></i>";
		echo " <i class='temp_verif'>".round(abs($time_remaining) / 60, 0)."</i>";

		if(round(abs($time_remaining) / 60, 0)>=20)
		{
			echo " <i class='temp_verif'><nobr> de minute!</nobr></i>";
		}
		else if (round(abs($time_remaining) / 60, 0)<2 && round(abs($time_remaining) / 60, 0)>=1 ) {
			echo " <iv class='temp_verif'> minut!</i>";
		}
		else
		{
			echo " <iv class='temp_verif'> minute!</i>";
		}
	}
        
     }
     else
     {
     	header("Location: verif.php?error=noorder");
		exit();
     }
           
     }
}
}
else
{
	 header("Location: verif.php");
	exit();
}


 ?>
</p>
</section>
<img src="imagini/titlu2.jpg" width="99%" height=286px class="pozamanager">
</div>
</main>
</body>
</html>
