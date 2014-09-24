<table id="sale_table" width="600px" >
<?php if($view['articles']->count() > 0) : ?>
	<tr><th width="72px">Action</th><th width="162px">Code Barre</th><th  width="200px">Article</th><th width="160px">prix TTC</th></tr>
<?php endif;?>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php foreach($view['articles'] as $article) : ?>
	<tr >
		<td width="72px" align="center" style=" border-top-style:solid;border-top-width:1px;"> <a href="#" class="ajoutPanier" id="ajouter/<?=$article->id?>" onclick="panierAjout(this.id);AfficherPanier();return false;" >Ajouter</a></td>
		<td width="162px" align="center"  style=" border-top-style:solid;border-top-width:1px;">
			<?=$article->CodeBarre;?>
		</td>
		<td  width="200px" align="center"><?=$article->Produit->Libelle?></td>
		<td  width="160px" align="center"><?=$article->Produit->Prix * ( 1 + ($article->Produit->Taxe->Taux/100))?> f cfa</td>
		</tr>
<?php endforeach;?>					 	
</table>
</div>