<div id="form_action" class="add_client" onclick="show_form('upper_content_forms', 'form_action')"></div>
<div id="upper_content_forms">

<form action="<?=WEBROOT?>Clients/creation" method="post" >
    <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
    <input type="hidden" value='<?=$view["id"]?>' name="id">
    <font color="black" size="4">
        <table class="upper_content_forms_table" >
            <tr>
                <td width="42px" align="left">Nom</td>   
                <td align="center"><input type="text" name="nom" value='<?php if(isset($view['form']['nom'])) echo$view['form']['nom'];?>' placeholder="Nom Du Client"  required>  </td>
                <td width="42px" align="left">Prenom</td>   
                <td align="center"><input type="text" name="prenom" value='<?php if(isset($view['form']['prenom'])) echo$view['form']['prenom'];?>' placeholder="Prenom Du Client" required>  </td>
            </tr>
            <tr>
                <td width="42px" align="left">N&deg; Tel</td>   
                <td align="center"><input type="text" name="tel" value='<?php if(isset($view['form']['tel'])) echo$view['form']['tel'];?>' placeholder="Numero De Telephone">  </td>
                <td width="42px" align="left">Mail</td>   
                <td align="center"><input type="email" name="mail" value='<?php if(isset($view['form']['mail'])) echo$view['form']['mail'];?>' placeholder="Adresse Valide">  </td>
            </tr>
        </table>
        <textarea name="commentaire"  id="message" cols="50" rows="6"  placeholder="Veuillez Taper Un Commentaire"><?php if(isset($view['form']['commentaire'])) echo$view['form']['commentaire'];?></textarea><br>
        <input type="submit" name="Ajout_client" value="Ajouter" class="upper_content_forms_send"/>
</form>
</div>