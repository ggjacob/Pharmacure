<script type="text/javascript">
function deletenewline(selector){
    $(selector).parent('tr').remove();
}
function deleteoldline(selector){
    var url = $(selector).children('input').attr('id');
    console.log(url);
    $.ajax({
                    url: url,
                    success : function(data){
                        $(selector).parent('tr').remove();   
                    }          
            });
    
}
$(function(){
        $("#formCommande").submit(function(event){
            event.preventDefault();
            var error = false;
            var idetat = $("#idetat").val();
            var result = true
            if (idetat == 3 || idetat == 1){
                var result = confirm("Après validation, cette commande ne pourra plus etre modifier. Etes vous sur?");
            }
                if(result == true){
                var msg_alert = 'Merci de selectionner un etat';
                var idproduit = [];
                var quantite = [];
                $('select[name^="idproduit"]').each(function(){ idproduit.push(this.value); });
                $('input[name^="quantite"]').each(function(){ quantite.push(this.value); }); 

                for (i = 0; i < idproduit.length; i++){
                    if (idproduit[i] == ''){
                        $('#formOk').hide();
                        $('#KOText').html("Erreur ! Veuillez renseigner un produit pour chaque ligne...");
                        $('#formKO').show();
                        error = true;

                    }
                }
                for (i = 0; i < quantite.length; i++){
                    if (!checkNumber(quantite[i])){
                        $('#formOk').hide();
                        $('#KOText').html("Erreur ! Veuillez saisir uniquement un nombre...");
                        $('#formKO').show();
                        error = true;

                    }
                }
                if(idetat == '')
                    {
                        $('#formOk').hide();
                        $('#KOText').html("Erreur ! Veuillez selectionn&eacute; un &eacute;tat...");
                        $('#formKO').show();
                    }
                    else if(error == false)
                    {
                        $.ajax({
                            type : "POST",
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            success : function(data){

                                if(data == 'success'){
                                    $('#OKText').html("Succ&egrave;s ! Votre commande a &eacute;t&eacute; modifi&eacu.");
                                    $('#formOk').show();
                                    $('#formKO').hide();

                                }
                                else if(data == 'failed'){
                                    $('#KOText').html("Erreur ! Cette commande n'est pas valide");
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
            }
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
<form id="formCommande" action="<?=WEBROOT?>Commandes/creation" method="POST" >
    <?php if($view['form']['idetat'] != 2):?>
    <p>Cette commande ne peut plus etre modifier</p><br/>
    <?php endif;?>
    <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
    <input type="hidden" value='<?=$view["id"]?>' name="id">
    <font color="black" size="4">
        <table class="upper_content_forms_table" >
            <?php foreach ($view['lignecommande'] as $l):?>
            <tr>
                <td width="42px" align="left">Produit</td>
                <td align="center">
                    <input type="hidden" name="checkproduit[]" value="<?php echo $l->id ?>">
                    <select classe="idproduit" style="width:90px; text-overflow: ellipsis;" name="idproduit[]" <?php if($view['form']['idetat'] != 2) echo 'disabled' ?>>
                        <option value="">Select...</option>
                        <?php foreach ($view['produit'] as $produit):?>
                            <option value="<?=$produit->id?>" <?php if($produit->id == $l->IdProduit) echo'selected' ?>> <?=$produit->Libelle?> </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td width="42px" align="left">Quantité</td>   
                <td align="center"><input width="40px" classe="quantite" value="<?=$l->Quantite?>" type="number" name="quantite[]"  placeholder="Quantité" <?php if($view['form']['idetat'] != 2) echo 'disabled' ?>></td>
                <td align="center" <?php if($view['form']['idetat'] == 2) echo 'onclick="deleteoldline(this)"' ?>><input id="../suppressionligne/<?php echo $l->id ?>" width="40px" type="button" name="deletenewline" value="Supprimer" <?php if($view['form']['idetat'] != 2) echo 'disabled' ?>/></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <input type="button" value="Ajouter Produit" onclick="addline('<?=WEBROOT?>Commandes/listeProduit')" class="upper_content_forms_send" <?php if($view['form']['idetat'] != 2) echo 'disabled' ?>/>
        <input type="submit" name="Modif_commande" value="Modifier" class="upper_content_forms_send" <?php if($view['form']['idetat'] != 2) echo 'disabled' ?>/>
        
</form>
</div>