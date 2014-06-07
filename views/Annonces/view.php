<div id="annonce">
	<div id="image">
		<?php if(!empty($view['annonce']->image1)):?>
		<div class="photo">
			<img width="220" height="204" src="<?=WEBROOT?>public/uploads/annonces/<?=$view['annonce']->image1?>" />
		</div>
		<?php endif;?>

		<?php if(!empty($view['annonce']->image2)):?>
		<div class="photo">
			<img width="220" height="204" src="<?=WEBROOT?>public/uploads/annonces/<?=$view['annonce']->image2?>" />
		</div>
		<?php endif;?>

		<?php if(!empty($view['annonce']->image3)):?>
		<div class="photo">
			<img width="220" height="204" src="<?=WEBROOT?>public/uploads/annonces/<?=$view['annonce']->image3?>"/>
		</div>
		<?php endif;?>
	</div>
	<p>
		<span>Titre :</span> <?=$view['annonce']->titre?><br>
		<span>Publié par :</span> <?=strtoupper($view['annonce']->User->nom).' '.$view['annonce']->User->prenom?><br>
		<span>Date :</span> <?=$view['annonce']->getDate()?><br>
		<span>Prix :</span> <?=$view['annonce']->prix?> EUR<br>
		<span>Ville :</span> <?=$view['annonce']->Ville->nom.' '.$view['annonce']->Ville->cp?><br>
		<span>Catégorie :</span> <?=utf8_encode($view['annonce']->categorie->nom)?><br>
		<span>Description :</span> <?=utf8_encode($view['annonce']->description)?><br><br>
		<?php if(isset($_SESSION['user'])):?>
				<?php if($_SESSION['user']->id == $view['annonce']->User->id ):?>
					<a href="<?=WEBROOT?>Annonces/delete/<?=$view['annonce']->id?>">supprimer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?=WEBROOT?>Annonces/modifier/<?=$view['annonce']->id?>">modifier</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php else:?>
					<a href="<?=WEBROOT?>Annonces/repondre/<?=$view['annonce']->id?>">repondre</a>
				<?php endif;?>
		<?php else:?>
			<a href="<?=WEBROOT?>Annonces/repondre/<?=$view['annonce']->id?>">repondre</a>
		<?php endif;?>
	</p>
</div>


