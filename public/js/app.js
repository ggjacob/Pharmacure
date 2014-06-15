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
 
jQuery(document).ready(function($) {
		   		$( "#tabs" ).tabs();
		   		
		   		$('.submit').click(function()
				{
				    return false; //Empêche le formulaire d'être soumis
				});
});

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

function open_infos(url){
        window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no')
    }

//Remplace l'action par defaut du clique sur un lien sur les elements du tableau
$( "tr a" ).click(function( event ) {
  event.preventDefault();
  open_infos();
});

//addEventListener("load",function(){
//    var links= document.getElementsByTagName("a");
//    for (var i=0;i<links.length;i++){
//        links[i].addEventListener("click",function(e){
//        open_infos();
//        //prevent event action
//        e.preventDefault();
//        })
//    }
//});

