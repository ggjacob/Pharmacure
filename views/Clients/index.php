
<link rel="stylesheet" href="<?=WEBROOT?>public/css/style.css">
        <link rel="stylesheet" href="<?=WEBROOT?>public/css/tab.css">

        <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/icon.css">


        <script type="text/javascript" src="<?=WEBROOT?>public/js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="<?=WEBROOT?>public/js/app.js"></script>
<script type="text/javascript">
function ajoutClient(){
            $.ajax({
                type: "POST",
                url: 'creation',
                dataType: 'html',
                success: function(data) {
                    $('#retour').html('');
                    $("#retour").append(data);
                    $('#retour').fadeIn();                                
                }
            });       
    }
function modifClient(id){
            $.ajax({
                type: "GET",
                url: 'mesinfos/'+id,
                dataType: 'html',
                success: function(data) {
                    $('#modifier').html('');
                    $("#modifier").append(data);
                    $('#modifier').fadeIn();
                }
            });       
    }

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
                                    <div class="table_header"><span class="table_title">Mes produits</span></div>
                                     <div class="table_header_sub"> 
                       <form>
                        <select name="view_number" size="1"> 
                          <option>10</option>
                          <option>20</option>
                          <option>30</option>
                          <option>40</option>
                          <option>50</option>
                        </select> Affichage Par Page
                        <span class="left">Recherche: <input type="text"/></span>
                      </form>
                    </div>
                                    <table width="750px">
                                        <tr ><th width="50px">Id</th><th width="75px">Prenom</th>   <th width="75px">Nom</th>  <th width="75px">Mail</th><th width="75px">Tel</th> <th width="75px">Commentaires</th></tr>
                                        <?php foreach($view['clients'] as $client) : ?>
                                                <tr><td><?=$client->id?></td>  <td><?=$client->Prenom?></td> <td><?=$client->Nom?></td><td><?=$client->Mail?></td> <td><?=$client->Tel?></td> <td><?=$client->Commentaire?></td></tr>
                                        <?php endforeach;?>
                                    </table>
</div>
