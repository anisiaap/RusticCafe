<?php 
session_start();
  echo '<form action="includes/logout.inc.php" method="post">
    <button type="submit" name="logout-submit" class="logoutbutton">Logout</button>
    </form>';
?>
<!DOCTYPE html>
<html style="height: 1500;">

	<head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="style6.css">
	<body>

		

  <div style="text-align: center">
  	<img src="imagini/titlu2.jpg" width="90%" height=286px class="pozamanager">

    <a href="manager.php" target="_top">
       <button  class="comenzi">Adaugare Comenzi</button>  
    </a>

    

<section>
            <?php
            if(isset($_GET['error']))
            {
               
                 if($_GET['error'] == "emptyfields")
                {
                    echo '<p class="signuperror"> Empty fields ! </p>';
                }
            }

            if(isset($_GET['error']))
            {
               
                 if($_GET['error'] == "invalidtype")
                {
                    echo '<p class="signuperror"> Tip invalid ! Introduceti:arometari,decaf,sucuri,edlim,prajituri sau blender.';
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


<div class="product-box">
          <h2>
            <p>Home Manager</p>
          </h2>
          <h3>
            <p>Produs nou</p>
          </h3>
      <form action="includes/products.inc.php" method="POST" enctype="multipart/form-data">
            <div style="text-align:center">
    <p >
        <div class="user-box">
    <input type="text" name="uid" placeholder="Denumire...">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="pret" placeholder="Pret">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="timp" placeholder="Timp">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="tip" placeholder="Tip">
        </div>
    </p>
     
     <p>
        <div class="user-box">
    <input type="file" name="file">
        </div>
    </p>
     

    <div class="user-box">
            
     <textarea class="ckeditor" name="descriere" rows=4 cols=45>Introduceti descrierea produsului</textarea>
            
    </div>
    <div style="text-align:center">
    <p>
    <button class="buttons" type="submit" name="products-submit">Submit</button>
    </p></div></div>
    
      </form>
   
      </div>
</section>

<table class="table" >
        <thread>
            <tr>
                <th bgcolor="#4d3319"><strong>Nr.</strong></th>
                <th bgcolor="#4d3319"><strong>Denumire</strong></th>
                <th bgcolor="#4d3319"><strong>Pret</strong></th>
                <th bgcolor="#4d3319"><strong>Timp</strong></th>
                <th bgcolor="#4d3319"><strong>Tipul</strong></th>
                <th bgcolor="#4d3319"><strong>Poza</strong></th>
                <th bgcolor="#4d3319"><strong>Action</strong></th>
            </tr>
        </thread>

        <tbody>
            
            <?php

                $nr=0;
                include("includes/dbh.inc.php");
                $sel="SELECT * FROM produse";
                $query=$conn->query($sel);
                while ($row=$query->fetch_assoc()) {

                    $nr++;
                    $res = $row["pozaProduse"];
            ?>
                <tr>
                    <td><strong><?php echo $nr;?></strong></td>
                    <td><strong><?php echo $row['uidProduse'];?></strong></td>
                    <td><strong><?php echo $row['pretProduse'];?></strong></td>
                    <td><strong><?php echo $row['timpProduse'];?></strong></td>
                    <td><strong><?php echo $row['tipProduse'];?></strong></td>
                    <td><img src="./uploads/<?php echo $res;?>" height="125px" width="125px"/></td>
                    <td><strong>
                        <a href="includes/DeleteProducts.php?Del=<?php echo $row['idProduse'];?>" class="stergere">Stergere</a>
                    </strong></td>
                </tr>
                <?php
                }
                ?>
        </tbody>
        
    </table>

</div>

<script src="ckeditor/ckeditor.js"></script>

	</body>
</html>