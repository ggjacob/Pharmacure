<script type="text/javascript">
$(function(){
        $("#formCompte").submit(function(event){
            var nom         = $("#nom").val();
            var prenom      = $("#prenom").val();
            var tel         = $("#tel").val();
            var typeU       = $("#typeU").val();
            var mail        = $("#mail").val();
            var login       = $("#login").val();
            var password    = $("#password").val();
            var confirm     = $("#confirm").val();

            
            if(nom == '' || login == '' || prenom == '' || tel == '' || typeU == '' ||  password == '' || confirm == '')
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else if(!checkLogin(login))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! le login doit etre alphanumérique...");
                $('#formKO').show();
            }
            else if (!validateEmail(mail))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner un email valide...");
                $('#formKO').show();
            }
            else if(!checkText(nom) || !checkText(prenom))
            {
               $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez le nom/prénom renseigner n'est pas correcte...");
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
                            $('#OKText').html("Succ&egrave;s ! Votre collaborateur a &eacute;t&eacute; modifié.");
                            $('#formOk').show();
                            $('#formKO').hide();
                        }
                        else if(data == 'password'){
                            $('#KOText').html("Erreur ! Les deux mots de passe sont différent");
                            $('#formOk').hide();
                            $('#formKO').show();
                        }
                        else if(data == 'existe'){
                            $('#KOText').html("Ce identifiant existe déjà");
                            $('#formOk').hide();
                            $('#formKO').show();
                        }
                        else{
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
     <form id="formCompte" action="<?=WEBROOT?>Comptes/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <input type="hidden" value='<?=$view["form"]["id"]?>' name="id">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        <td width="42px" align="left">Nom</td>   
                        <td align="center"><input id="nom" type="text" name="nom" value='<?php if(isset($view['form']['nom'])) echo$view['form']['nom'];?>' placeholder="Nom Du Client">  </td>
                        <td width="42px" align="left">Prenom</td>   
                        <td align="center"><input id="prenom" type="text" name="prenom" value='<?php if(isset($view['form']['prenom'])) echo$view['form']['prenom'];?>'  placeholder="Prenom Du Client">  </td>
                    </tr>
                    <tr>
                        <td width="42px" align="left">N&deg; Tel</td>   
                        <td align="center"><input id="tel" type="text" name="tel" value='<?php if(isset($view['form']['tel'])) echo$view['form']['tel'];?>' placeholder="Numero De Telephone">  </td>
                        <td width="42px" align="left">Mail</td>   
                        <td align="center"><input id="mail" type="email" name="mail" value='<?php if(isset($view['form']['mail'])) echo$view['form']['mail'];?>' placeholder="Adresse Valide">  </td>
                        
                    </tr>
                    <tr>
                        <td width="42px" align="left">Identifiant</td>   
                        <td align="center"><input id="login" type="text" name="login" value='<?php if(isset($view['form']['login'])) echo$view['form']['login'];?>' placeholder="Votre identifiant">  </td>
                        <td width="100px" align="left">Mot de passe</td>   
                        <td align="center">
                            <input id="password" type="password" name="password" placeholder="Votre mot de passe">
                        </td>
                    </tr>
                    <tr>
                        <td width="100px" align="left">Type Utilisateur</td>
                        <td align="center"><select id="typeU" name="typeU">
                            <option value="1" <?php if(isset($view['form']['typeU']) && $view['form']['typeU']==1) echo "selected";?> >Utilisateur</option>
                            <option value="2" <?php if(isset($view['form']['typeU']) && $view['form']['typeU']==2) echo "selected";?>>Intermediaire</option>
                            <option value="3" <?php if(isset($view['form']['typeU']) && $view['form']['typeU']==3) echo "selected";?>>Administrateur</option></select></td>
                        <td width="100px" align="left">Confirmer</td>   
                        <td align="center"><input id="confirm" type="password" name="confirm" placeholder="Confirmer le mot de passe">  </td>
                    </tr>
                </table>
                <input type="submit" name="Ajout_client" value="Enregistrer" class="upper_content_forms_send"/>
        </form>
</div>