<!-- View/layout.php -->
<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--Base-->
        <title>Paris Store</title>
		<link rel="icon" type="image/x-icon" href="Assets/images/favicon.png" />
		
		<!--Meta-->
		<meta charset="UTF-8" />
		<meta name="keywords" content="boutique, monument, paris">
		<meta name="description" content="achat batiment de paris">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!--Link-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="Assets/css/css.css">
		
		<!--Script JS-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        
    </head>
    <body class="container-fluid">
		
		<header id="navigation">		
			<nav class="navbar navbar-toggleable-sm navbar-inverse row ">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
		
				<a class="navbar-brand" href="#" ><h1>Paris Store</h1></a>
		

				<div class="menu justify-content-end collapse navbar-collapse" id="navbarColor01">
					<ul>
						<li>
							<ul class="menu-connection navbar-nav mr-auto justify-content-end">
							
								<?php  if(!isset($_SESSION["user"])){ ?>
									<li class="nav-item active">
										<a href="index.php?ctrl=user&action=login">Connexion</a> 
									</li>
									<li class="nav-item"> | </li>
									<li class="nav-item">
										<a href="index.php?ctrl=user&action=create">S'inscrire</a>
									</li>
								<?php 
								} else{ 
								?>	
									<li class="nav-item active">
										<?php echo $_SESSION['user']->getFirstName()." ".$_SESSION['user']->getLastName()." | "; ?>
									</li>
									<li class="nav-item"> | </li>
									<li class="nav-item">
										<a href='index.php?ctrl=user&action=doLogout'>Se déconnecter</a>
									</li>
								<?php }?>
							</ul>
						</li>
						<li>
							<ul class="menu-lien navbar-nav justify-content-end">
								<li class="nav-item active">
									<a class="nav-link" href="#">Accueil</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Produit</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Panier</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		
		<div id="content">
			<?php
			if(isset($page)){
				require("./View/".$page.".php");
			}
			?>
		</div>


		<div class="row">
			<div id="message" class="mx-auto">
				<?php
					if(!isset($_SESSION["user"])){
						if(isset($info)){
							print("<div class='alert alert-$info[1]'><strong>$info[0]</div>");
						}
					}
				?>
				
			</div>
		</div>
