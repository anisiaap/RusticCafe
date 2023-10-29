<?php 
session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="style8.css">
	<body>

  <div class="titleimg">
  	<img src="imagini/titlu2.jpg" width="100%" height=305px class="poza">
 <?php if(!isset($_SESSION['clientUid'])){  ?>
<p class="login" ><a href="choice.php" target="_top">
  <span style='color:#ffcc66'>L</span>
  <span style='color:#ffcc66'>o</span>
  <span style='color:#ffcc66'>g</span>
  <span style='color:#ffcc66'>a</span>
  <span style='color:#ffcc66'>r</span>
  <span style='color:#ffcc66'>e</span>
</a>
</p>
<?php 
    }
  else if(isset($_SESSION['clientUid']) || isset($_SESSION['userUid'])){?>

    <form action="includes/logoutclient.inc.php" method="post" target="_top">
    <button type="submit" name="logout-submit" class="logoutbutton">Logout</button>
    </form>

    <p class="login" ><a href="cart.php" target="_top">
  <span style='color:#ffcc66'>C</span>
  <span style='color:#ffcc66'>a</span>
  <span style='color:#ffcc66'>r</span>
  <span style='color:#ffcc66'>t</span>
</a>
</p>


  <?php
    }
  ?>


<p class="verif"><a href="verif.php" target="_top">
  <span style='color:#ffcc66'>V</span>
  <span style='color:#ffcc66'>i</span>
  <span style='color:#ffcc66'>z</span>
  <span style='color:#ffcc66'>u</span>
  <span style='color:#ffcc66'>a</span>
  <span style='color:#ffcc66'>l</span>
  <span style='color:#ffcc66'>i</span>
  <span style='color:#ffcc66'>z</span>
  <span style='color:#ffcc66'>a</span>
  <span style='color:#ffcc66'>r</span>
  <span style='color:#ffcc66'>e</span>
  <span style='color:#ffcc66'>_</span>
  <span style='color:#ffcc66'>C</span>
  <span style='color:#ffcc66'>o</span>
  <span style='color:#ffcc66'>m</span>
  <span style='color:#ffcc66'>a</span>
  <span style='color:#ffcc66'>n</span>
  <span style='color:#ffcc66'>d</span>
  <span style='color:#ffcc66'>a</span>



</a></p>

  	<p class="title">
  <span style='color:#ffcc66'>R</span>
  <span style='color:#ffcc66'>u</span>
  <span style='color:#ffcc66'>s</span>
  <span style='color:#ffcc66'>t</span>
  <span style='color:#ffcc66'>i</span>
  <span style='color:#ffcc66'>c</span>
  <span style='color:#ffcc66'>-</span>
  <span style='color:#ffcc66'>C</span>
  <span style='color:#ffcc66'>a</span>
  <span style='color:#ffcc66'>f</span>
  <span style='color:#ffcc66'>e</span>
 
 
  
</p>


</div>


	</body>
</html>