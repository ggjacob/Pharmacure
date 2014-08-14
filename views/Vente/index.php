<script type="text/javascript">

jQuery(document).ready(function($){
    
    
    /* Bind events form submit */
    //$('#produit').change( function(event){ submitForm(); });
    $('#classe').change(    function(event){ submitForm(); });
    $('#produit').change(    function(event){ submitForm(); });
    $('#produit').keyup(    function(event){ submitForm(); });
    //$('.ajoutPanier').onclick(    function(event){ submitForm(); });


    $('#client').change(    function(event){ submitFormRechercheClient(); });
    $('#client').keyup (    function(event){ submitFormRechercheClient(); });

    $('#formRecherche').submit(function(e){
        // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        e.preventDefault();
    });
    $('#formRechercheClient').submit(function(e){
        // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        e.preventDefault();
    });
});


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

function submitFormRechercheClient(){
        
        // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        //e.preventDefault();
                $.ajax({
                type: "POST",
                url: $("#formRechercheClient").attr('action'),
                data: $("#formRechercheClient").serialize(),
                dataType: 'html',
                success: function(data) {
                    $('#retourClient').html('');
                    $("#retourClient").append(data);
                    $('#retourClient').fadeIn();                            
                }
            });
    }



function panierAjout(id){
    $('#produit').blur();
	$.ajax({
                    type : "POST",
                    url: id,
                    data: $(this).serialize(),
                    success : function(data){
                        
                        if(data == 'success'){ 
                           //$("#data_source_panier").ajax.url( 'afficherPanier' ).load();
                           //$("#data_source_panier").DataTable().ajax.reload();
                           //AfficherPanier();
                           //alert("badi");
                           //$(this).removeAttr("href"); 
                           submitForm();
                           AfficherPanier(); 
                        }
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
}


function ajoutClient(id){
    $('#client').blur();
    $.ajax({
                    type : "POST",
                    url: id,
                    data: $(this).serialize(),
                    success : function(data){
                        
                        if(data == 'success'){ 
                           //$("#data_source_panier").ajax.url( 'afficherPanier' ).load();
                           //$("#data_source_panier").DataTable().ajax.reload();
                           //AfficherPanier();
                           //alert("badi");
                           //$(this).removeAttr("href"); 
                           submitFormRechercheClient();
                           AfficherClient(); 
                        }
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
}

function AfficherPanier(){
    $.ajax({
                    type : "POST",
                    url: 'afficherPanier',
                    data: $(this).serialize(),
                    success : function(data){
                             $('#retourPanier').html('');
                            $("#retourPanier").append(data);
                            $('#retourPanier').fadeIn();
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
}

function AfficherRecap(){
    $.ajax({
                    type : "POST",
                    url: 'afficherRecap',
                    data: $(this).serialize(),
                    success : function(data){
                             $('#retourRecap').html('');
                             $('#retourRecap').append(data);
                             $('#retourRecap').fadeIn();
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
}

function AfficherClient(){
    $.ajax({
                    type : "POST",
                    url: 'afficherClient',
                    data: $(this).serialize(),
                    success : function(data){
                            $('#retourClientSelected').html('');
                            $('#retourClientSelected').append(data);
                            $('#retourClientSelected').fadeIn();
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
}

$('.ajoutPanier').click(function(event){
  event.preventDefault();
});

function viderPanier(){
	$.ajax({
                    type : "POST",
                    url: 'creationPanier',
                    data: $(this).serialize(),
                    success : function(data){
                            AfficherPanier();
                            submitForm();
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });   
}


function viderClient(){
    $.ajax({
                    type : "POST",
                    url: 'viderClient',
                    data: $(this).serialize(),
                    success : function(data){
                            AfficherClient();
                            submitFormRechercheClient();
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });   
}

function panierSupprimer(id){
    $.ajax({
                    type : "POST",
                    url: id,
                    data: $(this).serialize(),
                    success : function(data){
                            AfficherPanier();
                            submitForm();
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });   
}

</script>
<div id="sales_dash">
        <div class="sales_step step_1" id="step_1"><span>1</span></div>
        <div class="sales_step step_2" id="step_2"><span>2</span></div>
        <div class="sales_step step_3" id="step_3"><span>3</span></div>
        <div class="sales_step step_4" id="step_4"><span>4</span></div>
        <div class="sales_step step_5" id="step_5"><span>5</span></div>
        <hr class="bar" id="line_1"></hr>
        <hr class="bar" id="line_2"></hr>
        <hr class="bar" id="line_3"></hr>
        <hr class="bar" id="line_4"></hr>
</div>
<div class="SalesContentStep1" id="step1Content">
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
            <span class="category_title">Finalisez votre liste</span>
            <div class="sub_category">
                  <a href="#" onclick="viderPanier();return false;">Vider le panier</a>
                  <div id="retourPanier">
                    <i></i>
                    <table id="sale_table" width="600px" >
                        <tr><th>Action</th><th>Code Barre</th><th>Article</th><th>prix TTC</th></tr>
                    </table>
                    <div style="height:100px;overflow:auto;">
                    <table id="sale_table" width="600px">
                    <?php if(isset($_SESSION['panier'])) : ?>
                        <?php foreach($_SESSION['panier'] as $article) : ?>
                            <tr >
                                <td align="center">
                                <a href="#" class="ajoutPanier" id="supprimerArticle/<?=$article->id?>" onclick="panierSupprimer(this.id);return false;" >Supprimer</a>
                                </td>
                                <td align="center">
                                    <?=$article->CodeBarre?>
                                </td>
                                <td align="center"><?=$article->Produit->Libelle?></td>
                                <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$article->Produit->Prix * ( 1 + ($article->Produit->Taxe->Taux/100))?> f cfa</td>
                                </tr>
                        <?php endforeach;?>
                    <?php endif; ?>                     
                    </table>
                    </div>
                   </div> 
                    <div onClick="show_next_step('step2Content', 'step1Content',2)">Suivant</div>
                  
            </div>
        </div>
</div>
<div class="salesContent" id="step2Content">
    
    <div class="category">
            <span class="category_title">Rechercher votre client</span>
            <div class="sub_category">
                <form id="formRechercheClient" action="<?=WEBROOT?>Vente/rechercherClient" method="post">
                    <font color="black" size="4">
                        <table  border="0px" width="600px">
                            <tr>
                                <td width="100px" align="left">Client</td>  <td align="center"><input type="text"  id="client" name="client" placeholder="Nom | Prenom | tel"> <a href="#"> Créer</a></td>
                            </tr>
                            <!--
                            <tr>
                                <td width="100px" align="left">Type</td>    <td align="center"><input type="text" id ="classe" name="classe" placeholder="Classe pharmaceutique">   </td>
                            </tr>
                            !-->
                            <tr>
                                <div id="retourClient">
                                <i></i>
                                </div>
                            </tr>
                        </table>
                    </font>
                </form>
            </div>
    </div>
    
    <div class="category">
                <span class="category_title">Informations client</span>
                <div class="sub_category">
                    <a href="#" onclick="viderClient();return false;">Désélectionner</a>
                      <div id="retourClientSelected">
                        <table id="sale_table" width="600px" >
                        <tr><th>Nom</th><th>Prenom</th><th>tel</th></tr>
                        </table>
                        <i></i>
                        <div style="height:100px;overflow:auto;">
                        <table id="sale_table" width="600px">
                            <?php if(isset($_SESSION['client'])) : ?>
                                <tr >
                                        <td align="center">
                                            <?=$_SESSION['client']->Nom?>
                                        </td>
                                        <td align="center"><?=$_SESSION['client']->Prenom?></td>
                                        <td align="center" style=" border-top-style:solid;border-top-width:1px;">
                                            <?=$_SESSION['client']->Tel?></td>
                                </tr>
                            <?php endif; ?>                  
                        </table>
                        </div>
                      </div>
                </div>
                <div onClick="show_prev_step('step1Content', 'step2Content',2)">Précédent</div>
                <div onClick="show_next_step('step3Content', 'step2Content',3)">Suivant</div>
    </div> 
</div>
<div class="salesContent" id="step3Content">
    
    <div class="category">
            <span class="category_title">Remboursement medicament</span>
            <div class="sub_category">
                <p>Informations remboursements medicaments</p>
            </div>
    </div>
    
    <div class="category">
                <span class="category_title">Informations client</span>
                <div class="sub_category">
                    Informations pour remboursement du client
                </div>
                <div onClick="show_prev_step('step2Content', 'step3Content',3)">Précédent</div>
                <div onClick="show_next_step('step4Content', 'step3Content',4);AfficherRecap();">Suivant</div>
    </div> 
</div>

<div class="salesContent" id="step4Content">
    
    <div class="category">
            <span class="category_title">Récapitulatif</span>
            <div class="sub_category">
                    <div  id="retourRecap">
                        <i></i>    
                    </div>
            </div>
    </div>
    
    <div class="category">
                <span class="category_title">Informations recap remboursement</span>
                <div class="sub_category">
                    Informations pour remboursement du client
                </div>
                <div onClick="show_prev_step('step3Content', 'step4Content',4)">Précédent</div>
                <div onClick="show_next_step('step5Content', 'step4Content',5)">Suivant</div>
    </div> 
</div>
<div class="salesContent" id="step5Content">
    
    <div class="category">
                <span class="category_title">Félicitation</span>
                <div class="sub_category">
                    Votre vente à été finalisé
                </div>
                <div onClick="show_prev_step('step4Content', 'step5Content',5)">Précédent</div>
                impression facture
    </div> 
</div>
