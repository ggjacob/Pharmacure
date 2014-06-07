<div id="messagerie">
	<h1>Messagerie</h1>
<?php foreach($view['messages'] as $message) : ?>
		<?=$message->date?>
		<div class="message">
			<div class="objet">
				<?php if ($message->vue==0) {echo "<b>";} ?><?=utf8_encode($message->sender->prenom)?> <?=utf8_encode($message->sender->nom)?> : <?=utf8_encode($message->titre)?><?php if ($message->vue == 0) {echo "</b>";} ?>
			</div>
			<div class="photo">
				<img src="<?=WEBROOT?>public/images/mail.jpg" />
			</div>
			<div class="contenu">
				<?=utf8_encode($message->message)?>
			</div>
			<div class="lire-repondre">
				<a href="<?=WEBROOT?>Messageries/view/<?=$message->id?>">Lire</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?=WEBROOT?>Messageries/delete/<?=$message->id?>">supprimer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?=WEBROOT?>Messageries/envoyer/<?=$message->id?>">repondre</a>
			</div>
		
		</div>
<?php endforeach;?>
</div>