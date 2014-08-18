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
        <table class="upper_content_forms_table" >
            <?php foreach ($view['lignecommande'] as $l):?>
            <tr>
                <td width="42px" align="left">Produit Commandé</td>
                <td align="center">
                    <p><?php echo $l->Libelle ?> </p>
                </td>
                <td width="42px" align="left">Quantité commandé</td>   
                <td align="center"><?php echo $l->Quantite ?></td>
            </tr>
            <tr>
                <td width="42px" align="left">Produit Livré</td>
                <td align="center">
                    <input type="hidden" name="checkproduit[]" value="<?php echo $l->id ?>">
                    <select classe="idproduit" style="width:90px; text-overflow: ellipsis;" name="idproduit[]">
                        <option value="">Select...</option>
                        <?php foreach ($view['produit'] as $produit):?>
                            <option value="<?=$produit->id?>" <?php if($produit->id == $l->IdProduit) echo'selected' ?>> <?=$produit->Libelle?> </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td width="42px" align="left">Quantité</td>   
                <td align="center"><input width="40px" classe="quantite" value="<?=$l->Quantite?>" type="number" name="quantite[]"  placeholder="Quantité"></td>
            </tr>
            <tr>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <input type="submit" name="Modif_commande" value="Modifier" class="upper_content_forms_send"/>
        
</form>
</div>