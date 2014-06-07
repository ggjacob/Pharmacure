		<div id="" class="wrapper clearfix">
			<div class="main">
				<div id="contenu">
					<h1>Inscription</h1>
					<form action="<?=WEBROOT?>Comptes/inscription" method="post">

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
							</li>
							<li>
								<label> </label>
								<span style='color:red;'><?php if(isset($view['erreur']['login'])) echo $view['erreur']['login'];?></span>
							</li>
							<li>
								<label>Login</label>
								<input type="text" name='login' value='<?php if(isset($view['form']['login'])) echo$view['form']['login'];?>' placeholder="Saisissez votre identifiant" required>
							</li>
							<?php if($view["form"]['type'] == "update") :?>
								<li>
									<label>Ancien mot de passe</label>
									<input type="password" name='oldPassword' placeholder="Saisissez votre ancien mot de passe" required>
								</li>
								<li>
									<label> </label>
									<span style='color:red;'><?php if(isset($view['erreur']['oldpassword'])) echo $view['erreur']['oldpassword'];?></span>
								</li>
							<?php endif;?>
								<li>
									<label>Mot de passe</label>
									<input type="password" name='password' placeholder="Saisissez votre mot de passe" required>
								</li>
							<li>
								<label> </label>
								<span style='color:red;'><?php if(isset($view['erreur']['password'])) echo $view['erreur']['password'];?></span>
							</li>

							<li>
								<label>Confirmation</label>
								<input type="password" name='confirm' placeholder="Saisissez à nouveau votre mot de passe" required>
							</li>
							<li>
								<input type="radio" name="typeU" value="1" <?php if(isset($view['form']['typeU']) && $view['form']['typeU']==1) echo "checked";?> > User<br>
								<input type="radio" name="typeU" value="2" <?php if(isset($view['form']['typeU']) && $view['form']['typeU']==2) echo "checked";?> > Intermediaire<br>
								<input type="radio" name="typeU" value="3" <?php if(isset($view['form']['typeU']) && $view['form']['typeU']==3) echo "checked";?> > Administrateur<br>
							</li>
							<li>
								<input type="submit" value="Enregistrer" class="btn3">
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
