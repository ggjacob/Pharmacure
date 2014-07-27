<script type="text/javascript">
    $(document).ready( function () {
       $('#data_source_panier').DataTable( {
        
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
        "ajax":"afficherPanier",
         "columns": [
            { "data": "id" },
            { "data": "Libelle" },
            { "data": "Prix" },
            { "data": "Quantite" }
        ],
        scrollY: 400,
        "columnDefs": [
            {
                "title": "Quantite",
                "targets": [ 3 ],
                "visible": true,
                "searchable": false,
                "mRender": function (data, type, full) {
                return '<input type="number" value='+ full["Quantite"] +'  id="majQuantite/'+full["id"]+'">';
    }
            },
            {
                "targets": [ 0 ],
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

function panierAjout(id){
	$.ajax({
                    type : "POST",
                    url: id,
                    data: $(this).serialize(),
                    success : function(data){
                        
                        if(data == 'success'){ 
                           //$("#data_source_panier").ajax.url( 'afficherPanier' ).load();
                           $("#data_source_panier").DataTable().ajax.reload();   
                        }
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
}

$('.ajoutPanier').click(function(event){
  event.preventDefault();
});

function test(){
	$("#data_source_panier").DataTable().ajax.reload();   
}
</script>

<a href="#" onclick="test();">dfjdjfdjfj</a>
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
<div class="lower_content" style="font-size:13; top:20px">
        <div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes clients</span></div>
		    <table id="data_source_panier">
		         <thead>
		            <tr><th>id</th><th >Libelle</th><th>Prix</th><th>Quantite</th></tr>     
		         </thead>
		         <tbody>
		        <tbody>
		    </table>
        <form action="<?=WEBROOT?>Ventes/enregistrer" method="post">
			<font color="black" size="4">
				<input type="submit" name="Valider" value="Valider" id="send"/>
			</font>
		</form>
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