<table id="sale_table" width="600px" >
<?php if($view['clients']->count() > 0) : ?>
	<tr ><th width="110px">Action</th><th width="150px">Nom</th><th width="150px">Prenom</th><th width="200px">tel</th></tr>
<?php endif;?>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php foreach($view['clients'] as $client) : ?>
	<tr >
		<td width="110px" style=" border-top-style:solid;border-right-width:1px;" align="center"> <a href="#" class="ajoutPanier" id="ajouterClient/<?=$client->id?>" onclick="ajoutClient(this.id);return false;" >Selectionner</a></td>
		<td width="150px" align="center"><?=$client->Nom?></td>
		<td width="150px" align="center"><?=$client->Prenom?></td>
		<td width="190px" align="center" style=" border-top-style:solid;border-top-width:1px;">
			<?=$client->Tel?>
		</td></tr>
<?php endforeach;?>					 	
</table>
</div>