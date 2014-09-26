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
        "ajax":"Home/data",
         "columns": [
            { "data": "id" },
            { "data": "Libelle" },
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
                "targets": [ 3 ],
                "mRender": function (data, type, full) {
                if(full['Ordonnance'] == true){
                    return "Oui";
                }else return "non";
                }  
            },
            {
                "targets": [ 0 ],
                "visible": false,
            },
            {
                "targets": [ 4 ],
                "visible": false
            },
            {
                "targets": [ 6 ],
                "visible": false
            },
            {
                "targets": [ 7 ],
                "visible": false
            },
            {
                "targets": [ 8 ],
                "visible": false
            }
        ]
//        "Paginate":true, // Pagination True 
//        "PaginationType":"full_numbers", // And its type.
//         "iDisplayLength": 10
       
        } );
    } );
</script>

<div class="upper_content">
  <table width="100%" height="100%" >
  	<tr height="150px">
  		<td width="200px"><a href="#" name="Clients" onclick='addTab("Clients","<?=WEBROOT?>Clients/index")'><div class="blue_icon"> </div></a></td>
  		<td width="200px"><a href="#" name="Produits"  onclick='addTab("Produits","<?=WEBROOT?>Produits/index")'><div class="green_icon"> </div></a></td>
  		<td width="200px"><a href="#" name="Statistiques" onclick='addTab("Alertes","<?=WEBROOT?>Alertes/index")'><div class="red_icon"> </div></a></td>
  		<td width="200px"><a href="#" name="Statistiques" onclick='addTab("Statistiques","<?=WEBROOT?>Statistiques/index")'><div class="marine_icon"> </div></a></td>
  	</tr>
  	<tr align="center" height="20px">
  		<td>Ajouter Un Client</td>
  		<td>Ajouter Un Produit</td>
  		<td>Alerte</td>
  		<td>Rapport</td>
  	</tr>
  	<tr>
  		<td><div class="info_box_blue"><div class="meter_text">Clients</div><span class="number">34 521</span><div class="meter blue"><span style="width: 34%"></span></div></div></td>
  		<td><div class="info_box_green"><div class="meter_text">Produits</div><span class="number">869</span><div class="meter"><span style="width: 86%"></span></div></div></td>
  		<td><div class="info_box_red"><div class="meter_text">Alertes</div><span class="number">4 444</span><div class="meter red"><span style="width: 44%"></span></div></div></td>
  		<td><div class="info_box_marine"><div class="meter_text">Rapports</div><span class="number">9 000</span><div class="meter marine"><span style="width: 90%"></span></div></div></td>
  	</tr>
  </table>
</div>
<div class="lower_content" style="font-size:13; top:20px">
            <div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes Produits</span>
                <a onclick="refresh();return false;" href="#">
                  <div class="refresh_icon_table" Onclick=""></div>
                </a>
            </div>
              <table id="data_source">
                   <thead>
                      <tr ><th>id</th><th>Libelle</th><th>Prix</th><th>Ordonnance</th><th>Commentaire</th><th>Stock</th><th>Conditionnement</th><th>IdClasse</th><th>IdTaxe</th></tr>    
                   </thead>
                   <tbody>
                  <tbody>
              </table>
</div>