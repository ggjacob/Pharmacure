<script type="text/javascript">
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
function deletenewline(selector){
    $(selector).parent('tr').remove();
}
$(function(){
        $("#formCommande").submit(function(event){
            event.preventDefault();
            var error = false;
            var libelleproduit = [];
            var quantite = [];
            $('select[name^="libelleproduit"]').each(function(){ libelleproduit.push(this.value); });
            $('input[name^="quantite"]').each(function(){ quantite.push(this.value); }); 
            
            for (i = 0; i < libelleproduit.length; i++){
                if (libelleproduit[i] == ''){
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
                if(error == false)
                {
                    $.ajax({
                        type : "POST",
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success : function(data){

                            if(data == 'success'){
                                $('#OKText').html("Succ&egrave;s ! Le bordereau a &eacute;t&eacute; modifié.");
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
<form id="formCommande" action="<?=WEBROOT?>Commandes/modificationBordereau" method="POST" >
    <input type="hidden" name="id" value="<?=$view['bordereau']?>">
    <font color="black" size="4">
    <h2 style="text-align:center">Bordereau</h2>
    <br />
        <table class="upper_content_forms_table" >
            <?php foreach ($view['lignebordereau'] as $key => $l):?>
            <tr>
                <input type="hidden" name="checkbordereau[]" value="<?php echo $view['lignebordereau'][$key]->id ?>">
                <td width="42px" align="left">Article Livré</td>
                <td align="center">
                        <input type="text" name="libelleproduit[]" value="<?=$view['lignebordereau'][$key]->Libelle?>" placeholder="Libelle" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>>
                </td>
                <td width="42px" align="left">Quantité Livré</td>
               
                    <td align="center"><input width="40px" classe="quantite" value="<?=$view['lignebordereau'][$key]->Quantite?>" type="number" name="quantite[]"  placeholder="Quantité" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>></td>
                    <td align="center" <?php if($view['form']['idetat'] != 3) echo 'onclick="deleteoldline(this)"' ?>><input id="../suppressionLigneBordereau/<?php echo $l->id ?>" width="40px" type="button" name="deletenewline" value="Supprimer" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>/></td>

            </tr> 
            <?php endforeach; ?>
        </table>
        <input type="button" value="Ajouter Article" onclick="addline('<?=WEBROOT?>Commandes/addArticle')" class="upper_content_forms_send" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>/>
        <input type="submit" name="Modif_commande" value="Modifier" class="upper_content_forms_send" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>/>
        
</form>
</div>