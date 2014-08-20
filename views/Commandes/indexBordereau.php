<script type="text/javascript">

$(function(){
        $("#formCommande").submit(function(event){
            var error = false;
            var msg_alert = 'Merci de selectionner un etat';
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
                                $('#OKText').html("Succ&egrave;s ! Votre commande a &eacute;t&eacute; modifié.");
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
    <font color="black" size="4">
    <h2 style="text-align:center">Bordereau</h2>
    <br />
        <table class="upper_content_forms_table" >
            <?php foreach ($view['lignecommande'] as $l):?>
            <tr>
                <td width="42px" align="left">Produit Commandé</td>
                <td align="center">
                    <p><?php echo $l->Produit->Libelle ?> </p>
                </td>
                <td width="42px" align="left">Quantité commandé</td>   
                <td align="center"><?php echo $l->Quantite ?></td>
            </tr>
            <tr>
                <td width="42px" align="left">Produit Livré</td>
                <td align="center">
                    <input type="hidden" name="checkproduit[]" value="<?php echo $l->id ?>">
                    <input type="text" name="libelleproduit[]" value="<?=$l->Produit->Libelle?>" placeholder="Libelle"
                </td>
                <td width="42px" align="left">Quantité</td>   
                <td align="center"><input width="40px" classe="quantite" value="<?=$l->Quantite?>" type="number" name="quantite[]"  placeholder="Quantité"></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <input type="submit" name="Modif_commande" value="Modifier" class="upper_content_forms_send"/>
        
</form>
</div>