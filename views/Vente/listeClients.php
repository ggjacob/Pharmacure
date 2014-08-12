<table id="sale_table" width="600px" >
<?php if($view['clients']->count() > 0) : ?>
	<tr><th>Action</th><th>Nom</th><th>Prenom</th><th>tel</th></tr>
<?php endif;?>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php foreach($view['clients'] as $client) : ?>
	<tr >
		<td align="center"> <a href="#" class="ajoutPanier" id="ajouterClient/<?=$client->id?>" onclick="ajoutClient(this.id);return false;" >Selectionner</a></td>
		<td align="center"><?=$client->Nom?></td>
		<td align="center"><?=$client->Prenom?></td>
		<td align="center" style=" border-top-style:solid;border-top-width:1px;">
			<?=$client->Tel?>
		</td></tr>
<?php endforeach;?>					 	
</table>
</div>