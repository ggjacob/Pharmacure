
	    <form method="post" action="<?=WEBROOT?>Messageries/create" enctype="multipart/form-data">
			<div id="envoyer-mail">
				<h1>Repondre à une annonce</h1>
				<input type="text" value='<?=$view["annonce"]->titre?>' name="titre" required><br>
				<input type="hidden" value='<?=$view["annonce"]->User->id?>' name="receiver">
				<textarea rows="5" cols="89" placeholder="Votre message..." name="message" required></textarea><br>	
				<input type="file"  name="fichier"><br>
				<input type="submit" name="envoyerMessage" value="Envoyer">
			</div>
		</form>
