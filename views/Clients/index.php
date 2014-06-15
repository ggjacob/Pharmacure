<div id="form_action" class="add_client" onClick="show_form('upper_content_forms')">Clique here</div>
<div id="upper_content_forms" >
    <div class="hide_form" onClick="hide_form('upper_content_forms')"></div>
        <form action="<?=WEBROOT?>Clients/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        <td width="42px" align="left">Nom</td>   
                        <td align="center"><input type="text" name="nom" placeholder="Nom Du Client">  </td>
                        <td width="42px" align="left">Prenom</td>   
                        <td align="center"><input type="text" name="prenom" placeholder="Prenom Du Client">  </td>
                    </tr>
                    <tr>
                        <td width="42px" align="left">N&deg; Tel</td>   
                        <td align="center"><input type="text" name="tel" placeholder="Numero De Telephone">  </td>
                        <td width="42px" align="left">Mail</td>   
                        <td align="center"><input type="email" name="mail" placeholder="Adresse Valide">  </td>
                    </tr>
                </table>
                <textarea name="commentaire"  id="message" cols="50" rows="6" placeholder="Veuillez Taper Un Commentaire"></textarea><br>
                <input type="submit" name="Ajout_client" value="Ajouter" class="upper_content_forms_send"/>
        </form>
</div>

<div class="lower_content" style="font-size:13;">
                                    <div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes clients</span></div>
                                    <table id="data_source">
                         <thead>
                            <tr ><th>Action</th><th>Prenom</th>   <th >Nom</th>  <th >Mail</th><th>Tel</th> <th >Commentaires</th></tr>    
                         </thead>
                         <tbody>
                        <?php foreach($view['clients'] as $client) : ?>
                                <tr><td class="center"><div class="add_icon_table" Onclick="open_infos('Client', <?=$client->id?>)"></div><a href="<?=WEBROOT?>Clients/delete/<?=$client->id?>"><div class="remove_icon_table"></div></a></td>  <td ><?=$client->Prenom?></td> <td><?=$client->Nom?></td><td><?=$client->Mail?></td> <td><?=$client->Tel?></td> <td><?=$client->Commentaire?></td></tr>
                        <?php endforeach;?>
                        <tbody>
                    </table>
</div>
