<script type="text/javascript">

</script>
<div id="form_action" class="add_client" onClick="show_form('upper_content_forms', 'form_action')"></div>
<div id="upper_content_forms" >
    <div class="hide_form" onClick="hide_form('upper_content_forms', 'form_action')"></div>
        <form action="<?=WEBROOT?>Clients/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        <td width="42px" align="left">Nom</td>   
                        <td align="center"><input type="text" name="nom" placeholder="Nom Du Client"  required>  </td>
                        <td width="42px" align="left">Prenom</td>   
                        <td align="center"><input type="text" name="prenom" placeholder="Prenom Du Client" required>  </td>
                    </tr>
                    <tr>
                        <td width="42px" align="left">N&deg; Tel</td>   
                        <td align="center"><input type="text" name="tel" placeholder="Numero De Telephone">  </td>
                        <td width="42px" align="left">Mail</td>   
                        <td align="center"><input type="email" name="mail" placeholder="Adresse Valide">  </td>
                    </tr>
                    <tr>
                        <td width="42px" align="left">Identifiant</td>   
                        <td align="center"><input type="text" name="login" placeholder="Votre identifiant">  </td>
                        <td width="100px" align="left">Mot de passe</td>   
                        <td align="center"><input type="password" name="password" placeholder="Votre mot de passe">  </td>
                    </tr>
                </table>
                <input type="submit" name="Ajout_client" value="Ajouter" class="upper_content_forms_send"/>
        </form>
</div>

<div class="lower_content" style="font-size:13; top:20px">

<div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes clients</span></div>
    <table id="data_source">
         <thead>
            <tr ><th>Action</th><th>id</th>   <th >Nom</th>  <th >Prenom</th><th>Tel</th></tr>    
         </thead>
         <tbody>
             <?php foreach($view['users'] as $user) : ?>
                 <tr>
                  <td width="110px" class="center">
                    <a id="<?=WEBROOT?>Comptes/infos/<?=$user->id?>" onclick="MyPopUp(this.id,800,230)" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a>
                    <a id="<?=WEBROOT?>Comptes/modification/<?=$user->id?>" onclick="MyPopUp(this.id,800,230)" href="#" class="js__p_start"><div class="modif_icon_table"></div></a>
                    <a href="<?=WEBROOT?>Comptes/suppression/<?=$user->id?>"><div class="remove_icon_table"></div></a>
                  </td>
                  <td><?=$user->id?></td>
                  <td><?=$user->Nom?></td>
                  <td><?=$user->Prenom?></td>
                  <td><?=$user->Tel?></td>
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