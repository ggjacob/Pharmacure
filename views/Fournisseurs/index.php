<div id="form_action" class="add_fournisseur" onClick="show_form('upper_content_forms', 'form_action')"></div>
<div id="upper_content_forms" >
    <div class="hide_form" onClick="hide_form('upper_content_forms', 'form_action')"></div>
        <form action="<?=WEBROOT?>Clients/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        <td width="42px" align="left">Libelle</td>   
                        <td align="center"><input type="text" name="nom" placeholder="Nom Du Fournisseur"  required>  </td>
                        <td width="42px" align="left">Adresse</td>   
                        <td align="center"><input type="text" name="adresse" placeholder="Adresse Du Fournisseur" required>  </td>
                    </tr>
                    <tr>
                        <td width="42px" align="left">N&deg; Tel</td>   
                        <td align="center"><input type="text" name="tel" placeholder="Numero De Telephone" required>  </td>
                        <td width="42px" align="left">Mail</td>   
                        <td align="center"><input type="email" name="mail" placeholder="Adresse Valide" required>  </td>
                    </tr>
                </table>
                <textarea name="commentaire"  id="message" cols="50" rows="6" placeholder="Veuillez Taper Un Commentaire"></textarea><br>
                <input type="submit" name="Ajout_client" value="Ajouter" class="upper_content_forms_send"/>
        </form>
</div>


<div class="lower_content" style="font-size:13; top:20px">
<div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes Fournisseurs</span></div>
        <table id="data_source">
                         <thead>
                            <tr ><th>Action</th><th>Libelle</th><th >Tel</th>  <th >Mail</th></tr>    
                         </thead>
                         <tbody>
                        <?php foreach($view['fournisseurs'] as $fournisseur) : ?>
                             <tr>
                                <td width="110px" class="center">
                                    <a id="<?=WEBROOT?>Fournisseurs/infos/<?=$fournisseur->id?>" onclick="MyPopUp(this.id,800,230)" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a>
                                    <a id="<?=WEBROOT?>Fournisseurs/modification/<?=$fournisseur->id?>" onclick="MyPopUp(this.id,800,230)" href="#" class="js__p_start"><div class="modif_icon_table" ></div></a>
                                    <a href="<?=WEBROOT?>Fournisseurs/suppression/<?=$fournisseur->id?>"><div class="remove_icon_table"></div></a>
                                </td>
                                <td ><?=$fournisseur->Libelle?></td>
                                <td><?=$fournisseur->Tel?></td>
                                <td><?=$fournisseur->Mail?></td> 
                            </tr>
                        <?php endforeach;?>
                             <div class="p_body js__p_body js__fadeout"></div>
                                <div id="cadrePopUp" class="popup js__popup js__slide_top">
                                    <a href="#" class="p_close js__p_close" title="Fermer">
                                      <span></span><span></span>
                                    </a>
                                    <iframe id="IframePopUp" width="100%" height="100%" scrolling="no" src=""></iframe>
                            </div>
                        <tbody>
        </table>
</div>

