function ajoutTab(title){
	alert('<li><a href="#tabs-1">'+nom+'</a></li>');
	$("#tabs ul").append('<li><a href="#tabs-1">'+nom+'</a></li>');
}



function addTab(title, url){
			alert("badi");
			if ($('#tabs').tabs('exists', title)){
				$('#tabs').tabs('select', title);
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tab').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}


jQuery(document).ready(function($) {
		   		$( "#tabs" ).tabs();
		   		
		   		$('.submit').click(function()
				{
				    return false; //Empêche le formulaire d'être soumis
				});
});