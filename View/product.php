<!-- View/product.php -->


<?php
//session_start();
?>

<?php foreach($product as $product){ ?>
<section class="row" id="product">
	<div class="col-md-3">
		<img src="Assets/images/<?php echo $product['img']?>" alt="batiment">				 
	</div>
	<div class="col-md-9">
		<h2><?php echo $product['name']?></h2>										
		<p><span id="prix"><?php echo $product['prix']?></span>€ - Frais de port compris</p>			
		<p><?php echo $product['description']?></p>					
	
			
		<form action="" method="post">
			<div>
				<input type="checkbox" id="option" name="option"> 			
				<span id="option"><?php echo $product['optionName']?></span>
				-
				<span id="prix_option"><?php echo $product['optionPrix']?></span> €

					
			</div>
			
			<input type="submit" id="submit-acheter" value="Acheter">	
		<form>
	</div>
<?php } ?>
</section>

