<table id="sale_table" width="600px" >
<?php if($view['articles']->count() > 0) : ?>
	<tr><th>Action</th><th>Code Barre</th><th>Article</th><th>prix TTC</th></tr>
<?php endif;?>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php foreach($view['articles'] as $article) : ?>
	<tr >
		<td align="center" style=" border-top-style:solid;border-top-width:1px;"> <a href="#" class="ajoutPanier" id="ajouter/<?=$article->id?>" onclick="panierAjout(this.id);return false;" >Ajouter</a></td>
		<td align="center" style=" border-top-style:solid;border-top-width:1px;">
			<?=$article->CodeBarre;?>
		</td>
		<td align="center"><?=$article->Produit->Libelle?></td>
		<td align="center"><?=$article->Produit->Prix * ( 1 + ($article->Produit->Taxe->Taux/100))?> f cfa</td>
		</tr>
<?php endforeach;?>					 	
</table>
</div>