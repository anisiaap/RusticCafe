<?php session_start();?>

 <!DOCTYPE html>
<html>
	<head>
		<title>RusticCafe</title>
	</head>
	<link rel="stylesheet" href="style3.css">
	<body>


<main>
    <div>
        <section>
            <?php
            if(isset($_GET['error']))
            {
                if($_GET['error'] == "wrongPassword")
                {
                    echo '<p class="signuperror"> Wrong Password ! </p>';
                }
    
                else if($_GET['error'] == "nouser")
                {
                    echo '<p class="signuperror"> This user does not exist ! </p>';
                }
                else if($_GET['error'] == "emptyfields")
                {
                    echo '<p class="signuperror"> Empty fields ! </p>';
                }
                else if($_GET['error'] == "wrongCode")
                {
                    echo '<p class="signuperror"> The code is incorrect ! </p>';
                }
                
            }
        
            ?>

		<header>
			<nav>
             
				<ul class="HomeLoginList">
					<li>
						<a href="index.php" class="LinkButtons">Home</a>

                        <a href="signupclient.php"  class="LinkButtons">Signup</a>

					</li>
				</ul>
    <div class="login-box">
          <h2 class="title">Login Client</h2>
    	<form action="includes/loginclient.inc.php" method="post" class="loginform">
            <div style="text-align:center">
    <p >
        <div class="user-box">
    <input type="text" name="mailuid" placeholder="Username/E-mail...">
        </div>
    </p>
    <p>
        <div class="user-box">
    <input type="password" name="pwd" placeholder="Password...">
        </div>
    </p>
   
</div>
<div style="text-align:center">
    <p>
    <button class="glow-on-hover" type="submit" name="login-submit">Login</button>
    </p></div></div>

        	</form>
    </div>

			</nav>
		</header>

    
</section>
</div>
</main>
	</body>
	</html>