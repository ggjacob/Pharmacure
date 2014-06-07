<style type="text/css">
	#messagerie .message .contenu{
    width: 460px;
}

	#messagerie .message{
    overflow: hidden;
	height: auto;
	padding-bottom: 8px;
}
</style>
<div id="messagerie">
	<h1>Messagerie</h1>
		<div class="message">
			<div class="objet">
				<?=utf8_encode($view['message']->sender->prenom)?> <?=utf8_encode($view['message']->sender->nom)?> : <?=utf8_encode($view['message']->titre)?>
			</div>
			<div class="contenu">
				<?=utf8_encode($view['message']->message)?>
			</div>
			<div class="lire-repondre">
				<a href="<?=WEBROOT?>Messageries/delete/<?=$view['message']->id?>">supprimer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?=WEBROOT?>Messageries/envoyer/<?=$view['message']->id?>">repondre</a>
			</div>
		</div>
</div>