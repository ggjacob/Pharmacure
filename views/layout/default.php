<html style="overflow-x: none;overflow-x: hidden;" lang="fr">
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

	<body style="overflow-x: none;overflow-x: hidden">

		<div id="top"><a href="<?=WEBROOT?>"><div id="logo"></div></a> <a><div id="gear"></div><div id="alerte"></div><div class="badge">44</div></a>
		<div class="welcome_info">
			<?php if(isset($_SESSION['user'])):?>
				Bonjour <?=$_SESSION['user']->Nom?> <br>
				<?echo date("D M d, Y G:i a"); ?></div>
			<a href="<?=WEBROOT?>Comptes/deconnexion"><div class="disconnect"> </div></a>	
			<?php endif;?>
		
		</div>
		<div id="content">
			<table width="100%" style="min-height:100%;" border="2px">
			<tr style=" min-height:100%; padding:0px; border-spacing: 0px; border-collapse: separate;">
				<td width="250px" style="min-height:100%; border-color:#DEDEDE; background-color:#15992B; border-right-style:solid; border-right-width:2px; -webkit-box-shadow: 0 0 10px rgba(0,0,0,.3); ">
				<div id="modules">
						<table class="menutab" cellspacing="10px">	
							<tr><td class="module" width="50px"><div class="clients_img"></div></td><td class="module" ><a href="#" name="Clients" onclick='addTab("Clients","<?=WEBROOT?>Clients/index")'><div width="100%" height="100%">Clients</div></a></td></tr>
							<tr><td class="module" width="50px"><div class="inventaire_img"></div></td><td class="module"><a href="#" name="Inventaire" onclick='addTab("Inventaire","<?=WEBROOT?>Inventaires/index")'><div width="100%" height="100%">Inventaire</div></a></td></tr>
							<tr><td class="module" width="50px"><div class="fournisseurs_img"></div></td><td class="module"><a href="#" name="Fournisseurs" onclick='addTab("Fournisseurs","<?=WEBROOT?>Fournisseurs/index")'><div width="100%" height="100%">Fournisseurs</div></a></td></tr>
							<tr><td class="module" width="50px"><div class="produits_img"></div></td><td class="module"><a href="#" name="Produits"	onclick='addTab("Produits","<?=WEBROOT?>Produits/index")'><div width="100%" height="100%">Produits</div></a></td></tr>
							<tr><td class="module" width="50px"><div class="facture_img"></div></td><td class="module"><a href="#" name="Factures"  onclick='addTab("Factures","<?=WEBROOT?>Factures/index")'><div width="100%" height="100%">Factures</div></a></td></tr>
							<tr><td class="module" width="50px"><div class="statistique_img"></div></td><td class="module"><a href="#" name="Statistiques" onclick='addTab("Statistiques","<?=WEBROOT?>Statistiques/index")'><div width="100%" height="100%">Statistiques</div></a></td></tr>	
						</table>
				</div>
				</td>
				<td style="min-height:100%;">
					<div id="tt" class="easyui-tabs" style="min-height:100%;">
  							<div title="ACCEUIL">
  								<?php echo $content_for_layout; ?>	
							</div>
 							
					</div>
				</td>
			</tr>
			</table>
		</div>
	</body>		
</html>