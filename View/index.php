<!-- View/index.php -->


<?php
session_start(); 

?>

<div class=" container">
<div class= "row">


	<!-- A bouclé -->
	
	
	
	<?php foreach($product as $product){ ?>

		<div class="col-md-3 bloc-cartel">
			<div class="bloc_img">
				<img src="Assets/images/<?php echo $product['img']?>" alt="batiment" class="img_batiment"> 
			</div>
			<h2><?php echo $product['name']?> </h2>
			<p><?php echo $product['prix']?> €</p>
		</div>
	<?php } ?>

	
	
	<!-- -->
	
	
</div></div>