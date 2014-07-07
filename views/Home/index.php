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
<div class="lower_content" >
  <div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes Produits</span></div>
  <table id="data_source">
    <thead>
      <tr ><th>Id</th><th>Prenom</th><th >Nom</th><th>Mail</th><th>Tel</th><th>Commentaires</th></tr>    
    </thead>
    <tbody>
      <?php foreach($view['clients'] as $client) : ?>
        <tr><td class="center"><?=$client->id?></td><td><?=$client->Prenom?></td><td><?=$client->Nom?></td><td><?=$client->Mail?></td><td><?=$client->Tel?></td><td><?=$client->Commentaire?></td></tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>