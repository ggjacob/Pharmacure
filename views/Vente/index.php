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
            { "data": "Nom" },
            { "data": "Prenom" },
            { "data": "Mail" },
            { "data": "Tel" },
            { "data": "Commentaire" }
        ],
        scrollY: 400,
        "columnDefs": [
            {
                "title": "Action",
                "targets": [ 0 ],
                "visible": true,
                "searchable": false,
                "mRender": function (data, type, full) {
                return '<a id="infos/'+full["id"]+'" onclick="MyPopUp(this.id,800,230,120,250)" href="#" class="js__p_start"><div class="view_icon_table" Onclick=""></div></a><a id="modification/'+full["id"]+'" onclick="MyPopUp(this.id,800,270,120,250)" href="#" class="js__p_start"><div class="modif_icon_table"></div></a><a id="suppression/'+full["id"]+'" onclick="Suppression(this.id)" href="#" class="js__p_start"><div class="remove_icon_table"></div></a>';
    }
            },
            {
                "targets": [ 5 ],
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

jQuery(document).ready(function($){
    
    
    function submitForm(){
        // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        //e.preventDefault();
                $.ajax({
                type: "POST",
                url: $("#formRecherche").attr('action'),
                data: $("#formRecherche").serialize(),
                dataType: 'html',
                success: function(data) {
                    $('#retour').html('');
                    $("#retour").append(data);
                    $('#retour').fadeIn();                            
                }
            });
    }
    
    /* Bind events form submit */
    //$('#produit').change( function(event){ submitForm(); });
    $('#classe').change(    function(event){ submitForm(); });
    $('#produit').change(    function(event){ submitForm(); });
    $('#produit').keyup(    function(event){ submitForm(); });
    
    $('#formRecherche').submit(function(e){
        // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        e.preventDefault();
    });
});



/*
$(function(){
        $("#formClient").submit(function(event){
            var nom             = $("#nom").val();
            var prenom          = $("#prenom").val();
            var tel             = $("#tel").val();
            var email           = $("#mail").val();
            var commentaire     = $("#commentaire").val();
            var msg_all         = 'Merci de remplir tous les champs';
            var msg_alert       = 'Merci de remplir ce champs';
            
            
            if(nom == '' || prenom == '' || tel == '' || email == '')
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner tous les champs requis...");
                $('#formKO').show();
            }
            else if(!checkText(nom) || !checkText(prenom))
            {
               $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez le nom/prénom renseigner n'est pas correcte...");
                $('#formKO').show(); 
            }
            else if (!validateEmail(email))
            {
                $('#formOk').hide();
                $('#KOText').html("Erreur ! Veuillez renseigner un email valide...");
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
                            $('#OKText').html("Succ&egrave;s ! Votre client a &eacute;t&eacute; enregistr&eacute;.");
                            $('#formOk').show();
                            $('#formKO').hide();
                            $("#formClient").get(0).reset();
                            
                        }
                        else if(data == 'failed'){
                            $('#KOText').html("Erreur ! Ce numero de téléphone existe déjà");
                            $('#formOk').hide();
                            $('#formKO').show();         
                        }else{
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
*/
</script>
<div class="category">
    <span class="category_title">Choisissez les produits</span>
    <div class="sub_category">
        <form id="formRecherche" action="<?=WEBROOT?>Vente/rechercher" method="post">
			<font color="black" size="4">
				<table  border="0px" width="600px">
					<tr>
						<td width="100px" align="left">Medicament</td>	<td align="center"><input type="text"  id="produit" name="produit" placeholder="Libelle du medicament">	</td>
					</tr>
					<!--
					<tr>
						<td width="100px" align="left">Type</td>	<td align="center"><input type="text" id ="classe" name="classe" placeholder="Classe pharmaceutique">	</td>
					</tr>
					!-->
					<tr>
						<div id="retour">
						<i></i>
						</div>
					</tr>
				</table>
			</font>
		</form>
    </div>
</div>

<div class="category">
    <span class="category_title">Finaliser votre vente</span>
    <div class="sub_category">
        <form action="<?=WEBROOT?>Ventes/enregistrer" method="post">
			<font color="black" size="4">
				<table id="sale_table" width="600px" >
				 	<tr width="100%"><th>Id</th><th>Article</th><th>prix</th>  <th width="15px">Quantité</th></tr>
				 	<tr ><td align="center">4563</td><td align="center">Article 1</td><td  align="right">350 CFA</td>  <td align="center" style=" border-top-style:solid;border-top-width:1px;">x1</td></tr>
				 	<tr ><td align="center">7364</td><td align="center">Article 2</td><td  align="right">1 5000 CFA</td>  <td align="center">x2</td></tr>
				 	<tr ><td align="center">9034</td><td align="center">Article 3</td><td  align="right">2 0000 CFA</td>  <td align="center">x2</td></tr>
				 	<tr ><td align="center">8374</td><td align="center">Article 4</td><td  align="right">200 CFA</td>  <td align="center">x5</td></tr>
				</table>
				<input type="submit" name="Valider" value="Valider" id="send"/>
			</font>
		</form>
    </div>
</div>
<!-- 
<table id="sale_table" width="600px" >
 	<tr width="100%"><th>Id</th><th>Article</th><th>prix</th>  <th width="15px">Quantité</th></tr>
 	<tr ><td align="center">4563</td><td align="center">Article 1</td><td style="border-right-style:hidden;" align="right">350 CFA</td>  <td align="center" style=" border-top-style:solid;border-top-width:1px;">x1</td></tr>
 	<tr ><td align="center">7364</td><td align="center">Article 2</td><td style="border-right-style:hidden;" align="right">1 5000 CFA</td>  <td align="center">x2</td></tr>
 	<tr ><td align="center">9034</td><td align="center">Article 3</td><td style="border-right-style:hidden;" align="right">2 0000 CFA</td>  <td align="center">x2</td></tr>
 	<tr ><td align="center">8374</td><td align="center">Article 4</td><td style="border-right-style:hidden;" align="right">200 CFA</td>  <td align="center">x5</td></tr>
</table>
!-->