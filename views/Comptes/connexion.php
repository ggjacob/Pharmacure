
					<h1>Connexion</h1>
					<form action="<?=WEBROOT?>Comptes/connexion" method="post">
						<ul>
							<li>
								<label> </label>
								<span style='color:red;'><?=$view['erreur']?></span>
							</li>
							<li>	
								<label>Identifiant</label>
								<input type="text" name='login' value='<?php if(isset($view['login'])) echo$view['login'];?>' placeholder="Saisissez votre Identifiant" required>
							</li>
							<li>
								<label>Mot de passe</label>
								<input type="password" name='password' placeholder="Saisissez votre mot de passe"  required>
							</li>
								<input type="submit" value="Se connecter" class="btn3">
							</li>
						</ul>
					</form>
