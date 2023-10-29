
<?php
// Include the database configuration file
include 'dbh.inc.php';
$statusMsg = '';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $idClient = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
  
    if(!empty($email) || !empty($password) || !empty($passwordRepeat))
          {
                    $query = "UPDATE clients SET  emailClients='$email', pwdClients='$password' WHERE uidClients='$idClient'";
            
                if(mysqli_query($conn, $query)){
                    echo '<script type="text/javascript">
                    window.onload = function () { alert("Produs editat cu succes!"); }
                    </script>';
                    header("Location: ../clienti.php");
                }
                else {
                     echo "Bad";
                     echo $idClient;
                }
            }

}
?>