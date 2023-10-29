<?php 
if(isset($_POST['client-submit'])){

	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$code = $_POST['code'];
	$number = $_POST['number'];


if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($code) || empty($number))
{
  header("Location: ../clienti.php?error=emptyfields&uid=".$username."&email=".$email);
  exit();
}


else if (!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/", $username))
{
	
	header("Location: ../clienti.php?error=invalidmailandusername");
	exit();
}


else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
{
	 header("Location: ../clienti.php?error=invalidmail&uid=".$username);
  exit();
}

else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
{
	 header("Location: ../clienti.php?error=invalidusername&mail=".$email);
  exit();
}

else if($password !== $passwordRepeat)
{
 header("Location: ../clienti.php?error=passwordsdonotmatch&uid=".$username."&email=".$email);
  exit();
}
else if(!preg_match("/^[0][7][0-9]{8,8}$/", $number))
{
   header("Location: ../clienti.php?error=invalidnumber=".$email);
  exit();
}
else if((!preg_match("/^[0-9]{3,3}$/", $code)) && ((int)$code != 333 || (int)$code != 343) )
{
   header("Location: ../clienti.php?error=invalidcode=".$email);
  exit();
}

else
{
	$sql = "SELECT uidClients FROM clients WHERE uidCLients=?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location: ../clienti.php?error=sqlerror");
	exit();
	}

   else

   {

    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if($resultCheck > 0)
    {
   header("Location: ../clienti.php?error=usertaken&mail=".$email);
	exit();
    }
    else
    {
    	$sql="INSERT INTO clients (uidClients, emailClients, pwdClients, codeClients, numberClients) VALUES (?,?,?,?,?)";//folosire placeholder pt a nu copia doar continutul-nu e safe
    	$stmt=mysqli_stmt_init($conn);
    	if(!mysqli_stmt_prepare($stmt,$sql))
    	{
    		header("Location: ../clienti.php?error=sqlerror");
	       exit();
    	}
    	else
    	{
     
     $hashedpwd = password_hash($password,PASSWORD_DEFAULT);//encodare a parolei

    mysqli_stmt_bind_param($stmt,"sssss",$username,$email, $hashedpwd, $code, $number);
    mysqli_stmt_execute($stmt);
    header("Location: ../clienti.php?signup=success");
	exit();
    	}
    }

   }

}



mysqli_stmt_close($stmt);
mysqli_stmt_close($conn);



}

else
{
	 header("Location: ../clienti.php");
	exit();
}
