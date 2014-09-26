<script type="text/javascript">
$(document).ready( function () {
       $('#data_source').DataTable( {
        
        language: {
        processing:     "Traitement en cours...",
        search:         "Rechercher&nbsp;:",
        lengthMenu:    "    _MENU_ Affichage  par page",
        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Chargement en cours...",
        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        paginate: {
            first:      "Premier",
            previous:   "Pr&eacute;c&eacute;dent",
            next:       "Suivant",
            last:       "Dernier"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    },
    "serverSide": false, //Ne pas mettre sur true, cela break la pagination
        "ajax":"data",
         "columns": [
            { "data": "id" },
            { "data": "Libelle" },
            { "data": "PrixAT" },
            { "data": "Prix" },
            { "data": "Ordonnance" },
            { "data": "Commentaire" },
            { "data": "Alerte" },
            { "data": "Conditionnement" },
            { "data": "IdClasse" },
            { "data": "IdTaxe" },
        ],
        scrollY: 400,
        "columnDefs": [
            {
                "title": "Action",
                "targets": [ 0 ],
                "visible": true,
                "searchable": false,
                "mRender": function (data, type, full) {
                return '<a id="infos/'+full["id"]+'" onclick="MyPopUp(this.id,800,230,120,250);return false;" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a><a id="modification/'+full["id"]+'" onclick="MyPopUp(this.id,800,350,120,250);return false;" href="#" class="js__p_start"><div class="modif_icon_table"></div></a><a id="suppression/'+full["id"]+'" name ="'+full["Libelle"]+'" onclick="Suppression(this.id, this.name);return false;" href="#" class="js__p_start"><div class="remove_icon_table"></div></a>';
    }
            },
            {
                "targets": [ 6 ],
                "visible": false
            },
            {
                "targets": [ 4 ],
                "mRender": function (data, type, full) {
                if(full['Ordonnance'] == true){
                    return "Oui";
                }else return "non";
            }
                
            },
            {
                "targets": [ 5 ],
                "visible": false
            },
            {
                "targets": [ 7 ],
                "visible": false
            },
            {
                "targets": [ 8 ],
                "visible": false
            },
            {
                "targets": [ 9 ],
                "visible": false
            }
        ]
//        "Paginate":true, // Pagination True 
//        "PaginationType":"full_numbers", // And its type.
//         "iDisplayLength": 10
       
        } );
    } );
$(function(){
        $("#formProduit").submit(function(event){
            var libelle         = $("#libelle").val();
            var prixAT          = $("#prixAT").val();
            var prix            = $("#prix").val();
            var ordonnance      = $("#ordonnance").val();
            var conditionnement = $("#condtionnement").val();
            var commentaire     = $("#commentaire").val();
            var taxe            = $("#idtaxe").val();
            var classe          = $("#idclasse").val();
            var alerte          = $("#seuil").val();
            
            
            if(libelle == '' || prix == ''  || prixAT == '' || ordonnance == '' || conditionnement == '' 
                || commentaire == '' || taxe == '' || classe == '' || alerte == '' )
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else if (!checkNumber(prix) || !checkNumber(prixAT)  || !checkNumber(alerte))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! le format des prix ou le niveau de l'alerte n'est pas correcte...");
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
                            $('#OKText').html("Succ&egrave;s ! Votre produit a &eacute;t&eacute; enregistr&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
                            $("#formProduit").get(0).reset();
                            $('#data_source').DataTable().ajax.reload();
                        }
                        else if(data == 'failed'){
                            $('#KOText').html("Erreur ! Ce produit existe déjà(libellé");
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
<div id="form_action" class="add_produit" onClick="show_form('upper_content_forms', 'form_action')"></div>
<div id="upper_content_forms" >
    <div class="hide_form" onClick="hide_form('upper_content_forms', 'form_action')"></div>
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
        <form id="formProduit" action="<?=WEBROOT?>Produits/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        
                        <td width="42px" align="left">Libelle</td>   
                        <td align="center"><input id="libelle" type="text" name="libelle" placeholder="Libelle Du Produit">  </td>
                        <td width="42px" align="left">Prix d'achat <br>Prix de vente</td>   
                        <td align="center">
                            <input id="prixAT" type="number" name="prixAT" placeholder="Prix d'achat"><br>
                            <input id="prix" type="number" name="prix" placeholder="Prix de vente HT">
                        </td>
                        
                    </tr>
                    <tr>
                        <td width="42px" align="left"> Ordonnance</td>   
                        <td align="center"><input id type="radio" name="ordonnance" value="0">Non  <input type="radio" name="ordonnance" value="1">Oui  </td>
                        <td width="42px" align="left">Conditionnement</td>   
                        <td align="center"><input id="conditionnement" type="text" name="conditionnement" placeholder="Conditionnement">  </td>
                        
                    </tr>
                    <tr>
                        <td width="42px" align="left">Classe</td>
                        <td align="center">
                            <select id="idclasse" style="width:90px; text-overflow: ellipsis;" name="idclasse">
                                <?php foreach ($view['classes'] as $classes):?>
                                    <option value="<?=$classes->id?>"> <?=$classes->Libelle?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                         <td width="42px" align="left">Taxe</td>
                        <td align="center">
                            <select id="idtaxe" style="width:90px; text-overflow: ellipsis;" name="idtaxe">
                                <?php foreach ($view['taxes'] as $taxes):?>
                                    <option value="<?=$taxes->id?>"> <?=$taxes->Libelle?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Seuil d'alerte</td>
                        <td><input type="number" id="seuil" name="alerte" placeholder="Seuil d'alerte"></td>
                    </tr>
                </table>
                <textarea name="commentaire"  id="commentaire" cols="50" rows="6" placeholder="Veuillez Taper Un Commentaire"></textarea><br>
                <input type="submit" name="Ajout_produit" value="Ajouter" class="upper_content_forms_send"/>
        </form>
</div>

<div class="lower_content" style="font-size:13; top:20px">
<div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes Produits</span>
    <a onclick="refresh();return false;" href="#">
        <div class="refresh_icon_table" Onclick=""></div>
    </a>
</div>
<table id="data_source">
     <thead>
        <tr ><th>id</th><th>Libelle</th><th>Prix d'achat</th><th>Prix</th><th>Ordonnance</th><th>Commentaire</th><th>Alerte</th><th>Conditionnement</th><th>IdClasse</th><th>IdTaxe</th></tr>    
     </thead>
     <tbody>
    <tbody>
</table>
</div>
<div  class="p_body js__p_body js__fadeout">
    </div>
    <div class="popup js__popup js__slide_top">
         <a href="#" class="p_close js__p_close" title="Fermer" onclick="MyPopupClose();return false;">
              <span></span><span></span>
            </a>
          <iframe id="IframePopUp" width="100%" height="100%" scrolling="no" src=""></iframe>
    </div>