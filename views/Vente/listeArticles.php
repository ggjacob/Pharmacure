<table id="sale_table" width="600px" >
<?php if($view['articles']->count() > 0) : ?>
	<tr><th>Action</th><th>Article</th><th>prix</th><th width="35px">Ordonnance</th></tr>
<?php endif;?>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php foreach($view['articles'] as $article) : ?>
	<tr >
		<td align="center"> <a href="#" class="ajoutPanier" id="ajouter/<?=$article->id?>" onclick="panierAjout(this.id);" >Ajouter</a></td>
		<td align="center"><?=$article->Produit->Libelle?></td>
		<td align="center"><?=$article->Produit->Prix?></td>
		<td align="center" style=" border-top-style:solid;border-top-width:1px;">
			<?php if ($article->Produit->Ordonnance) echo "Oui";else echo "Non";?>
		</td></tr>
<?php endforeach;?>					 	
</table>
</div>