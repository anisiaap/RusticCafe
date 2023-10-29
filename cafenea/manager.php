<?php 
session_start();
  echo '<form action="includes/logout.inc.php" method="post">
    <button type="submit" name="logout-submit" class="logoutbutton">Logout</button>
    </form>';
?>
<!DOCTYPE html>
<html>

	<head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="style6.css">
	<body>

		

  <div style="text-align: center">
  	<img src="imagini/titlu2.jpg" width="90%" height=286px class="pozamanager">


    <a href="produse.php" target="_top">
       <button  class="produse">Produse</button>  
    </a>

    <a href="verif.php" target="_top">
       <button  class="verif">Verificare Comanda</button>  
    </a>
    
    <a href="clienti.php" target="_top">
       <button  class="clienti">Lista Clienti</button>  
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
            <p>Home Manager</p>
          </h2>
          <h3>
            <p>Comanda noua</p>
          </h3>
      <form action="includes/orders.inc.php" method="post">
            <div style="text-align:center">
    <p >
        <div class="user-box">
    <input type="text" name="uid" placeholder="Name...">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="mail" placeholder="e-mail">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="coffee" placeholder="Coffee">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="nmb" placeholder="Phone Number [ 07XX XXX XXX ]">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text"s name="time" placeholder="Time">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="suma" placeholder="Suma">
        </div>
    </p>
</div>
<div style="text-align:center">
    <p>
    <button class="buttons" type="submit" name="client-submit">Submit</button>
    </p></div></div>

      </form>
    </div>

</section>

    <table class="table" >
        <thread>
            <tr>
                <th bgcolor="#4d3319"><strong>Nr.</strong></th>
                <th bgcolor="#4d3319"><strong>Nume</strong></th>
                <th bgcolor="#4d3319"><strong>E-mail</strong></th>
                <th bgcolor="#4d3319"><strong>Cafea</strong></th>
                <th bgcolor="#4d3319"><strong>Nr. de telefon</strong></th>
                <th bgcolor="#4d3319"><strong>Timp</strong></th>
                <th bgcolor="#4d3319"><strong>Action</strong></th>
            </tr>
        </thread>

        <tbody>
            
            <?php

                $nr=0;
                include("includes/dbh.inc.php");
                $sel="SELECT * FROM orders";
                $query=$conn->query($sel);
                while ($row=$query->fetch_assoc()) {

                    $nr++;
            ?>
                <tr>
                    <td><strong><?php echo $nr;?></strong></td>
                    <td><strong><?php echo $row['uidOrders'];?></strong></td>
                    <td><strong><?php echo $row['emailOrders'];?></strong></td>
                    <td><strong><?php echo $row['coffee'];?></strong></td>
                    <td><strong><?php echo $row['numberOrders'];?></strong></td>
                    <td><strong><?php echo $row['totalTime'];?></strong></td>
                    <td><strong>
                        <a href="includes/Delete.php?Del=<?php echo $row['idOrders'];?>" class="stergere">Stergere</a>
                    </strong></td>
                </tr>
                <?php
                }
                ?>
        </tbody>
        
    </table>

</div>


	</body>
</html>