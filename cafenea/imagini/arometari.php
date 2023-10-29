<?php
  include("C:/Program Files/Xampp/htdocs/cafenea/includes/dbh.inc.php");
  include("C:/Program Files/Xampp/htdocs/cafenea/includes/Functions.php");
session_start();
$user_data=check_login($conn);
$tip= "arometari";
$products_data = getProducts($conn,$tip);





?>
<!DOCTYPE html>
<html>
 <head>
    <title>RusticCafe</title>
    <meta charset="UTF-8 ">
  </head>
  <link rel="stylesheet" href="style8.css">
  <body>

     <div class="rowa" >

<?php
    if ($products_data->num_rows > 0) {
        // output data of each row
        while($row = $products_data->fetch_assoc()) {

          $res = $row["pozaProduse"];
          //$Id = $row["idProduse"];
      ?>


      <div class="col" style="text-align: center;">
      
      <img src="./uploads/<?php echo $res;?>" style="width:100%">
     
        <h1 style='color:#ffcc66'><?php echo $row['uidProduse'];?></h1>
          <article style='color:#ffcc66'>
               <?php echo $row['descriereProduse'];?>
          </article>
          <p style='color:#ffcc66'>Pret: <?php echo $row['pretProduse'];?> lei</p>
          <?php if(!isset($_SESSION['clientUid'])){  ?>
            <p><a href="./loginclient.php" class="buttons" target="_top">Adauga in cos</a></p>
          <?php
          }
            else{ 
          
                
                 echo'
                    <form method="POST" action="./includes/add.php?action=add&id='.$row["idProduse"].'">
                    <input type="hidden" name="hidden_name" value="'.$row["uidProduse"].'" />
                    <input type="hidden" name="hidden_price" value="'.$row["pretProduse"].'" />
                    <input type="hidden" name="hidden_time" value="'.$row["timpProduse"].'" />
                    <input type="hidden" name="hidden_idProduct" value="'.$row["idProduse"].'" />
                    <input type="hidden" name="hidden_img" value="'.$res.'" /> 
                    <input type="submit" name="add_to_cart" class="buttons" value="Adauga in cos"/>
                 </form> 
                 ';
        
            }
        ?>

      </div> 

      
      <?php
        }
      }
      else{
      echo ' <h1> Nu exista produse de acest tip! </h1> ';
    }
?>

 </div>


</body>
</html>















