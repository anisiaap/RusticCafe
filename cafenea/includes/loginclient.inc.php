
<?php

if(isset($_POST['login-submit']))
{

require 'dbh.inc.php';
$mailuid = $_POST['mailuid'];
$password = $_POST['pwd'];

if(empty($mailuid) || empty($password))
{
 header("Location: ../login.php?error=emptyfields");
	exit();
}
else
{
	$sql = "SELECT * FROM clients WHERE uidClients=? OR emailClients=?;";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location: ../login.php?error=sqlerror");
	exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if($row=mysqli_fetch_assoc($result))
		{
			
          $pwdCheck=password_verify($password, $row['pwdClients']);
          if($pwdCheck == false)
          {
           header("Location: ../loginclient.php?error=wrongPassword");
           exit();
          }
          else if($pwdCheck == true)
          {
           session_start();
           $_SESSION['id'] = $row['idClients'];
           $_SESSION['clientUid'] = $row['uidClients'];
           $_SESSION['email'] = $row['emailClients'];
           


           header("Location: ../index.php?login=Success");
           exit();
          }
          else
          {
          	 header("Location: ../loginclient.php?error=wrongPassword");
           exit();
          }
          
		}
		else
		{
			header("Location: ../loginclient.php?error=nouser");
	exit();
		}

	}
}
}
else
{
	 header("Location: ../loginclient.php");
	exit();
}