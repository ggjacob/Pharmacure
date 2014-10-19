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
            { "data": "IdUser" },
            { "data": "IdUserModif" },
            { "data": "IdFournisseur" },
            { "data": "IdEtat" },
            { "data": "Date" },
            { "data": "DateModif" },
            { "data": "IdBordereau" }
        ],
        scrollY: 400,
        "columnDefs": [
            {
                "title": "Action",
                "targets": [ 0 ],
                "visible": true,
                "searchable": false,
                "mRender": function (data, type, full) {
                    if(full["IdBordereau"]=='0'){
                        return '<a id="infos/'+full["id"]+'" onclick="MyPopUp(this.id,630,230,120,200);return false;" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a><a id="modification/'+full["id"]+'" onclick="MyPopUp(this.id,800,270,120,250);return false;" href="#" class="js__p_start"><div class="modif_icon_table"></div></a><a id="suppression/'+full["id"]+'" name ="'+full["IdFournisseur"]+'" onclick="Suppression(this.id, this.name);return false;" href="#" class="js__p_start"><div class="remove_icon_table"></div></a><a id="createBordereau/'+full["id"]+'" onclick="newBordereau(this.id);return false;" href="#" class="js__p_start"><div class="bordereau_icon_table"></div></a>';
                    }
                    else
                    {
                        return '<a id="infos/'+full["id"]+'" onclick="MyPopUp(this.id,630,230,120,200);return false;" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a><a id="modification/'+full["id"]+'" onclick="MyPopUp(this.id,800,270,120,250);return false;" href="#" class="js__p_start"><div class="modif_icon_table"></div></a><a id="suppression/'+full["id"]+'" name ="'+full["IdFournisseur"]+'" onclick="Suppression(this.id, this.name);return false;" href="#" class="js__p_start"><div class="remove_icon_table"></div></a>';
                    }
                }
            },
            {
                "title": "Fournisseur",
                "targets": [ 3 ],
                "visible": true,
                "mRender": function (data, type, full) {
                return full["IdFournisseur"];
                }
            },
            {
                "targets": [ 1 ],
                "visible": false
            },
            {
                "targets": [ 2 ],
                "visible": false
            },
            {
                "targets": [ 5 ],
                "visible": false
            },
            {
                "targets": [7],
                "mRender": function (data, type, full) {
                    if (full["IdBordereau"]!='0'){
                        return '<a id="indexBordereau/'+full["id"]+'" onclick="MyPopUp(this.id,900,350,120,250);return false;" href="#" class="js__p_start"><div class="modif_icon_table_bordereau"></div></a>'
                    }
                    else{
                        return '<div class="modif_icon_table_no_bordereau"></div>'
                    }
                }
            }
        ]
//        "Paginate":true, // Pagination True 
//        "PaginationType":"full_numbers", // And its type.
//         "iDisplayLength": 10
       
        } );
        $('#idfournisseur').on('change', function (){
   
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    product_list(valueSelected);
});
    } );

$(function(){
        $("#formCommande").submit(function(event){
            var idfournisseur         = $("#idfournisseur").val();
            var msg_alert       = 'Merci de selectionner un fournisseur';
            
            
            if(idfournisseur == '')
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
                            $('#OKText').html("Succ&egrave;s ! Votre commande a &eacute;t&eacute; enregistr&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
                            $("#formCommande").get(0).reset();
                            $('#data_source').DataTable().ajax.reload();
                            
                        }
                        else if(data == 'failed'){
                            $('#KOText').html("Erreur ! Ce numero de téléphone existe déjà");
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


function product_list(id){
  var list_target_id = 'produit'; //first select list ID
  var initial_target_html = '<option value="">Selectionner un Produit...</option>'; //Initial prompt for target select
 
  $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
 
    //Display 'loading' status in the target select list
    $('#'+list_target_id).html('<option value="">Loading...</option>');
 
      //Make AJAX request, using the selected value as the GET
      $.ajax({url: 'listeProduit/'+id,
             success: function(output) {
                //alert(output);
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }

function newBordereau(idCommande){
    var result = confirm('Un bordereau sera créer pour cette commande. Cliquez sur OK pour valider');
    if(result == true) { 
    $.ajax({
                    type : "POST",
                    url: idCommande,
                    data: $(this).serialize(),
                    success : function(data){
                        
                        if(data == 'success'){
                            alert("Le bordereau à été créer.")
                            $("#data_source").DataTable().ajax.reload();   
                        }
                        else{
                            alert("La commande ne contient pas de produit, le bordereau ne peut etre créer.")
                            $("#data_source").DataTable().ajax.reload();  
                        }
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
    }
}
</script>
<div id="form_action" class="add_commande" onClick="show_form('upper_content_forms', 'form_action');"></div>
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
        <form  id="formCommande" action="<?=WEBROOT?>Commandes/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        <td width="42px" align="left">Fournisseur</td>   
                        <td align="center"><select id="idfournisseur" style="width:190px; text-overflow: ellipsis;" name="idfournisseur">
                                <option value="">Select...</option>
                                <?php foreach ($view['fournisseurs'] as $fournisseurs):?>
                                    <option value="<?=$fournisseurs->id?>"> <?=$fournisseurs->Libelle?></option>
                                <?php endforeach; ?>
                            </select>  </td>
                    </tr>
                    <tr class="product_line" style="display:none;">
                        <td width="42px" align="left">Produit 1</td>   
                        <td align="center"><select name="produit[]" id="list_target_id"> </select> </td>
                        <td width="42px" align="left">Quantite</td>   
                        <td align="center"><input type="number" id="quantite" name="quantite[]" placeholder="Quantité">  </td>
                    </tr>
                </table>
                <input type="submit" name="Ajout_commande" value="Ajouter" class="upper_content_forms_send"/>
        </form>
</div>

<div class="lower_content" style="font-size:13; top:20px">


<div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes commandes</span>
    <a onclick="refresh();return false;" href="#">
        <div class="refresh_icon_table" Onclick=""></div>
    </a>
</div>
    <table id="data_source">
         <thead>
             <tr><th width="130px">id</th><th >IdUser</th><th>IdUserModif</th><th>Fournisseur</th><th>Etat</th><th>Date</th><th>Date</th><th>Bordereau</th></tr>     
         </thead>
         <tbody>
        </tbody>
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