<script type="text/javascript">
$(function(){
        $("#formInfosPharmacie").submit(function(event){
            var nom             = $("#nom").val();
            var adresse         = $("#adresse").val();
            var tel             = $("#tel").val();
            var email           = $("#mail").val();
            var registre        = $("#registre").val();
            var mobilier        = $("#mobilier").val();
            var fiscale        = $("#fiscale").val();

            if(nom == '' || adresse == '' || tel == '' || mail == '' || registre == '' || mobilier == '' || fiscale == '')
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
                            $('#OKText').html("Succ&egrave;s ! Vos informations ont &eacute;t&eacute; enregistr&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
                            $("#formClient").get(0).reset();
                        }
                        else if(data == 'failed'){
                            $('#KOText').html("Erreur ! Les données n'ont pas été mise à jour");
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
	
    <form  id="formInfosPharmacie" action="<?=WEBROOT?>Administrations/infosModification" method="post" >
	            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
	            <font color="black" size="4">
	                <table class="upper_content_forms_table" >
	                    <tr>
	                        <td width="200px" align="left">Nom</td>   

	                        <td align="center"><input type="text" id="nom" name="nom" value='<?=$view["infos"]->{"nom"}?>' placeholder="Nom de votre pharmacie">  </td>
	                    </tr>
                        <tr>    
                            <td width="200px" align="left">Adresse</td>   
	                        <td align="center"><input type="text" id="adresse" name="adresse" value='<?=$view["infos"]->{"adresse"}?>' placeholder="Votre adresse">  </td>
	                    </tr>
	                    <tr>
	                        <td width="200px" align="left">N&deg; Tel</td>   
	                        <td align="center"><input type="text" id="tel" name="tel" value='<?=$view["infos"]->{"tel"}?>' placeholder="Numero De Telephone">  </td>
	                    </tr>
                        <tr>    
                            <td width="200px" align="left">Mail administrateur général</td>   
	                        <td align="center"><input type="email" id="mail" name="mail" value='<?=$view["infos"]->{"mail"}?>' placeholder="Adresse Valide">  </td>
	                    </tr>
                    </table>
                        <div class="category">
                            <span class="category_title_legales">Informations légales</span>
                            <div class="sub_category">
                                 <table class="upper_content_forms_table" >
                                        <tr>
                                            <td width="200px" align="left">Numéro du registre de commerce</td>   
                                            <td align="center"><input type="text" id="registre" name="registre" value='<?=$view["infos"]->{"registre"}?>' placeholder="Numero du registre de commerce">  </td>
                                        </tr>   
                                        <tr>
                                            <td width="200px" align="left">Numéro du crédit mobilier</td>   
                                            <td align="center"><input type="text" id="mobilier" name="mobilier" value='<?=$view["infos"]->{"mobilier"}?>' placeholder="Numero du credit mobilier">  </td>
                                        </tr>
                                        <tr>
                                            <td width="200px" align="left">Numéro d'identification Fiscalité</td>   
                                            <td align="center"><input type="text" id="fiscale" name="fiscale" value='<?=$view["infos"]->{"fiscale"}?>' placeholder="Numero d\'identification fiscale">  </td>
                                        </tr>
                                 </table>
                            </div>
                        </div>
	                <input type="submit" name="Ajout_client" value="Mettre à jour" class="upper_content_forms_send"/>
	</form>
</div>