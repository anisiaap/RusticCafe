<?php session_start();?>
 <!DOCTYPE html>
<html>
	
  <head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="style3.css">
	<body>
<section>

  <ul class="verifback">
          <li>
            <a href="index.php" class="LinkButtons">Home</a>
          </li>
        </ul>
            <?php
            if(isset($_GET['error']))
            {
                if($_GET['error'] == "emptyfield")
                {
                    echo '<p class="signuperror"> Empty Field ! </p>';
                }
                else if($_GET['error'] == "noorder")
                {
                    echo '<p class="signuperror"> This order does not exist ! </p>';
                }
            }

            ?>

          </section>

<main>
    


<div class="login-box">
          <h2 class="title">Verificare Comanda</h2>
      <form action="verif.inc.php" method="post">
            <div style="text-align:center">
    <p >
        <div class="user-box">
    <input type="text" name="number" placeholder="Phone number...">
        </div>
    </p>
</div>
<?php if(!isset($_SESSION['clientUid']) && !isset($_SESSION['userUid'])){  ?>

    <div style="text-align:center">
    <h2 class="title">Nu sunteti conectat !</h2>
    <a href="choice.php" target="_top">
        <h2 class="title">Logare</h2>
</a>

</div>
<?php
    }
    else {?>

<div style="text-align:center">
    <p>
    <button class="buttons" type="submit" name="verif-submit">Verificare</button>
    </p></div>
     <?php
    }
  ?>
</div>

          </form>
    </div>



</main>

	</body>
	</html>
