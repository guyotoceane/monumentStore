<!-- View/cart.php -->

<table class="table table-bordered" id="table-cart">
    <thead>
		<tr>
			<th></th> <!-- img -->
			<th>Nom</th>
			<th>Option</th>
			<th>Quantité</th>
			<th>Prix</th>
			<th></th> <!-- Action -->
		</tr>
    </thead>
    <tbody>
	
		<!-- boucle session -->
        <?php
        foreach($_SESSION['cart'] as $product){ ?>
        <tr>
            <td></td>
            <td><?php echo $product['name']?></td>
            <td><?php echo $product['optionName']?></td>
            <td>Produit :  <input onchange="changeQuantite(this.value, 'produit', <?php echo $product['id'] ?>)" type="number" min="0" value="<?php echo $product['quantite']?>" id="quantite">   <br>
                option : <input onchange="changeQuantite(this.value, 'option', <?php echo $product['id'] ?>)" type="number" min="0" max="<?php echo $product['quantite']?>" value="<?php echo $product['quantiteOption']?>">
            </td>
            <td>Produit : <?php echo $product['quantite'] * $product['prix']?> <br>
                option : <?php echo $product['quantiteOption'] * $product['optionPrix']?>
            </td>
            <td><a href="index.php?ctrl=cart&action=suppr&id=<?php echo $product['id'] ?>""><input type="button" value= "Supprimer" id="supprimer"></a> </td>
        </tr>
        <?php } ?>
		
		<!-- -->
		
		
		<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total :  <?php echo $total?></td>
            <td><a href="index.php?ctrl=cart&action=validate"> <input type="button" value= "Acheter" id="acheter"> </a> </td>
        </tr>
		
		
		
	</tbody>
</table>

<script>
    function changeQuantite(quantite, type, id) {
        console.log(quantite);
        $.ajax({
            url:"index.php?ctrl=cart&action=quantite",
            data: {
                number : quantite,
                type : type,
                id : id
            },
            type:'POST',
            datatype:'html',
            success: function(data){
                    console.log(data);
                    window.location.reload();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }


        })
    }
</script>