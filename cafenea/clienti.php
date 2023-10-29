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
					echo '<p class="signuperror"> Fill in all fields! </p>';
				}
				 else if($_GET['error'] == "invalidcode")
                {
                    echo '<p class="signuperror"> The code is incorrect ! </p>';
                }
                 else if($_GET['error'] == "invalidnumber")
                {
                    echo '<p class="signuperror"> The number is incorrect ! </p>';
                }
				else if($_GET['error'] == "invalidmailandusername")
				{
					echo '<p class="signuperror"> Invalid Username and E-mail! </p>';
				}

				else if($_GET['error'] == "invalidusername")
				{
					echo '<p class="signuperror"> Invalid Username! </p>';
				}

				else if($_GET['error'] == "invalidmail")
				{
					echo '<p class="signuperror"> Invalid E-mail! </p>';
				}


				else if($_GET['error'] == "passwordsdonotmatch")
				{
					echo '<p class="signuperror"> Passwords do not match! </p>';
				}

				else if($_GET['error'] == "sqlerror")
				{
					echo '<p class="signuperror">SQL Error!</p>';
				}

				else if($_GET['error'] == "usertaken")
				{
					echo '<p class="signuperror"> User Taken! </p>';
				}
				}
				if(isset($_GET['signup']))
				{
				if($_GET['signup'] == "success")
				{
					echo '<p class="signuperror"> Success! </p>';
				}}
			
			?>


<div class="login-box">
          <h2>
            <p>Home Manager</p>
          </h2>
          <h3>
            <p>Adauga Client Nou</p>
          </h3>
      <form action="includes/clienti.inc.php" method="post">
            <div style="text-align:center">
    <p >
        <div class="user-box">
    <input type="text" name="uid" placeholder="Username...">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="mail" placeholder="e-mail">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="pwd" placeholder="Password">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="pwd-repeat" placeholder="Repet password">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text"s name="code" placeholder="Code">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="text" name="number" placeholder="Phone Number [ 07XX XXX XXX ]">
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
                <th bgcolor="#4d3319"><strong>Username</strong></th>
                <th bgcolor="#4d3319"><strong>E-mail</strong></th>
                <th bgcolor="#4d3319"><strong>Code</strong></th>
                <th bgcolor="#4d3319"><strong>Nr. de telefon</strong></th>
            </tr>
        </thread>

        <tbody>
            
            <?php

                $nr=0;
                include("includes/dbh.inc.php");
                $sel="SELECT * FROM clients";
                $query=$conn->query($sel);
                while ($row=$query->fetch_assoc()) {

                    $nr++;
            ?>
                <tr>
                    <td><strong><?php echo $nr;?></strong></td>
                    <td><strong><?php echo $row['uidClients'];?></strong></td>
                    <td><strong><?php echo $row['emailClients'];?></strong></td>
                    <td><strong><?php echo $row['codeClients'];?></strong></td>
                    <td><strong><?php echo $row['numberClients'];?></strong></td>
                    <td><strong>
                        <a href="includes/DeleteClients.php?Del=<?php echo $row['idClients'];?>" class="stergere">Stergere</a>
                        <a href="modifyclients.php" target="_top">
                            <button class="buttons" type="submit" name="signup-submit">Modificare Date</button>
                        </a>
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