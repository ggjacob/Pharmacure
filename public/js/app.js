jQuery(document).ready(function($) {
		   		$( "#tabs" ).tabs({
		   			
		   		});
});

$(function() {
      $(".js__p_start").simplePopup();
    });

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


function MyPopUp(id, width,height){
		var searchedRule = document.styleSheets[5].cssRules[0];
    	searchedRule.style.width=width;
		searchedRule.style.height=height;

		//if(montest.arguments.length == 2)
    		//optionnel = montest.arguments[1];
		//}

		// pas encore redefini en parametre
		searchedRule.style.top=-100;
        searchedRule.style.left=500;
        
         document.getElementById("cadrePopUp").className = "popup js__popup";

		var iframe = document.getElementById('IframePopUp');
		iframe.className = ""  
		iframe.src= id;
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