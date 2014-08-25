<script type="text/javascript">
function deleteoldline(selector){
    var url = $(selector).children('input').attr('id');
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

function addArticle(){
    
}

$(function(){
        $("#formCommande").submit(function(event){
            event.preventDefault();
            var error = false;
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
                <td width="42px" align="left">Produit Livré</td>
                <td align="center">
                    <select classe="idproduit" style="width:90px; text-overflow: ellipsis;" name="idproduit[]" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>>
                        <option value="">Select...</option>
                        <?php foreach ($view['produit'] as $produit):?>
                            <option value="<?=$produit->id?>" <?php if($produit->id == $l->IdProduit) echo'selected' ?>> <?=$produit->Libelle?> </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td width="42px" align="left">Quantité Livré</td>
               
                    <td align="center"><input width="40px" classe="quantite" value="<?=$view['lignebordereau'][$key]->Quantite?>" type="number" name="quantite[]"  placeholder="Quantité" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>></td>
                    <td align="center"><input id="../afficherArticle/<?php echo $view['bordereau']; ?>"  <?php if($view['form']['idetat'] != 3) echo 'onclick="showArticle(this)"' ?> width="50px" type="button" name="showline" value="Afficher article" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>/>&nbsp;<input id="../ajouterArticle/<?php echo $l->id ?>" <?php if($view['form']['idetat'] != 3) echo 'onclick="addArticle();"' ?> width="50px" type="button" name="addnewline" value="Ajouter article" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>/></td>

            </tr> 
            <?php endforeach; ?>
        </table>
        <input type="submit" name="Modif_commande" value="Modifier" class="upper_content_forms_send" <?php if($view['form']['idetat'] == 3) echo 'disabled' ?>/>
        
</form>
</div>