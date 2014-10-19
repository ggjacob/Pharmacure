<script type="text/javascript">
    function showArticle(url) {
        if (!$('.article_table').is(":visible")) {
            $('.article_table').show();
            $('.upper_content_forms_send').first().attr('value', 'Cacher articles');
        }
        else {
            $('.article_table').hide()
            $('.upper_content_forms_send').first().attr('value', 'Afficher articles');
        }
    }

    function addline(selector, url) {
        if (!$('.article_table').is(":visible")) {
            $('.article_table').show();
            $('.upper_content_forms_send').first().attr('value', 'Cacher articles');
        }
        $.ajax({
            url: url,
            success: function (data) {
                $('.article_table').append(data);
            }

        });
    }
    function deleteoldline(selector) {
        var url = $(selector).children('input').attr('id');

        $.ajax({
            url: url,
            success: function (data) {
                $(selector).parent('tr').remove();
            }
        });

    }

    function updateline(selector) {
        var bordereau = $('#formCommande').children('input').first().val();
        var url = $(selector).children('input').attr('id');
        var codeBarre = $('.article_table').find('#cb' + url).val();
        var datePeremption = $('.article_table').find('#datep' + url).val();
        var produit = $('.article_table').find('#produit' + url).val();
        console.log(url);
        console.log(codeBarre);
        console.log(bordereau);
        console.log(datePeremption);
        console.log(produit);
        $.ajax({
            type: "POST",
            url: "../modificationArticle",
            data: {bordereau: bordereau, codebarre: codeBarre, dateperemption: datePeremption, produit: produit, id: url},
            datatype: "json",
            success: function (data) {
                if (data == 'success') {
                    $('#OKText').html("Succ&egrave;s ! Le bordereau a &eacute;t&eacute; modifié.");
                    $('#formOk').show();
                    $('#formKO').hide();

                }
                else if (data == 'failed') {
                    $('#KOText').html("Erreur ! Cette commande n'est pas valide");
                    $('#formOk').hide();
                    $('#formKO').show();
                } else {
                    $('#KOText').html("Erreur ! La validation du formulaire à echouée");
                    $('#formOk').hide();
                    $('#formKO').show();
                }
            }
        });

    }
    function deletenewline(selector) {
        $(selector).parent('tr').remove();
    }

    $(function () {
        $("#formCommande").submit(function (event) {
            event.preventDefault();
            var error = false;
            var idproduit = [];
            var quantite = [];
            $('select[name^="idproduit"]').each(function () {
                idproduit.push(this.value);
            });
            $('input[name^="quantite"]').each(function () {
                quantite.push(this.value);
            });

            for (i = 0; i < idproduit.length; i++) {
                if (idproduit[i] == '') {
                    $('#formOk').hide();
                    $('#KOText').html("Erreur ! Veuillez renseigner un produit pour chaque ligne...");
                    $('#formKO').show();
                    error = true;

                }
            }
            for (i = 0; i < quantite.length; i++) {
                if (!checkNumber(quantite[i])) {
                    $('#formOk').hide();
                    $('#KOText').html("Erreur ! Veuillez saisir uniquement un nombre...");
                    $('#formKO').show();
                    error = true;

                }
            }
            if (error == false)
            {
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (data) {

                        if (data == 'success') {
                            $('#OKText').html("Succ&egrave;s ! Le bordereau a &eacute;t&eacute; modifié.");
                            $('#formOk').show();
                            $('#formKO').hide();

                        }
                        else if (data == 'failed') {
                            $('#KOText').html("Erreur ! Cette commande n'est pas valide");
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
<div id="upper_content_forms" style="visibility:visible !important; width:900px;">
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
    <form id="formCommande" action="<?= WEBROOT ?>Commandes/modificationBordereau" method="POST" >
        <?php if ($view['form']['idetat'] == 3): ?>
            <p>Ce bordereau ne peut plus etre modifier</p><br/>
        <?php endif; ?>
        <input type="hidden" name="id" value="<?= $view['bordereau'] ?>">
        <font color="black" size="4">
        <h2 style="text-align:center">Bordereau</h2>
        <br />
        <table class="upper_content_forms_table" style="width:800px;">
            <?php foreach ($view['lignebordereau'] as $key => $l): ?>
                <tr>
                <input type="hidden" name="checkbordereau[]" value="<?php echo $view['lignebordereau'][$key]->id ?>">
                <input type="hidden" name="idproduit[]" value="<?= $l->IdProduit ?>">
                <td width="42px" align="left">Produit Livré</td>
                <td align="center">
                    <select classe="idproduit" style="width:90px; text-overflow: ellipsis;" name="idproduit[]" disabled>
                        <option value="">Select...</option>
                        <?php foreach ($view['produit'] as $produit): ?>
                            <option value="<?= $produit->id ?>" <?php if ($produit->id == $l->IdProduit) echo'selected' ?>> <?= $produit->Libelle ?> </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td width="42px" align="left">Quantité Livré</td>

                <td align="center"><input width="40px" classe="quantite" value="<?= $view['lignebordereau'][$key]->Quantite ?>" type="number" name="quantite[]"  placeholder="Quantité" <?php if ($view['form']['idetat'] == 3) echo 'disabled' ?>></td>

                </tr> 
            <?php endforeach; ?>
        </table>
        <br>
        <table class="article_table" style="display:none">
            <?php if (isset($view['articles'])) foreach ($view['articles'] as $a): ?>
                    <tr>               
                        <td width="42px" align="left">Code barre</td>
                        <td align="center">
                            <input type="hidden" maxlength="15" name="checkArticle[]" value="<?php echo $view['articles'][$key]->id ?>">
                            <input classe="cb" id="cb<?= $a->id ?>" type="text" name="cbarticle[]" placeholder="Code Barre" value="<?= $a->CodeBarre ?>">
                        <td width="42px" align="left">Date de péremption</td>
                        <td align="center" ><input id="datep<?= $a->id ?>" width="40px" classe="date" type="date" name="dateexpiration[]" value="<?= $a->DateExpiration ?>"></td>
                        <td width="42px" align="left">Produit</td>
                        <td align="center">
                            <select classe="idproduit" id="produit<?= $a->id ?>" style="width:90px; text-overflow: ellipsis;" name="idproduitArticle[]">
                                <option value="">Select...</option>';
                                <?php foreach ($view['lignebordereau'] as $l): ?>{
                                    <option value="<?= $l->IdProduit ?>" <?php if ($l->IdProduit == $a->IdProduit) echo 'selected'; ?>><?= $l->Produit->Libelle ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td align="center" <?php if ($view['form']['idetat'] != 3) echo 'onclick="updateline(this)"'; ?>><input id="<?= $a->id ?>" width="40px" type="button" name="updateline" value="Modifier"/></td>
                        <td align="center" <?php if ($view['form']['idetat'] != 3) echo 'onclick="deleteoldline(this)"'; ?>><input id="../suppressionArticle/<?= $a->id ?>" width="40px" type="button" name="deleteoldline" value="Supprimer"/></td>

                    </tr>
                <?php endforeach; ?>
        </table>
        <input class="upper_content_forms_send" id="../afficherArticle/<?php echo $view['bordereau']; ?>" onclick="showArticle(this)" width="50px" type="button" name="showline" value="Afficher articles"/>&nbsp;
        <input class="upper_content_forms_send" id="../addArticle/<?php echo $view['bordereau'] ?>" <?php if ($view['form']['idetat'] != 3) echo 'onclick="addline(this, this.id)"' ?> width="50px" type="button" name="addnewline" value="Ajouter article" <?php if ($view['form']['idetat'] == 3) echo 'disabled' ?>/>&nbsp;
        <input type="submit" name="Modif_commande" value="Enregistrer" class="upper_content_forms_send" <?php if ($view['form']['idetat'] == 3) echo 'disabled' ?>/> 

    </form>
</div>