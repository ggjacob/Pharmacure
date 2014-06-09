<div style="position:relative; width:100%; height:100%; background-color:#EFEFEF; margin: 0; padding: 0; color:white">
					<div style="position:absolute; left:35%; width:400px; height:400px; background-image: url('/Pharmacure/public/images/connect_logo.png');"></div>
					<div style="position:absolute; left:calc(35% + 50px); top:400px;">
	
					<form action="<?=WEBROOT?>Comptes/connexion" method="post">
						<span style='color:red;'><?=$view['erreur']?></span>
						<table width="250px">
							<tr >
								<td width="100px"><label style="color:086537;">Identifiant</label></td>
								<td align="right"><input type="text" name='login' value='<?php if(isset($view['login'])) echo$view['login'];?>' placeholder="Saisissez votre Identifiant" required>
								</td>
							</tr>
							<tr>
								<td><label style="color:086537;">Mot de passe</label></td>
								<td align="right"><input type="password" name='password' placeholder="Saisissez votre mot de passe"  required>
								</td>
							</tr>
							<tr>
								<td><label></td>
								<td align="right"><input style=" background: #197F3F; border: none; padding: 10px 25px 10px 25px; color: #FFF;" type="submit" value="Se connecter" class="btn3"></td>
							</tr>
						</table>
					</form>
				</div>
</div>