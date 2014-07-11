<script type="text/javascript">
$(function(){
        $("#formClient").submit(function(event){
            var nom             = $("#nom").val();
            var prenom          = $("#prenom").val();
            var tel             = $("#tel").val();
            var email           = $("#mail").val();
            var commentaire     = $("#mail").val();
            var msg_all         = 'Merci de remplir tous les champs';
            var msg_alert       = 'Merci de remplir ce champs';
            
            
            if(nom == '' || prenom == '')
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
<h1><?=$view['titre']?></h1>
<div id="upper_content_forms" style="visibility:visible !important;">

	<form  id="formClient" action="<?=WEBROOT?>Clients/creation" method="post" >
	            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
	            <font color="black" size="4">
	                <table class="upper_content_forms_table" >
	                    <tr>
	                        <td width="42px" align="left">Nom</td>   
	                        <td align="center"><input type="text" id="nom" name="nom" placeholder="Nom de votre pharmacie">  </td>
	                        <td width="42px" align="left">Adresse</td>   
	                        <td align="center"><input type="text" id="adresse" name="adresse" placeholder="Votre adresse">  </td>
	                    </tr>
	                    <tr>
	                        <td width="42px" align="left">N&deg; Tel</td>   
	                        <td align="center"><input type="text" id="tel" name="tel" placeholder="Numero De Telephone">  </td>
	                        <td width="42px" align="left">Mail de l'administrateur</td>   
	                        <td align="center"><input type="email" id="mail" name="mail" placeholder="Adresse Valide">  </td>
	                    </tr>
	                </table>
	                <input type="submit" name="Ajout_client" value="Ajouter" class="upper_content_forms_send"/>
	</form>
</div>