<?session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="style2.css">
	<body>

		
		<form  action="meniu.php" method="post">

	<div class="multi-button">

  <button type="about"  name="about">Despre Noi</button>

  <button type="arometari"  name="arometari">Arome Tari</button>

  <button type="decaf" name="decaf">Decofeinizata</button>

  <button type="sucuri"  name="sucuri">Sucuri</button>

  <button type="edlim"  name="edlim">Editie Limitata</button>

  <button type="prajituri" name="prajituri">Prajituri</button>

  <button type="blender"  name="blender">Blender</button>

  
   </div>

</form>

<?php 

if(isset($_POST['arometari'])){
	include 'imagini/arometari.php';}
else if(isset($_POST['decaf'])){
	include 'imagini/decaf.php';
}

else if(isset($_POST['sucuri'])){
	include 'imagini/sucuri.php';
}

else if(isset($_POST['edlim'])){
	include 'imagini/edlim.php';
}
else if(isset($_POST['prajituri'])){
	include 'imagini/prajituri.php';
}
else if(isset($_POST['blender'])){
	include 'imagini/blender.php';
}
else if(isset($_POST['about'])){
	include 'default.php';
}
else{
	include 'default.php';}

?>


</body>
</html>