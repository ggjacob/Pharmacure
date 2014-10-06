<script type="text/javascript">
$(function(){
        $("#formClient").submit(function(event){
            var nom             = $("#nom").val();
            var prenom          = $("#prenom").val();
            var tel             = $("#tel").val();
            var email           = $("#mail").val();
            var commentaire     = $("#commentaire").val();
            var msg_all         = 'Merci de remplir tous les champs';
            var msg_alert       = 'Merci de remplir ce champs';
            
            
            if(nom == '' || prenom == '')
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else if(!checkText(nom) || !checkText(prenom))
            {
               $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez le nom/prénom renseigner n'est pas correcte...");
                $('#formKO').show(); 
            }
            else if (!validateEmail(email))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner un email valide...");
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
                            $('#OKText').html("Succ&egrave;s ! Votre client a &eacute;t&eacute; modifi&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
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
<div id="popup_content_forms" style="visibility:visible !important;">
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
<form id="formClient" action="<?=WEBROOT?>Clients/creation" method="post" >
    <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
    <input type="hidden" value='<?=$view["id"]?>' name="id">
    <font color="black" size="4">
        <table class="popup_content_forms_table" >
            <tr>
                <td width="80px" align="left">Nom</td>   
                <td align="left"><input type="text" id="nom" name="nom" value='<?php if(isset($view['form']['nom'])) echo$view['form']['nom'];?>' placeholder="Nom Du Client">  </td>
                <td width="80px" align="left">Prenom</td>   
                <td align="left"><input type="text" id="prenom" name="prenom" value='<?php if(isset($view['form']['prenom'])) echo$view['form']['prenom'];?>' placeholder="Prenom Du Client">  </td>
            </tr>
            <tr>
                <td width="80px" align="left">N&deg; Tel</td>   
                <td align="left"><input type="text" id="tel" name="tel" value='<?php if(isset($view['form']['tel'])) echo$view['form']['tel'];?>' placeholder="Numero De Telephone">  </td>
                <td width="80px" align="left">Mail</td>   
                <td align="left"><input type="email"  id ="mail" name="mail" value='<?php if(isset($view['form']['mail'])) echo$view['form']['mail'];?>' placeholder="Adresse Valide">  </td>
            </tr>
        </table>
        <textarea name="commentaire"  id="commentaire" cols="50" rows="6"  placeholder="Veuillez Taper Un Commentaire"><?php if(isset($view['form']['commentaire'])) echo$view['form']['commentaire'];?></textarea><br>
        <input type="submit" name="Modif_client" value="Enregistrer" class="popup_content_forms_send"/>
</form>
</div>