<?php
function show_tabs($table)
{	$len = sizeof($table);
	for($i=0;$i<($len);$i++)
	{ 
		echo" <li><a href=\"#tabs-".$i."\">".$table[$i]."</a></li>";
	}
}

function show_tabs_contents($table, $out)
{	$len = sizeof($table);
	for($i=0;$i<($len);$i++)
	{
		echo"<div id=\"tabs-".$i."\"> <p>".$out."</p></div>";
	}
}

function tab_call($table)
{ 
	$len = sizeof($table);
	$new_len = $len;
	if(isset($_POST['Administrer']))
	{ 
	 $table[$new_len] = 'Administrer';
	}
	else if (isset($_POST['Clients']))
	{
	 $table[$new_len] = 'Clients';
	}
	else if (isset($_POST['Inventaire']))
	{
		$table[$new_len] = 'Inventaire';
	}
	else if (isset($_POST['Fournisseurs']))
	{
		$table[$new_len] = 'Fournissuers';
	}
	else if (isset($_POST['Produits']))
	{
		$table[$new_len] = 'Produits';
	}
	else if (isset($_POST['Factures']))
	{
		$table[$new_len] = 'Factures';
	}
	else if (isset($_POST['Statistiques']))
	{
		$table[$new_len] = 'Statistiques';
	}
	else if (isset($_POST['Alertes']))
	{
		$table[$new_len] = 'Alertes';
	}

	return $table;
}

?>