<?php 
session_start();
  echo '<form action="includes/logoutclient.inc.php" method="post">
    <button type="submit" name="logout-submit" class="logoutbutton">Logout</button>
    </form>';

   include("C:/Program Files/Xampp/htdocs/cafenea/includes/dbh.inc.php");
  include("C:/Program Files/Xampp/htdocs/cafenea/includes/Functions.php");

  if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['shopping_cart'] as $key => $value){
            if($value["item_id"] == $_GET['id']){
                unset($_SESSION['shopping_cart'][$key]);
                // echo "<script>alert('Produsul a fost sters!')</script>";
                // echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
  }


    //if($_SERVER['REQUEST_METHOD'] == "POST")
    //{
    if(isset($_POST['cart-submit'])){
        //something was posted
    $Nume = $_POST['Nume'];
    $Email = $_POST['Email'];
    $Telefon = $_POST['Telefon'];
    $Produse=" ";
    $total = 0;
    $timp = 0;
    
    if (isset($_SESSION['shopping_cart'])){
        $product_id = array_column($_SESSION['shopping_cart'], 'idProduse');
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $Produse = $Produse." ".$values['item_name'];
            $total = $total + (int)$values['item_price'];
            $timp = $timp + (int)$values['item_time'];    
        }
  
      }
    if(!empty($Nume) && !empty($Email) && !empty($Telefon) && (preg_match("/^[a-zA-Z- ]*$/", $Nume)) && (filter_var($Email,FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0][7][0-9]{8,8}$/", $Telefon)))
        {

            date_default_timezone_set('Europe/Bucharest');
            $val=time()+60*(int)$time;
            $temp="$val";
        $sql="INSERT INTO orders (uidOrders, emailOrders,coffee,numberOrders,totalTime,temp,sumaOrders) VALUES (?,?,?,?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: cart.php?error=sqlerror");
           exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"sssssss",$Nume,$Email,$Produse,$Telefon,$timp,$temp,$total);
            mysqli_stmt_execute($stmt);
            foreach ($_SESSION['shopping_cart'] as $key => $value)
            unset($_SESSION['shopping_cart'][$key]);
            header("Location: cart.php?order=success");
            mysqli_stmt_close($stmt);
            mysqli_stmt_close($conn);


        }
           
    }else
    {
        header("Location: cart.php?error=invalidtype");
        exit();
    }
}
//}

    
    


  // if (isset($_POST['add'])){

  //       $ok=1;
  //       foreach ($_SESSION['shopping_cart'] as $key => $value){
  //           if($value["item_id"] == $_GET['id']){
  //               $ok=0;
  //                  echo "<script>alert('Cantitatea maxim disponibila!')</script>";
  //                   echo "<script>window.location = 'Cos.php'</script>";
  //               }
  //               else{
                    
  //                   if($ok){
  //                   $_SESSION["shopping_cart"][$key]=array(
  //                       'item_id'        => $value["item_id"],
  //                       'item_name'      => $value["item_name"],
  //                       'item_price'     => $value["item_price"],
  //                       'item_time'     => $_POST["hidden_time"],
  //                       'item_img'       => $value["item_img"]
  //                   );
  //               }
  //               } 
  //               }
  //           }
      
    
?>
<!DOCTYPE html>
<html style="height: 1000;">

    <head>
        <title>RusticCafe</title>
        <meta charset="UTF-8 ">
    </head>
    <link rel="stylesheet" href="style6.css">
    <body>

        

  <div style="text-align: center">
    <img src="imagini/titlu2.jpg" width="90%" height=286px class="pozamanager">

    <a href="index.php" target="_top">
       <button  class="comenzi">Home</button>  
    </a>

    

<section>
            <?php
           

            if(isset($_GET['error']))
            {
               
                 if($_GET['error'] == "invalidtype")
                {
                    echo '<p class="signuperror"> Tip invalid ! </p>';
                }
            }

            if(isset($_GET['order']))
            {
               
                 if($_GET['order'] == "success")
                {
                    echo '<p class="signuperror"> Done ✔ </p>';
                }
            }



            ?>


<div class="login-box">
          <h2>
            <p>Plasare Comanda</p>
          </h2>
          <h3>
            <p>Va rugam introduceti datele!</p>
          </h3>
      <form method="POST" >
            <div style="text-align:center">
    <p >
        <div class="user-box">
    <input type="text" name="Nume" placeholder="Nume...">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="Email" placeholder="E-mail">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="Telefon" placeholder="Nr. de telefon">
        </div>
    </p>
    
     
   <!--  <div style="text-align:center">
    <p>
    <input class="buttons" type="submit" value="Comanda">
    </p></div></div> -->

    </div>
    <div style="text-align:center">
    <p>
    <button class="buttons" type="submit" name="cart-submit">Submit</button>
    </p></div></div>
    
      </form>
   
      </div>
</section>

<table class="table" >
        <thread>
            <tr>
    
                <th bgcolor="#4d3319"><strong>Denumire</strong></th>
                <th bgcolor="#4d3319"><strong>Pret</strong></th>
                <th bgcolor="#4d3319"><strong>Poza</strong></th>
                <th bgcolor="#4d3319"><strong>Action</strong></th>
            </tr>
        </thread>

        <tbody>
            
            <?php

                if (isset($_SESSION['shopping_cart'])){
                        $sum=0;
                        $product_id = array_column($_SESSION['shopping_cart'], 'idProduct');
                        foreach($_SESSION["shopping_cart"] as $keys => $values){
                            $res = $values["item_img"];
                            //$valoare = $values['item_id'];
                            $sum=$sum+$values['item_price'];
            ?>
                <tr>
                    <td><strong><?php echo $values['item_name'];?></strong></td>
                    <td><strong><?php echo $values['item_price'];?></strong></td>
                    <td><img src="./uploads/<?php echo $res;?>" height="125px" width="125px"/></td>
                    <form action="cart.php?action=remove&id=<?php echo $values['item_id'];?>" method="POST">
                    <td width="100px">
                        <input type="submit" class="del" name="remove" value="Stergere">
                    </td>
                    </form>
                </tr>
                <?php
               
                }
                 echo "<td><strong>Totalul este :$sum de lei</strong></td>";
            }else{
                echo "<td>Cart is Empty!</td>";
            }
                ?>
            
        </tbody>
        
    </table>

</div>


    </body>
</html>