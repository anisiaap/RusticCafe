<!DOCTYPE html>
<html>
	<head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="../style8.css">
	<body>
		<div class="row">

  <div class="column">
    <img src="americana.jpg" alt="Nitro Cold Brew" title="Nitro Cold Brew" style="width:80%">
</div>
<div class="column">
	<h1 style='color:#ffcc66'>Cafea Americana</h1>
	<article style='color:#ffcc66'>
		Shot-urile espresso acoperite cu apă fierbinte creează un strat ușor de cremă care culminează în această ceașcă minunat de bogată, cu adâncime și nuanțe. 
	</article>
	<p style='color:#ffcc66'>Pret: 11 lei</p>
	<div style="text-align:left">
		<form  action="../meniu.php" method="post">
    <p>	
    <button class="buttons" type="arometari" name="arometari">Back</button>
    </p></div>
    </form>
    <?php if(!isset($_SESSION['clientUid'])){  ?>
      <p><a href="../loginclient.php" class="buttons" target="_top">Adauga in cos</a></p>
       <?php
       }
        else{
            if(check_if_added_to_cart(1)){
            	echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
            }else{
        ?>
           <a href="cart_add.php?id=1" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
           <?php
                	}
           	}
           ?>
</div>

  </div>
	</body>
	</html>