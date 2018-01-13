<!-- View/cart.php -->


<?php
session_start(); 

?>
<table class="table table-bordered">
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
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="button" value= "Supprimer" id="supprimer"> </td>
        </tr>
		
		<!-- -->
		
		
		<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total : </td>
            <td><input type="button" value= "Acheter" id="acheter"> </td>
        </tr>
		
		
		
	</tbody>
</table>