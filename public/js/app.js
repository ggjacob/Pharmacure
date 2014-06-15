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
function show_form(id)
{	

	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';
	ddmenuitem.style.position = 'relative';


}

function hide_form(id)
{	

	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'hidden';
	ddmenuitem.style.position = 'absolute';


}