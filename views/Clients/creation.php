		<div id="" class="wrapper clearfix">
			<div class="main">
				<div id="contenu">
						<a onclick='$("#retour").html("");' href="#">Annuler</a>
					<h1><?=$view["titre"]?></h1>
					<form action="<?=WEBROOT?>Clients/creation" id="ajouterForm" method="post">

						<input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
						<ul>
							<li>
								<label>Nom</label>
								<input type="text" name='nom' value='<?php if(isset($view['form']['nom'])) echo$view['form']['nom'];?>' placeholder="Saisissez votre nom" required>
							</li>
							<li>
								<label>Prénom</label>
								<input type="text" name='prenom' value='<?php if(isset($view['form']['prenom'])) echo$view['form']['prenom'];?>' placeholder="Saisissez votre prénom" required>
							</li>
							<li>
								<label>Email</label>
								<input type="email" name='mail' value='<?php if(isset($view['form']['mail'])) echo$view['form']['mail'];?>' placeholder="Saisissez votre email" required>
							</li>

							<li>
								<label>Téléphone (ex: +33629468981) </label>
								<input type="text" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name='tel' value='<?php if(isset($view['form']['tel'])) echo$view['form']['tel'];?>' placeholder="Saisissez votre numéro de téléphone" required>
								<?php if(isset($view['erreur']['tel'])) echo$view['erreur']['tel'];?>
							</li>
							<li>
								<label> </label>
								<span style='color:red;'><?php if(isset($view['erreur']['login'])) echo $view['erreur']['login'];?></span>
							</li>
							<li>
								<label>Commentaire</label>
								<textarea rows="4" cols="50" type="text" name='commentaire'><?php if(isset($view['form']['commentaire'])) echo$view['form']['commentaire'];?></textarea>
							</li>
							
							<li>
								<input type="submit" value="Enregistrer" class="btn3">
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>