<div id="upper_content_forms" style="visibility:visible !important;">

<form action="<?=WEBROOT?>Produits/creation" method="post" >
    <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
    <input type="hidden" value='<?=$view["id"]?>' name="id">
    <font color="black" size="4">
        <table class="upper_content_forms_table" >
            <tr>
                <td width="42px" align="left">Libelle</td>   
                <td align="center"><input type="text" name="libelle" value='<?php if(isset($view['form']['libelle'])) echo$view['form']['libelle'];?>' placeholder="Nom Du Produit"  required>  </td>
                <td width="42px" align="left">Prix</td>   
                <td align="center"><input type="text" name="prix" value='<?php if(isset($view['form']['prix'])) echo$view['form']['prix'];?>' placeholder="Prix du produit" required>  </td>
            </tr>
            <tr>
                <td width="42px" align="left">Conditionnement</td>   
                <td align="center"><input type="text" name="tel" value='<?php if(isset($view['form']['tel'])) echo$view['form']['tel'];?>' placeholder="Conditonnement du produit">  </td>
                <td width="42px" align="left">Ordonnance</td>
                <td align="center"><input type="radio" name="ordonnance" value="0" <?php if($view['form']['ordonnance'] != 1){echo 'checked';} ?>>Non  <input type="radio" name="ordonnance" value="1" <?php if($view['form']['ordonnance'] == 1){echo 'checked';} ?>>Oui</td>
            </tr>
            
        </table>
        <textarea name="commentaire"  id="message" cols="50" rows="6"  placeholder="Veuillez Taper Un Commentaire"><?php if(isset($view['form']['commentaire'])) echo$view['form']['commentaire'];?></textarea><br>
        <input type="submit" name="Modif_client" value="Modifier" class="upper_content_forms_send"/>
</form>
</div>

