<table id="sale_table" width="600px" >
	<tr><th>Action</th><th>Code barre</th><th>Article</th><th>prix</th></tr>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php if(isset($_SESSION['panier'])) : ?>
	<?php foreach($_SESSION['panier'] as $article) : ?>
		<tr >
			<td align="center">
				<a href="#" class="ajoutPanier" id="supprimerArticle/<?=$article->id?>" onclick="panierSupprimer(this.id);" >Supprimer</a>
			</td>
			<td align="center">
				<?=$article->CodeBarre?>
			</td>
			<td align="center"><?=$article->Produit->Libelle?></td>
			<td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$article->Produit->Prix?></td>
			</tr>
	<?php endforeach;?>	
<?php endif; ?>  				 	
</table>
</div>
