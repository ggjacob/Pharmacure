
$(function() {
      $(".js__p_start").simplePopup();
    });

function refresh(){
	$("#data_source").DataTable().ajax.reload();
}

function addTab(title, url){
					if ($('#tt').tabs('exists', title)){
					$('#tt').tabs('select', title);
					} else {
						var content = '<iframe scrolling="auto" id="'+title+'" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
						$('#tt').tabs('add',{
							title:title,
							content:content,
							closable:true	
						});
					}
					document.getElementById("sousgear").style.display='none';	
			}


function MyPopUp(id, width,height,left,top){
		var searchedRule = document.styleSheets[5].cssRules[0];
    	searchedRule.style.width=width;
		searchedRule.style.height=height;

		//if(montest.arguments.length == 2)
    		//optionnel = montest.arguments[1];
		//}

		// pas encore redefini en parametre

		var popup = $(".js__popup");
        var body = $(".js__p_body");

        body.removeClass("js__fadeout");
        popup.removeClass("js__slide_top");

		searchedRule.style.top=top;
        searchedRule.style.left=left;
        
        //document.getElementById("cadrePopUp").className = "popup js__popup";

        //"p_body js__p_body js__fadeout"
        //document.getElementById("PopUpBody").className = "p_body js__p_body";

        //body.removeClass("js__fadeout");
        //popup.removeClass("js__slide_top");

		var iframe = document.getElementById('IframePopUp');
		iframe.className = ""  
		iframe.src= id;
}

function MyPopupClose(){
		
         var popup = $(".js__popup");
         var body = $(".js__p_body");
         popup.addClass("js__slide_top");
         body.addClass("js__fadeout");
         //document.getElementById("cadrePopUp").className = "popup js__popup js__slide_top";
         $("#data_source").DataTable().ajax.reload();		
}

function addTabVentes(title, url){
		if ($('#tt').tabs('exists', title)){
		$('#tt').tabs('select', title);
		} else {
			var content = '<iframe scrolling="auto" id="'+title+'" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
			$('#tt').tabs('add',{
				title:title,
				content:content,
				closable:false	
			});
		}
		$('#tt').tabs('select', "ACCEUIL");	
}

function display_c()
{
	var refresh=1000; // Refresh rate in milli seconds
	mytime=setTimeout('display_ct()',refresh)
}

function display_ct() 
{
	var strcount;
	var x = new Date();
	var x1=x.toUTCString();
	document.getElementById('ct').innerHTML = x1;
	tt=display_c();
 }
 
var ddmenuitem	= 0;
var ddmenuitem2	= 0;
var ddmenuitem3 = 0;
function show_next_step(afficher, masquer,step)
{	
	ddmenuitem = document.getElementById(afficher);
	ddmenuitem2 = document.getElementById(masquer);
	ddmenuitem.style.visibility = 'visible';
	ddmenuitem.style.position = 'relative';
	ddmenuitem2.style.visibility = 'hidden';
	ddmenuitem2.style.position = 'absolute';

	ddmenuitem3 = $("#step_"+step);

	ddmenuitem3.removeClass("step_"+step);
	
    ddmenuitem3.addClass("step_"+step+"_validated");
}

function show_prev_step(afficher, masquer,step)
{	
	ddmenuitem = document.getElementById(afficher);
	ddmenuitem2 = document.getElementById(masquer);
	ddmenuitem.style.visibility = 'visible';
	ddmenuitem.style.position = 'relative';
	ddmenuitem2.style.visibility = 'hidden';
	ddmenuitem2.style.position = 'absolute';

	ddmenuitem3 = $("#step_"+step);

	ddmenuitem3.removeClass("step_"+step+"_validated");
    ddmenuitem3.addClass("step_"+step);
}


function back_to_step1(afficher, masquer,step)
{	
	ddmenuitem = document.getElementById(afficher);
	ddmenuitem2 = document.getElementById(masquer);
	ddmenuitem.style.visibility = 'visible';
	ddmenuitem.style.position = 'relative';
	ddmenuitem2.style.visibility = 'hidden';
	ddmenuitem2.style.position = 'absolute';

	for (var i = 2; i <= 5; i++) {
		ddmenuitem3 = $("#step_"+i);
		ddmenuitem3.removeClass("step_"+i+"_validated");
	    ddmenuitem3.addClass("step_"+i);
	};

	$("#produit").val('');
	submitForm();
	AfficherPanier();

	$("#client").val('');
    submitFormRechercheClient();
    AfficherClient();
}


function show_form(id, action)
{	
	ddmenuitem = document.getElementById(id);
	ddmenuitem2 = document.getElementById(action);
	ddmenuitem.style.visibility = 'visible';
	ddmenuitem.style.position = 'relative';
	ddmenuitem2.style.visibility = 'hidden';
	ddmenuitem2.style.position = 'absolute';
}

function hide_form(id, action)
{	
	ddmenuitem2 = document.getElementById(action);
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'hidden';
	ddmenuitem.style.position = 'absolute';
	ddmenuitem2.style.visibility = 'visible';
	ddmenuitem2.style.position = 'relative';
}

ignoreClick =true;

function afficheMenu(obj,event){
	
	event.stopPropagation();

	var idMenu     = obj.id;
	var idSousMenu = 'sous' + idMenu;
	var sousMenu   = document.getElementById(idSousMenu);
	
	/*****************************************************/
	/**	si le sous-menu correspondant au menu cliqué    **/
	/** est caché alors on l'affiche, sinon on le cache **/
	/*****************************************************/
	if(sousMenu.style.display == "none"){
		sousMenu.style.display = "block";
		ignoreClick = false;
	}
	else{
		sousMenu.style.display = "none";
	}
}


function fermerMenu(){ 
	 var menu = document.getElementById('sousgear');
	 if ( !ignoreClick){
	 	 menu.style.display ='none';
	 	 window.parent.document.getElementById('sousgear').style.display ='none' ; 
	 }
	 //alert("badi");
}

//Permet de vérifier si un email est correcte. Return true si l'email est correcte, false dans le cas contraire
function validateEmail(email) { 
  
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

//Vérifie un numero de téléphone au format malien : 
function checkTel(tel){
    var valide = /^[7|6|2][0-9]\d{6}$/;
    return valide.test(tel);
}

//Vérifie si la chaine contient uniquement du texte
function checkText(txt){
    var reg = /^[a-zA-Z ]+$/;
    return reg.test(txt);
}

//Verifie que la chaine contient uniquement des chiffres
function checkNumber(num){
    var reg = /^[0-9]{1,}(\.|)[0-9]{0,2}$/g;
    return reg.test(num);
}

//Vérifie que la chaine est alphanumérique
function checkLogin(login){
    var reg = /[a-zA-Z0-9]/;
    return reg.test(login);
}

//Ajoute une ligne dans un formulaire
function addline(url){
        $.ajax({
                    url: url,
                    success : function(data){
                        $('.upper_content_forms_table').append(data);
                }
                        
        });
}


//Supprime un element du DataTable
function Suppression(id, type){
    var result = confirm('Voulez-vous supprimer "'+type+'"');
    if(result == true) { 
    $.ajax({
                    type : "POST",
                    url: id,
                    data: $(this).serialize(),
                    success : function(data){
                        
                        if(data == 'success'){ 
                            $("#data_source").DataTable().ajax.reload();   
                        }
                       },
                    error: function(){
                        alert("Erreur d'appel, le formulaire ne peut pas fonctionner");
                    }
                });
    }
}

window.setTimeout(function() {
    $.ajax({
        type: "POST",
        url: 'Commandes/consolidation',
        success: function (data) {
            if (data == 'success') {
                console.log("Certaines commandes sont passées à Valider");
            }
            else{
                console.log("Pas de changements");
            }
        },
        error: function () {
            console.log("Erreur d'appel, le formulaire ne peut pas fonctionner");
        }
    });
    
}, 20000);