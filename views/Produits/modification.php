<script type="text/javascript">
    $(function () {
        $("#formProduit").submit(function (event) {
            var libelle = $("#libelle").val();
            var prixAT = $("#prixAT").val();
            var prix = $("#prix").val();
            var ordonnance = $("#ordonnance").val();
            var conditionnement = $("#condtionnement").val();
            var commentaire = $("#commentaire").val();
            var taxe = $("#idtaxe").val();
            var classe = $("#idclasse").val();
            var alerte = $("#seuil").val();


            if (libelle == '' || prix == '' || prixAT == '' || ordonnance == '' || conditionnement == ''
                    || commentaire == '' || taxe == '' || classe == '' || alerte == '')
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else if (!checkNumber(prix) || !checkNumber(prixAT) || !checkNumber(alerte))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! le format du prix ou le niveau de l'alerte n'est pas correcte...");
                $('#formKO').show();
            }
            else
            {
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (data) {

                        if (data == 'success') {
                            $('#OKText').html("Succ&egrave;s ! Votre produit a &eacute;t&eacute; modifié.");
                            $('#formOk').show();
                            $('#formKO').hide();
                        }
                        else if (data == 'failed') {
                            $('#KOText').html("Erreur ! Ce produit n'est pas valide");
                            $('#formOk').hide();
                            $('#formKO').show();
                        } else {
                            $('#KOText').html("Erreur ! La validation du formulaire à echouée");
                            $('#formOk').hide();
                            $('#formKO').show();
                        }

                    },
                    error: function () {
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
    <form id="formProduit" action="<?= WEBROOT ?>Produits/creation" method="post" >
        <input type="hidden" value='<?= $view["form"]["type"] ?>' name="type">
        <input type="hidden" value='<?= $view["id"] ?>' name="id">
        <font color="black" size="4">
        <table class="popup_content_forms_table">
            <tr>
                <td width="100px" align="left">Libelle</td>   
                <td align="left"><input id="libelle" type="text" name="libelle" value='<?php if (isset($view['form']['libelle'])) echo$view['form']['libelle']; ?>' placeholder="Nom Du Produit"d>  </td>
            </tr>
            <tr>
                <td width="100px" align="left">Prix d'achat <br>Prix de vente</td>   
                <td align="left">
                    <input id="prixAT" type="text" name="prixAT" value='<?php if (isset($view['form']['prixAT'])) echo$view['form']['prixAT']; ?>' placeholder="Prix d'achat">
                    <input id="prix" type="text" name="prix" value='<?php if (isset($view['form']['prix'])) echo$view['form']['prix']; ?>' placeholder="Prix de vente HT">
                </td>
            </tr>
            <tr>
                <td width="100px" align="left">Ordonnance</td>
                <td align="left"><input id="ordonnance" type="radio" name="ordonnance" value="0" <?php if ($view['form']['ordonnance'] != 1) {
    echo 'checked';
} ?>>Non  <input type="radio" name="ordonnance" value="1" <?php if ($view['form']['ordonnance'] == 1) {
    echo 'checked';
} ?>>Oui</td>
            </tr>
            <tr>
                <td width="100px" align="left">Conditionnement</td>   
                <td align="left"><input id="conditionnement" type="text" name="conditionnement" value='<?php if (isset($view['form']['tel'])) echo$view['form']['tel']; ?>' placeholder="Conditonnement du produit">  </td>               
            </tr>
            <tr>
                <td width="100px" align="left">Classe</td>
                <td align="left">
                    <select id="idclasse" style="width:90px; text-overflow: ellipsis;" name="idclasse">
<?php foreach ($view['classes'] as $classes): ?>
                            <option value="<?= $classes->id ?>" <?php if ($classes->id == $view['form']['idclasse']) echo 'selected' ?>> <?= $classes->Libelle ?></option>
<?php endforeach; ?>
                    </select>
                </td>
            </tr>    
            <tr>
                <td width="100px" align="left">Taxe</td>
                <td align="left">
                    <select id="idtaxe" style="width:90px; text-overflow: ellipsis;" name="idtaxe">
<?php foreach ($view['taxes'] as $taxes): ?>
                            <option value="<?= $taxes->id ?>" <?php if ($taxes->id == $view['form']['idtaxe']) echo 'selected' ?>> <?= $taxes->Libelle ?></option>
<?php endforeach; ?>
                    </select>
                </td>
            </tr> 
            <tr>
                <td>Seuil d'alerte</td>
                <td><input type="number"   id="seuil" name="alerte" placeholder="Seuil d'alerte"value="<?php echo $view['form']['alerte'] ?>"></td>
            </tr>        
        </table>
        <textarea name="commentaire"  id="commentaire" cols="50" rows="6"  placeholder="Veuillez Taper Un Commentaire"><?php if (isset($view['form']['commentaire'])) echo$view['form']['commentaire']; ?></textarea><br>
        <input type="submit" name="Modif_client" value="Enregistrer" class="popup_content_forms_send"/>
    </form>
</div>

