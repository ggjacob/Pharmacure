<table id="sale_table" width="600px" >
	<tr><th width="100px">Action</th><th width="200px">Code Barre</th><th  width="200px">Article</th><th width="100px">prix TTC</th></tr>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php if(isset($_SESSION['panier'])) : ?>
	<?php foreach($_SESSION['panier'] as $article) : ?>
		<tr >
			<td width="100px" style=" border-top-style:solid;border-right-width:1px;" align="center">
				<a href="#" id="supprimerArticle/<?=$article->id?>" onclick="panierSupprimer(this.id);return false;" >Supprimer</a>
			</td>
			<td width="200px" align="center">
				<?=$article->CodeBarre?>
			</td>
			<td width="200px" align="center"><?=$article->Produit->Libelle?></td>
			<td width="100px" align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$article->Produit->Prix * ( 1 + ($article->Produit->Taxe->Taux/100))?> f cfa</td>
			</tr>
	<?php endforeach;?>	
<?php endif; ?>  				 	
</table>
</div>
