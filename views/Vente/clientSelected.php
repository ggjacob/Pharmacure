<table id="sale_table" width="600px" >
	<tr><th>Nom</th><th>Prenom</th><th>tel</th></tr>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php if(isset($_SESSION['client'])) : ?>
	<tr >
			<td align="center">
				<?=$_SESSION['client']->Nom?>
			</td>
			<td align="center"><?=$_SESSION['client']->Prenom?></td>
			<td align="center" style=" border-top-style:solid;border-top-width:1px;">
				<?=$_SESSION['client']->Tel?></td>
			</tr>
<?php endif; ?>  				 	
</table>
</div>
