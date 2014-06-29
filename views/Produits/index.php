<div id="form_action" class="add_produit" onClick="show_form('upper_content_forms', 'form_action')"></div>
<div id="upper_content_forms" >
    <div class="hide_form" onClick="hide_form('upper_content_forms', 'form_action')"></div>
        <form action="<?=WEBROOT?>Produits/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        
                        <td width="42px" align="left">Libelle</td>   
                        <td align="center"><input type="text" name="libelle" placeholder="Libelle Du Produit"  required>  </td>
                        <td width="42px" align="left">Prix</td>   
                        <td align="center"><input type="number" name="prix" placeholder="Prix du Produit" required>  </td>
                        
                    </tr>
                    <tr>
                        <td width="42px" align="left"> Ordonnance</td>   
                        <td align="center"><input type="radio" name="ordonnance" value="0">Non  <input type="radio" name="ordonnance" value="1">Oui  </td>
                        <td width="42px" align="left">Conditionnement</td>   
                        <td align="center"><input type="text" name="conditionnement" placeholder="Conditionnement">  </td>
                        
                    </tr>
                    <tr>
                        <td width="42px" align="left">Classe</td>
                        <td align="center"><select  style="width:90px; text-overflow: ellipsis;" name="idclasse">
                            <?php foreach ($view['classes'] as $classes):?>
                                <option value="<?=$classes->id?>"> <?=$classes->Libelle?></option>
                            <?php endforeach; ?>
                            </select></td>
                         <td width="42px" align="left">Taxe</td>
                        <td align="center"><select style="width:90px; text-overflow: ellipsis;" name="idtaxe">
                            <?php foreach ($view['taxes'] as $taxes):?>
                                <option value="<?=$taxes->id?>"> <?=$taxes->Libelle?></option>
                            <?php endforeach; ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Seuil d'alerte</td>
                        <td><input type="number" name="alerte" placeholder="Seuil d'alerte" required></td>
                    </tr>
                </table>
                <textarea name="commentaire"  id="message" cols="50" rows="6" placeholder="Veuillez Taper Un Commentaire"></textarea><br>
                <input type="submit" name="Ajout_produit" value="Ajouter" class="upper_content_forms_send"/>
        </form>
</div>

<div class="lower_content" style="font-size:13; top:20px">
                                    <div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes Produits</span></div>
                                    <table id="data_source">
                         <thead>
                            <tr ><th>Action</th><th>Libelle</th><th >Prix</th>  <th >Ordonnance</th></tr>    
                         </thead>
                         <tbody>
                        <?php foreach($view['produits'] as $produit) : ?>
                             <tr>
                                <td width="110px" class="center">
                                    <a id="<?=WEBROOT?>Produits/infos/<?=$produit->id?>" onclick="MyPopUp(this.id,800,230)" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a>
                                    <a id="<?=WEBROOT?>Produits/modification/<?=$produit->id?>" onclick="MyPopUp(this.id,800,230)" href="#" class="js__p_start"><div class="modif_icon_table" ></div></a>
                                    <a href="<?=WEBROOT?>Produits/suppression/<?=$produit->id?>"><div class="remove_icon_table"></div></a>
                                </td>  
                                <td ><?=$produit->Libelle?></td>
                                <td><?=$produit->Prix?></td>
                                <td><?php if($produit->Ordonnance == 1){echo 'Oui';}else {echo 'Non';} ?></td>
                            </tr>
                        <?php endforeach;?>
                             <div class="p_body js__p_body js__fadeout"></div>
                                <div class="popup js__popup js__slide_top">
                                    <a href="#" class="p_close js__p_close" title="Fermer">
                                      <span></span><span></span>
                                    </a>
                                    <iframe id="IframePopUp" width="100%" height="100%" scrolling="no" src=""></iframe>
                            </div>
                        <tbody>
                    </table>
</div>