<?php
  include("C:/Program Files/Xampp/htdocs/cafenea/includes/dbh.inc.php");
  include("C:/Program Files/Xampp/htdocs/cafenea/includes/Functions.php");
session_start();
$user_data=check_login($conn);
$tip= "arometari";
$products_data = getProducts($conn,$tip);


if(isset($_POST["add_to_cart"]))
{
  $one=1;

   if(isset($_SESSION["shopping_cart"]))
  {
         $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
         if(!in_array($_POST["hidden_idProduct"], $item_array_id))
         {
              $count = count($_SESSION["shopping_cart"]);
              $item_array = array(
                'item_id'        => $_POST["hidden_idProduct"],
                'item_name'      => $_POST["hidden_name"],
                'item_price'     => $_POST["hidden_price"],
                'item_time'     => $_POST["hidden_time"],
                'item_img'       => $_POST["hidden_img"]
      
              );
              $_SESSION["shopping_cart"][$count] = $item_array;

         }
         else{
              echo '<script type="text/javascript">alert("Produsul a fost adaugat deja in cos!");window.location=\'arometari.php\';</script>';

            }
  }
  else{
    $item_array = array(
          'item_id'        => $_POST["hidden_idProduct"],
          'item_name'      => $_POST["hidden_name"],
          'item_price'     => $_POST["hidden_price"],
          'item_time'     => $_POST["hidden_time"],
          'item_img'       => $_POST["hidden_img"],

        );
    $_SESSION["shopping_cart"][0]=$item_array;   
  }
}
header("Location: ../meniu.php?adaugareprodus=success");

?>