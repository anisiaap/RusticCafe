<?php
include("dbh.inc.php");

function check_login($conn)
{

	if(isset($_SESSION['clientUid']))
	{

		$ID = $_SESSION['clientUid'];
		$query = "select * from clients where uidClients = '$ID' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}



}

function getProducts($conn,$tip){
	$product_query = mysqli_query($conn,"SELECT * FROM produse WHERE tipProduse LIKE '%$tip%'");
	return $product_query;
}


