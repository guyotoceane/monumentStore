<!-- View/tag.php -->
<?php
//session_start();
?>
<div class=" container">
<div class= "row">

	<?php foreach($product as $product){ ?>

			<a class="col-md-3 bloc-cartel" href="index.php?ctrl=product&action=product&id=<?php echo $product['id']?>">
				<div class="bloc_img">
					<img src="Assets/images/<?php echo $product['img']?>" alt="batiment" class="img_batiment"> 
				</div>
				<h2><?php echo $product['name']?> </h2>
				<p><?php echo $product['prix']?> €</p>
			</a>

	<?php } ?>
	

	
	
	<!-- -->
	
	
</div></div>