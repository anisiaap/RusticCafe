<!DOCTYPE html>
<html>
	<head>
		<title>RusticCafe</title>
		<meta charset="UTF-8 ">
	</head>
	<link rel="stylesheet" href="style5.css">
	<body>
<main>
	<div>
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
			<nav>
			<div style="text-align:center">

                <ul class="HomeSignupList">
					<li>

						 <a href="loginclient.php" class="LinkButtons">Login</a>


						<a href="index.php" class="LinkButtons">Home</a>


					</li>
				</ul>
			</div>



			<div class="login-boxclient">
          <h2 class="title">Modificare Date Client</h2>
    	<form action="includes/modificareClient.inc.php" method="post">
            <div style="text-align:center">
    <p >
        <div class="user-box">
    <input type="text" name="uid" placeholder="name">
        </div>
        <p >
        <div class="user-box">
    <input type="text" name="mail" placeholder="e-mail">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="password" name="pwd" placeholder="Password...">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="password" name="pwd-repeat" placeholder="Repeat password">
        </div>
    </p>
    
</div>
<div style="text-align:center">
    <p>
    <button class="buttons" type="submit" name="signup-submit">Modifica Date</button>
    </p></div></div>

        	</form>
    </div>


			</nav>
		</section>
	</div>
</main>
</body>
</html>
