<?php 
if(isset($_POST['order-submit'])){

	require 'dbh.inc.php';

	$name = $_POST['uid'];
	$email = $_POST['mail'];
  $coffee = $_POST['coffee'];
	$number = $_POST['nmb'];
	$time = $_POST['time'];
    $suma = $_POST['suma'];
  $temp = $_POST['temp'];



if(empty($name) || empty($email) || empty($number) || empty($time) || empty($coffee))
{
  header("Location: ../manager.php?error=emptyfields&uid=".$name."&email=".$email);
  exit();
}


else if (!preg_match("/^[a-zA-Z- ]*$/", $name))
{
	 header("Location: ../manager.php?error=invalidname=".$email);
  exit();
}

else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
{
   header("Location: ../manager.php?error=invalidmail&uid=".$name);
  exit();
}

else if(!preg_match("/^[0][7][0-9]{8,8}$/", $number))
{
   header("Location: ../manager.php?error=invalidnumber=".$email);
  exit();
}

else if(!preg_match("/^[0-9]{1,3}$/", $time))
{
   header("Location: ../manager.php?error=invalidtime=".$email);
  exit();
}
else if(!preg_match("/^[0-9]{1,3}$/", $suma))
{
   header("Location: ../manager.php?error=invalidsum=".$email);
  exit();
}
else if (!preg_match("/^[a-zA-Z- ]*$/", $coffee))
{
     header("Location: ../manager.php?error=invalidcoffee=".$coffee);
  exit();
}
else
{
  date_default_timezone_set('Europe/Bucharest');
 $val=time()+60*(int)$time;
  $temp="$val";
	$sql = "SELECT uidOrders FROM orders WHERE uidOrders=?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location: ../manager.php?error=sqlerror");
	exit();
	}

    else
    {
    	$sql="INSERT INTO orders (uidOrders, emailOrders,coffee,numberOrders,totalTime,temp,sumaOrders) VALUES (?,?,?,?,?,?,?)";
    	$stmt=mysqli_stmt_init($conn);
    	if(!mysqli_stmt_prepare($stmt,$sql))
    	{
    		header("Location: ../manager.php?error=sqlerror");
	       exit();
    	}
    	else
    	{
    mysqli_stmt_bind_param($stmt,"sssssss",$name,$email,$coffee,$number,$time,$temp,$suma);
    mysqli_stmt_execute($stmt);

$to=$email;

$msg = "$name,\nComanda dvs. a fost inregistrata!\nTimpul de asteptare pentru $coffee este de $time min !\nVa multumim!";

    header("Location: ../manager.php?order=success");


mysqli_stmt_close($stmt);
mysqli_stmt_close($conn);


    	}
    }

}



mysqli_stmt_close($stmt);
mysqli_stmt_close($conn);



}

else
{
	 header("Location: ../manager.php");
	exit();
}
