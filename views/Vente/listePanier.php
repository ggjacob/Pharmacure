<table id="sale_table" width="600px" >
	<tr><th>Code barre</th><th>Article</th><th>prix</th></tr>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php foreach($view['articles'] as $article) : ?>
	<tr >
		<td align="center">
			<?=$article->CodeBarre?>
		</td>
		<td align="center"><?=$article->Produit->Libelle?></td>
		<td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$article->Produit->Prix?></td>
		</tr>
<?php endforeach;?>					 	
</table>
</div>
<input type="submit" name="Valider" value="Valider" id="send"/>
