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
            { "data": "Login" },
            { "data": "Password" },
            { "data": "Nom" },
            { "data": "Prenom" },
            { "data": "Mail" },
            { "data": "Tel" },
            { "data": "Type" }
        ],
        scrollY: 400,
        "columnDefs": [
            {
                "title": "Action",
                "targets": [ 0 ],
                "visible": true,
                "searchable": false,
                "mRender": function (data, type, full) {
                return '<a id="infos/'+full["id"]+'" onclick="MyPopUp(this.id,800,230,120,250);return false;" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a><a id="modification/'+full["id"]+'" onclick="MyPopUp(this.id,800,270,120,250);return false;" href="#" class="js__p_start"><div class="modif_icon_table"></div></a><a id="suppression/'+full["id"]+'" name ="'+full["Login"]+'" onclick="Suppression(this.id, this.name);return false;" href="#" class="js__p_start"><div class="remove_icon_table"></div></a>';
    }
            },
            {
                "targets": [ 1 ],
                "visible": false
            },
            {
                "targets": [ 2 ],
                "visible": false
            },
            {
                "targets": [ 7 ],
                "visible": false
            },
            {
                "targets": [ 6 ],
                "visible": false
            }
        ]
//        "Paginate":true, // Pagination True 
//        "PaginationType":"full_numbers", // And its type.
//         "iDisplayLength": 10
       
        } );
    } );
$(function(){
        $("#formCompte").submit(function(event){
            var nom         = $("#nom").val();
            var prenom      = $("#prenom").val();
            var tel         = $("#tel").val();
            var typeU       = $("#typeU").val();
            var mail        = $("#mail").val();
            var login       = $("#login").val();
            var password    = $("#password").val();
            var confirm     = $("#confirm").val();

            if(nom == '' || login == '' || prenom == '' || tel == '' || typeU == '' ||  password == '' || confirm == '')
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else if(!checkLogin(login))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! le login doit etre alphanumérique...");
                $('#formKO').show();
            }
            else if (!validateEmail(mail))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner un email valide...");
                $('#formKO').show();
            }
            else if(!checkText(nom) || !checkText(prenom))
            {
               $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez le nom/prénom renseigner n'est pas correcte...");
                $('#formKO').show(); 
            }
            else
            {
                $.ajax({
                    type : "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success : function(data){
                        
                        if(data == 'success'){
                            $('#OKText').html("Succ&egrave;s ! Votre collaborateur a &eacute;t&eacute; enregistr&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
                            $("#formCompte").get(0).reset();
                            $('#data_source').DataTable().ajax.reload();
                        }
                        else if(data == 'password'){
                            $('#KOText').html("Erreur ! Les deux mots de passe sont différent");
                            $('#formOk').hide();
                            $('#formKO').show();
                        }
                        else if(data == 'existe'){
                            $('#KOText').html("Ce identifiant existe déjà");
                            $('#formOk').hide();
                            $('#formKO').show();
                        }
                        else{
                            $('#KOText').html("Erreur ! La validation du formulaire à echouée");
                            $('#formOk').hide();
                            $('#formKO').show();
                        }
                        
                    },
                    error: function(){
                        $('#formKO').html("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
            }
            return false;
        });
    });
</script>
<div id="form_action" class="add_user" onClick="show_form('upper_content_forms', 'form_action')"></div>
<div id="upper_content_forms" >
    <div class="hide_form" onClick="hide_form('upper_content_forms', 'form_action')"></div>
            <div>
            <div style="display:none;" id="formOk" class="alert alert-icon alert-success">
                <div id="OKText" class="text">
                </div>
            </div>
            <div style="display:none;" id="formKO" class="alert alert-icon alert-danger">
                <div id="KOText" class="text">
                </div>
            </div>
        </div>
        <form id="formCompte" action="<?=WEBROOT?>Comptes/creation" method="post" >
            <input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
            <font color="black" size="4">
                <table class="upper_content_forms_table" >
                    <tr>
                        <td width="42px" align="left">Nom</td>   
                        <td align="center"><input id="nom" type="text" name="nom" placeholder="Nom Du Client">  </td>
                        <td width="42px" align="left">Prenom</td>   
                        <td align="center"><input id="prenom" type="text" name="prenom" placeholder="Prenom Du Client">  </td>
                    </tr>
                    <tr>
                        <td width="42px" align="left">N&deg; Tel</td>   
                        <td align="center"><input id="tel" type="text" name="tel" placeholder="Numero De Telephone">  </td>
                        <td width="42px" align="left">Mail</td>   
                        <td align="center"><input id="mail" type="email" name="mail" placeholder="Adresse Valide">  </td>
                        
                    </tr>
                    <tr>
                        <td width="42px" align="left">Identifiant</td>   
                        <td align="center"><input id="login" type="text" name="login" placeholder="Votre identifiant">  </td>
                        <td width="100px" align="left">Mot de passe</td>   
                        <td align="center">
                            <input id="password" type="password" name="password" placeholder="Votre mot de passe">
                        </td>
                    </tr>
                    <tr>
                        <td width="100px" align="left">Type Utilisateur</td>
                        <td align="center"><select id="typeU" name="typeU">
                            <option value="1">Utilisateur</option>
                            <option value="2">Intermediaire</option>
                            <option value="3">Administrateur</option></select></td>
                        <td width="100px" align="left">Confirmer</td>   
                        <td align="center"><input id="confirm" type="password" name="confirm" placeholder="Confirmer le mot de passe">  </td>
                    </tr>
                </table>
                <input type="submit" name="Ajout_client" value="Ajouter" class="upper_content_forms_send"/>
        </form>
</div>

<div class="lower_content" style="font-size:13; top:20px">

<div class="table_header"><div class="menu_icon"></div><span class="table_title">Utilisateurs</span>
    <a onclick="refresh();return false;" href="#">
        <div class="refresh_icon_table" Onclick=""></div>
    </a>
</div>
    <table id="data_source">
         <thead>
            <tr><th>id</th><th>Login</th><th>Password</th><th>Nom</th><th>Prenom</th><th>Mail</th><th>Tel</th><th>Type</th></tr>    
         </thead>
         <tbody>
        <tbody>
    </table>
</div>
<div  class="p_body js__p_body js__fadeout">
    </div>
    <div class="popup js__popup js__slide_top">
         <a href="#" class="p_close js__p_close" title="Fermer" onclick="MyPopupClose();return false;">
              <span></span><span></span>
            </a>
          <iframe id="IframePopUp" width="100%" height="100%" scrolling="no" src=""></iframe>
    </div>