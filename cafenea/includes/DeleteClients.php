<?php
include 'dbh.inc.php';


if(isset($_GET['Del']))
	{
        $ClientID = $_GET['Del'];
        $query = $sql = "DELETE FROM clients where idClients='" . $ClientID . "'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            header("Location: ../clienti.php?delete=success");
        }
        else
        {
             header("Location: ../clienti.php?error=sqlerror");
        }  

}
else
{
    header("Location: ../clienti.php?error=notset");
}
?>