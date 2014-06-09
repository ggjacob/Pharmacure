		<div id="contact" class="wrapper clearfix">
			<div class="main">
				<div id="contenu">
					<h1>Contactez-nous</h1>
					<form action="Home/contact" method="post">
						<ul>
							<li>
								<label>Entrez votre nom</label>
									<input type="text" name='nom' value='<?php if(isset($view['form']['nom'])) echo$view['form']['nom'];?>' placeholder="Nom" required>
							</li>
							<li>
								<label>Entrez votre email</label>
								<input type="email" name='mail' value='<?php if(isset($view['form']['mail'])) echo$view['form']['mail'];?>' placeholder="Adresse email" required>
							</li>
							<li>
								<label>Entrez l'objet de votre message</label>
								<input type="text" name='objet' value='<?php if(isset($view['form']['objet'])) echo$view['form']['objet'];?>' placeholder="Objet de votre message" required>
							</li>
							<li>
								<label class="msg">Ecrivez votre message</label>
								<textarea name='message' value='<?php if(isset($view['form']['message'])) echo$view['form']['message'];?>' placeholder="Message" required></textarea>
								<input type="submit" value="Envoyer" class="btn3">
							</li>
						</ul>
					</form>
				</div>
			</div>