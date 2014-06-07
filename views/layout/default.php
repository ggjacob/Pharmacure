<html style="overflow-x: hidden" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" /> 
		<title><?=$view['titre']?></title>
		<link rel="stylesheet" href="<?=WEBROOT?>public/css/style.css">
		<link rel="stylesheet" href="<?=WEBROOT?>public/css/tab.css">

		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/easyui.css">
		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/icon.css">


		<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery-1.4.4.min.js"></script>
	    <script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.easyui.min.js"></script>
	    <script type="text/javascript" src="<?=WEBROOT?>public/js/app.js"></script>
		
		<script>
		function addTab(title, url){
				if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
				} else {
					var content = '<iframe scrolling="auto" id="'+title+'" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
					$('#tt').tabs('add',{
						title:title,
						content:content,
						closable:true	
					});
				}	
		}
	</script>
		<!--
		<script type="text/javascript" src="public/js/color.js"></script>
		<script type="text/javascript" src="public/js/angular.min.js"></script>
		<script type="text/javascript" src="public/js/app.js"></script>
		-->
	</head>

	<body>

		<div id="top"><a href="<?=WEBROOT?>"><div id="logo"></div></a>
		<?php if(isset($_SESSION['user'])):?>
			Bonjour <?=$_SESSION['user']->Nom?> <br>
		<a href="<?=WEBROOT?>Comptes/deconnexion">Déconnexion </a>	
		<?php endif;?>
		</div>
		<div id="content">
			<table width="100%" border="0px">
			<tr height="100%" style="padding:0px; border-spacing: 0px; border-collapse: separate;">
				<td width="250px" height="100%" style="border-color:#DEDEDE; border-right-style:solid; border-right-width:2px; -webkit-box-shadow: 0 0 10px rgba(0,0,0,.3); ">
					<div id="modules">
						<form  method="POST" action="#">
							<?php if(isset($_SESSION['user']) && $_SESSION['user']->Type == 3):?>
							<input onclick='addTab("Administrer","<?=WEBROOT?>Administrations/index")' type="submit" name="Administrer" value="Administrer" id="module" class="button submit">
							<?php endif;?>
							<input onclick='addTab("Clients","<?=WEBROOT?>Clients/index")' type="submit" name="Clients" value="Clients" id="module" class="green submit">
							
							<input onclick='addTab("Inventaire","<?=WEBROOT?>Inventaires/index")' type="submit" name="Inventaire" value="Inventaire" id="module" class="green submit">
						
						
							<input onclick='addTab("Fournisseurs","<?=WEBROOT?>Fournisseurs/index")' type="submit" name="Fournisseurs" value="Fournisseurs" id="module" class="green submit">
							
							
							<input onclick='addTab("Produits","<?=WEBROOT?>Produits/index")' type="submit" name="Produits" value="Produits" id="module" class="blue submit">
						
							
							<input onclick='addTab("Factures","<?=WEBROOT?>Factures/index")' type="submit" name="Factures" value="Factures" id="module" class="blue submit">
						
							
							<input onclick='addTab("Statistiques","<?=WEBROOT?>Statistiques/index")' type="submit" name="Statistiques" value="Statistiques" id="module" class="blue submit">
						
							
							<input onclick='addTab("Alertes","<?=WEBROOT?>Alertes/index")' type="submit" name="Alertes" value="Alertes" id="module" class="red submit">
						</form>
					</div>
				</td>
				<td height="100%">
					<div id="tt" class="easyui-tabs" style="max-width:1020px;height:600px;">
  							<div title="Vente">
							</div>
 							<?php //echo $content_for_layout; ?>
					</div>
				</td>
			</tr>
			</table>
		</div>
	</body>		
</html>