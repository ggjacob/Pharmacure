<script type="text/javascript">
$(function(){
        $("#formCompte").submit(function(event){
            var nom         = $("#nom").val();
            var prenom           = $("#prenom").val();
            var tel      = $("#tel").val();
            var typeU = $("#typeU").val();
            var mail     = $("#mail").val();
            var login            = $("#login").val();
            var password            = $("#password").val();
            var oldpassword     = $("#oldpassword").val();
            var confirm         = $("#confirm").val();
            var msg_all         = 'Merci de remplir tous les champs';
            var msg_alert       = 'Merci de remplir ce champs';
            
            
            if(nom == '' || login == '')
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else
            {
                $.ajax({
                    type : "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success : function(data){
                        
                        if(data == 'success'){
                            $('#OKText').html("Succ&egrave;s ! Votre client a &eacute;t&eacute; enregistr&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
                            $("#formClient").get(0).reset();
                        }
                        else if(data == 'failed'){
                            $('#KOText').html("Erreur ! Ce numero de téléphone existe déjà");
                            $('#formOk').hide();
                            $('#formKO').show();         
                        }else{
                            $('#KOText').html("Erreur ! La validation du formulaire à echouée");
                            $('#formOk').hide();
                            $('#formKO').show();
                        }
                        
                    },
                    error: function(){
                        $('#formKO').html("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
            }
            return false;
        });
    });
</script>		
<div id="upper_content_forms" style="visibility:visible !important;">
    <div>
            <div style="display:none;" id="formOk" class="alert alert-icon alert-success">
                <div id="OKText" class="text">
                </div>
            </div>
            <div style="display:none;" id="formKO" class="alert alert-icon alert-danger">
                <div id="KOText" class="text">
                </div>
            </div>
        </div>
			<div class="main">
				<div id="contenu">
					<h1>Inscription</h1>
					<form id="formCompte" action="<?=WEBROOT?>Comptes/inscription" method="post">

						<input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
						<ul>
							<li>
								<label>Nom</label>
								<input id="nom" type="text" name='nom' value='<?php if(isset($view['form']['nom'])) echo$view['form']['nom'];?>' placeholder="Saisissez votre nom" required>
							</li>
							<li>
								<label>Prénom</label>
								<input id="prenom" type="text" name='prenom' value='<?php if(isset($view['form']['prenom'])) echo$view['form']['prenom'];?>' placeholder="Saisissez votre prénom" required>
							</li>
							<li>
								<label>Email</label>
								<input id="mail" type="email" name='mail' value='<?php if(isset($view['form']['mail'])) echo$view['form']['mail'];?>' placeholder="Saisissez votre email" required>
							</li>

							<li>
								<label>Téléphone (ex: +33629468981) </label>
								<input id="tel" type="text" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name='tel' value='<?php if(isset($view['form']['tel'])) echo$view['form']['tel'];?>' placeholder="Saisissez votre numéro de téléphone" required>
							</li>
							<li>
								<label> </label>
								<span style='color:red;'><?php if(isset($view['erreur']['login'])) echo $view['erreur']['login'];?></span>
							</li>
							<li>
								<label>Login</label>
								<input id="login" type="text" name='login' value='<?php if(isset($view['form']['login'])) echo$view['form']['login'];?>' placeholder="Saisissez votre identifiant" required>
							</li>
							<?php if($view["form"]['type'] == "update") :?>
								<li>
									<label>Ancien mot de passe</label>
									<input id="oldpassword" type="password" name='oldpassword' placeholder="Saisissez votre ancien mot de passe" required>
								</li>
								<li>
									<label> </label>
									<span style='color:red;'><?php if(isset($view['erreur']['oldpassword'])) echo $view['erreur']['oldpassword'];?></span>
								</li>
							<?php endif;?>
								<li>
									<label>Mot de passe</label>
									<input id="password" type="password" name='password' placeholder="Saisissez votre mot de passe" required>
								</li>
							<li>
								<label> </label>
								<span style='color:red;'><?php if(isset($view['erreur']['password'])) echo $view['erreur']['password'];?></span>
							</li>

							<li>
								<label>Confirmation</label>
								<input id="confirm" type="password" name='confirm' placeholder="Saisissez à nouveau votre mot de passe" required>
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
