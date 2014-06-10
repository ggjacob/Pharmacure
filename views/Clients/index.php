
<script type="text/javascript">
    $(document).ready( function () {
       $('#data_source').DataTable( {
        scrollY: 400,
        language: {
        processing:     "Traitement en cours...",
        search:         "Rechercher&nbsp;:",
        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
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
    }
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
                                            <td>Ajouter Un Client
                                            </td>
                                            <td>Ajouter Un Produit
                                            </td>
                                            <td>Alerte
                                            </td>
                                            <td>Rapport
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><div class="info_box_blue"></div></td>
                                            <td><div class="info_box_green"></div></td>
                                            <td><div class="info_box_red"></div></td>
                                            <td><div class="info_box_marine"></div></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="lower_content">
                                    <div class="table_header"><span class="table_title">Mes clients</span></div>
                                    <table id="data_source"  width="750px">
                                         <thead>
                                            <tr ><th>Id</th><th>Prenom</th>   <th >Nom</th>  <th >Mail</th><th>Tel</th> <th >Commentaires</th></tr>    
                                         </thead>
                                         <tbody>
                                        <?php foreach($view['clients'] as $client) : ?>
                                                <tr><td><?=$client->id?></td>  <td><?=$client->Prenom?></td> <td><?=$client->Nom?></td><td><?=$client->Mail?></td> <td><?=$client->Tel?></td> <td><?=$client->Commentaire?></td></tr>
                                        <?php endforeach;?>
                                        <tbody>
                                    </table>
</div>
