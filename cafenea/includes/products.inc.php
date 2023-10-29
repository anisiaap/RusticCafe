<?php 
if(isset($_POST['products-submit'])){

	require 'dbh.inc.php';

	$name = $_POST['uid'];
	$pret = $_POST['pret'];
    $timp = $_POST['timp'];
	$descriere = $_POST['descriere'];
    $tip = $_POST['tip'];

    $targetDir = "../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');



if(empty($name) || empty($pret) || empty($timp) || empty($descriere) || empty($tip))
{
  header("Location: ../produse.php?error=emptyfields&uid=".$name);
  exit();
}


else if (!preg_match("/^[a-zA-Z- ]*$/", $name))
{
	 header("Location: ../produse.php?error=invalidname=".$pret);
  exit();
}


else if(!preg_match("/^[0-9]{1,2}$/", $pret))
{
   header("Location: ../produse.php?error=invalidprice=".$name);
  exit();
}

else if(!preg_match("/^[0-9]{1,3}$/", $timp))
{
   header("Location: ../produse.php?error=invalidtime=".$name);
  exit();
}
else if ((!preg_match("/^[a-zA-Z]*$/", $tip)) && (($tip!= 'arometari') || ($tip!= 'decaf') || ($tip!= 'sucuri') || ($tip!= 'edlim') || ($tip!= 'prajituri') || ($tip!= 'blender') ))
{
     header("Location: ../produse.php?error=invalidtype=".$name);
  exit();
}
else if(empty($_FILES["file"]["name"]))
{
    header("Location: ../produse.php?error=empty=".$name);
    exit();
}
// else  if(in_array($fileType, $allowTypes,FALSE))
// {
//     header("Location: ../produse.php?error=wrongformatfile=".$name);
//     exit();
// }
else  if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath) == FALSE)
{
    header("Location: ../produse.php?error=updatefileerror=".$name);
    exit();
}
    
else
{
    
	$sql = "SELECT uidProduse FROM produse WHERE uidProduse=?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location: ../produse.php?error=sqlerror");
	exit();
	}

   else
   {
    	$sql="INSERT INTO produse (uidProduse, pretProduse,timpProduse,descriereProduse,tipProduse,pozaProduse) VALUES (?,?,?,?,?,?)";
    	$stmt=mysqli_stmt_init($conn);
    	if(!mysqli_stmt_prepare($stmt,$sql))
    	{
    		header("Location: ../produse.php?error=sqlerror");
	       exit();
    	}
    	else
    	{
    mysqli_stmt_bind_param($stmt,"ssssss",$name,$pret,$timp,$descriere,$tip,$fileName);
    mysqli_stmt_execute($stmt);


    header("Location: ../produse.php?adaugareprodus=success");



mysqli_stmt_close($stmt);
mysqli_stmt_close($conn);


    	}
     }
}



//mysqli_stmt_close($stmt);
//smysqli_stmt_close($conn);



}

else
{
	 header("Location: ../manager.php");
	exit();
}
