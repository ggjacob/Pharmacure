<script type="text/javascript">
$(function(){
        $("#formFournisseur").submit(function(event){
            var libelle         = $("#libelle").val();
            var adresse         = $("#adresse").val();
            var tel             = $("#tel").val();
            var mail            = $("#mail").val();
            var commentaire     = $("#commentaire").val();
            var msg_all         = 'Merci de remplir tous les champs';
            var msg_alert       = 'Merci de remplir ce champs';
            
            
            if(libelle == '' || adresse == '' || tel =='' || mail =='')
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else if (!validateEmail(mail))
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
                            $('#OKText').html("Succ&egrave;s ! Votre fournisseur a &eacute;t&eacute; modifi&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
                            $("#formClient").get(0).reset();
                        }
                        else if(data == 'failed'){
                            $('#KOText').html("Erreur ! Ce fournisseur n'est pas valide");
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
<form id="formFournisseur" action="<?=WEBROOT?>Fournisseurs/creation" method="post" >
    <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
    <input type="hidden" value='<?=$view["id"]?>' name="id">
    <font color="black" size="4">
        <table class="popup_content_forms_table" >
            <tr>
                <td width="60px" align="left">Libelle</td>   
                <td align="left"><input id="libelle" type="text" name="libelle" value='<?php if(isset($view['form']['libelle'])) echo$view['form']['libelle'];?>' placeholder="Libelle du fournisseur"  required>  </td>
                <td width="80px" align="left">Adresse</td>   
                <td align="left"><input id="adresse" type="text" name="adresse" value='<?php if(isset($view['form']['adresse'])) echo$view['form']['adresse'];?>' placeholder="adresse du fournisseur" required>  </td>
            </tr>
            <tr>
                <td width="80px" align="left">N&deg; Tel</td>   
                <td align="left"><input id="tel" type="text" name="tel" value='<?php if(isset($view['form']['tel'])) echo$view['form']['tel'];?>' placeholder="Numero De Telephone">  </td>
                <td width="80px" align="left">Mail</td>   
                <td align="left"><input id="mail" type="email" name="mail" value='<?php if(isset($view['form']['mail'])) echo$view['form']['mail'];?>' placeholder="Adresse Valide">  </td>
            </tr>
        </table>
        <textarea name="commentaire"  id="commentaire" cols="50" rows="6"  placeholder="Veuillez Taper Un Commentaire"><?php if(isset($view['form']['commentaire'])) echo$view['form']['commentaire'];?></textarea><br>
        <input type="submit" name="Modif_client" value="Enregistrer" class="popup_content_forms_send"/>
</form>
</div>

