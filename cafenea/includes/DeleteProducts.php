<?php
include 'dbh.inc.php';


if(isset($_GET['Del']))
	{
        $ProductID = $_GET['Del'];
        $query = $sql = "DELETE FROM produse where idProduse='" . $ProductID . "'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            header("Location: ../produse.php?delete=success");
        }
        else
        {
             header("Location: ../produse.php?error=sqlerror");
        }  

}
else
{
    header("Location: ../produse.php?error=notset");
}
?>