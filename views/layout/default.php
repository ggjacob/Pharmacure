<html style="overflow: none;overflow: hidden;" onclick="fermerMenu()" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" /> 
		<title><?=$view['titre']?></title>

		<link rel="stylesheet" href="<?=WEBROOT?>public/css/style.css">
		<link rel="stylesheet" href="<?=WEBROOT?>public/css/tab.css">
		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/easyui.css">
		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/icon.css">
		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/jquery.popup.css">
		<!--  inclure les autres fichiers css après ce commentaire obligatoirement-->


        <script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.js"></script>
		<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.easyui.min.js"></script>
		<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?=WEBROOT?>public/js/table.js"></script>
		<script type="text/javascript" src="<?=WEBROOT?>public/js/app.js"></script>
		<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.popup.js"></script>

		<!--
		<script type="text/javascript" src="public/js/color.js"></script>
		<script type="text/javascript" src="public/js/angular.min.js"></script>
		<script type="text/javascript" src="public/js/app.js"></script>
		-->
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		   		$( "#tabs" ).tabs({
		   			
		   		});
		});
        </script>
		

	</head>

	<body style="overflow-x: none;overflow-x: hidden" onload='display_ct();addTabVentes("Vente","<?=WEBROOT?>Vente/index");
		addTab("Clients","<?=WEBROOT?>Clients/index");
		addTab("Inventaires","<?=WEBROOT?>Inventaires/index");
		addTab("Fournisseurs","<?=WEBROOT?>Fournisseurs/index");
		addTab("Produits","<?=WEBROOT?>Produits/index");
		addTab("Factures","<?=WEBROOT?>Factures/index");
		addTab("Tableau de bord","<?=WEBROOT?>Statistiques/index");
		addTab("Commandes","<?=WEBROOT?>Commandes/index");
		' >
		<div id="sousgear">
			<div class="sousgear">
				<a href="#" onclick='addTab("Votre pharmacie","<?=WEBROOT?>Administrations/infos")'>Votre pharmacie</a>
			</div>
			<div class="sousgear">
				<a href="#" onclick='addTab("Vos collaborateurs","<?=WEBROOT?>Comptes/index")'>Vos collaborateurs</a>
			</div>
		</div>

		<div id="top"><a href="<?=WEBROOT?>"><div id="logo"></div><div class="logo_info">PharmaCure&trade;</br></div><div class="logo_info_small">Le Premier Traitement Digital</div></a>
		
		<?php if(isset($_SESSION['user']) && $_SESSION['user']->Type==3):?>
			<div id="gear" onclick="afficheMenu(this,event)"></div>
		<?php endif;?>	
		<div id="alerte"></div>
		<div class="badge">44</div>
		<div class="welcome_info" style="font-size:15;">
			<?php if(isset($_SESSION['user'])):?>
				Bonjour <?=$_SESSION['user']->Prenom?> <br>
				<span id='ct' style="font-size:10;"></span></div>
			<a href="<?=WEBROOT?>Comptes/deconnexion"><div class="disconnect"> </div></a>	
			<?php endif;?>
		
		</div>
		<div id="content">
			<table width="100%" style="min-height:100%;" border="2px">
			<tr style=" min-height:100%; padding:0px; border-spacing: 0px; border-collapse: separate;">
				<td width="250px" style="min-height:100%; border-color:#DEDEDE; background-color:#15992B; border-right-style:solid; border-right-width:2px; -webkit-box-shadow: 0 0 10px rgba(0,0,0,.3); ">
				<div id="modules">
						<dib class="menutab" cellspacing="10px">	
							<a href="#" name="Clients" onclick='addTab("Clients","<?=WEBROOT?>Clients/index")'>
							<div class="line">
								<div class="back"><div class="clients_img"></div></div>
										<div class="text"><span>Clients<span></div>
							</div>
							</a>
							<a href="#" name="Inventaire" onclick='addTab("Inventaire","<?=WEBROOT?>Inventaires/index")'>
							<div class="line">
								<div class="back"><div class="inventaire_img"></div></div>
										<div class="text"><span>Inventaire<span></div>
							</div>
							</a>
							<a href="#" name="Fournisseurs" onclick='addTab("Fournisseurs","<?=WEBROOT?>Fournisseurs/index")'>
							<div class="line">
								<div class="back"><div class="fournisseurs_img"></div></div>
										<div class="text"><span>Fournisseurs<span></div>
							</div>
							<a href="#" name="Commandes" onclick='addTab("Commandes","<?=WEBROOT?>Commandes/index")'>
							<div class="line">
								<div class="back"><div class="commandes_img"></div></div>
										<div class="text"><span>Commandes<span></div>
							</div>
							</a>
							<a href="#" name="Produits"	onclick='addTab("Produits","<?=WEBROOT?>Produits/index")'>
							<div class="line">
								<div class="back"><div class="produits_img"></div></div>
										<div class="text"><span>Produits<span></div>
							</div>
							</a>
							<a href="#" name="Factures"  onclick='addTab("Factures","<?=WEBROOT?>Factures/index")'>
							<div class="line">
								<div class="back"><div class="facture_img"></div></div>
										<div class="text"><span>Factures<span></div>
							</div>
							</a>
							<a href="#" name="Statistiques" onclick='addTab("Tableau de bord","<?=WEBROOT?>Statistiques/index")'>
							<div class="line">
								<div class="back"><div class="statistique_img"></div></div>
										<div class="text"><span>Tableau de bord<span></div>
							</div>
							</a>
                                                        <a href="#" name="Statistiques" onclick='addTab("Documents","<?=WEBROOT?>Documents/index")'>
							<div class="line">
								<div class="back"><div class="documents_img"></div></div>

										<div class="text"><span>Documents<span></div>
							</div>
							</a>


						</div>
				</div>
				<span id="copyright" style="position:fixed; bottom:10px; color:white; font-family:arial; left:10px;"><font size="1"><p>&copy; Copyright 2014. All Rights Reserved </br> Designed by DGK </p></font></span><div class="mini_logo"></div>
				</td>
				<td style="min-height:100%;">
					<div id="tt" onclick="fermerMenu()" class="easyui-tabs" style="min-height:100%;">
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