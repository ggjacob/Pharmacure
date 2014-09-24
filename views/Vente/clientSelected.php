<table id="sale_table" width="600px" >
	<tr><th width="200px">Nom</th><th width="200px">Prenom</th><th>tel</th></tr>
</table>
<div style="height:100px;overflow:auto;">
<table id="sale_table" width="600px">
<?php if(isset($_SESSION['client'])) : ?>
	<tr >
			<td width="200px" align="center" style=" border-top-style:solid;border-right-width:1px;">
				<?=$_SESSION['client']->Nom?>
			</td>
			<td  width="200px" align="center"><?=$_SESSION['client']->Prenom?></td>
			<td align="center" style=" border-top-style:solid;border-top-width:1px;">
				<?=$_SESSION['client']->Tel?></td>
			</tr>
<?php endif; ?>  				 	
</table>
</div>
