<?php
include 'dbh.inc.php';


if(isset($_GET['Del']))
	{
        $OrderID = $_GET['Del'];
        $query = $sql = "DELETE FROM orders where idOrders='" . $OrderID . "'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            header("Location: ../manager.php?delete=success");
        }
        else
        {
             header("Location: ../manager.php?error=sqlerror");
        }  

}
else
{
    header("Location: ../manager.php?error=notset");
}
?>