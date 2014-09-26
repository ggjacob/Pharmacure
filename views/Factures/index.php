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
            { "data": "IdClient" },
            { "data": "IdUser" },
            { "data": "IdUserModif" },
            { "data": "TotalHT" },
            { "data": "TotalTTC" },
            { "data": "Date" }
        ],
        scrollY: 400,
        "columnDefs": [
            {
                "title": "Action",
                "targets": [ 0 ],
                "visible": true,
                "searchable": false,
                "mRender": function (data, type, full) {
                return '<a id="infos/'+full["id"]+'" onclick="MyPopUp(this.id,650,230,120,200);return false;" href="#" class="js__p_start"><div class="view_icon_table" onclick="Infos(this.id);return false;"></div><';
    }
            },
            {
                "targets": [ 2 ],
                "visible": false
            },
            {
                "targets": [ 3 ],
                "visible": false
            }
        ]
//        "Paginate":true, // Pagination True 
//        "PaginationType":"full_numbers", // And its type.
//         "iDisplayLength": 10
       
        } );
    } );

</script>
<div class="lower_content" style="font-size:13; top:20px">


<div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes factures</span>
    <a onclick="refresh();return false;" href="#">
        <div class="refresh_icon_table" Onclick=""></div>
    </a>
</div>
    <table id="data_source">
         <thead>
            <tr>
                <th style="width:1px">id</th>
                <th >Client</th>
                <th>IdUser</th>
                <th>IdUser</th>
                <th>Total HT</th>
                <th>Total TTC</th>
                <th>Date</th></tr>     
         </thead>
         <tbody>
        <tbody>
    </table>
</div>

<div  class="p_body js__p_body js__fadeout"></div>
    <div class="popup js__popup js__slide_top">
         <a href="#" class="p_close js__p_close" title="Fermer" onclick="MyPopupClose();return false;">
              <span></span><span></span>
            </a>
          <iframe id="IframePopUp" width="100%" height="100%" scrolling="yes" src=""></iframe>
    </div>
