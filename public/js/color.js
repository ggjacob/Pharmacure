function choixOffre(url){
				var cible = "offres/"+url;
		    	$.ajax({
		                type: "POST",
		                url: cible,
		                data: ({'id_ville' : "badi",
		                        }), // on envoie $_GET['id_region']
		                dataType: 'html',
		                success: function(data) {
		                    $('#retour').html('');
		                    $("#retour").append(data);
		                    $('#retour').fadeIn();                       
		                    
		                }
		        });
    }

    function changecolorover(objet,color){
        li = objet.parentNode;
        ul = li.parentNode; 
        div = ul.parentNode;
        menu = div.parentNode;
        menu.style.backgroundImage = 'url(../images/footer.gif)';
        menu.style.backgroundColor=color; 
    }

    
    function changecolor(objet,color){
    	divToChange = objet.parentNode;
    	
    	divMenu = divToChange.parentNode;
    	all = divMenu.getElementsByTagName("div");
		all[0].style.backgroundColor="white";
		all[1].style.backgroundColor="white";
		all[2].style.backgroundColor="white";
		all[3].style.backgroundColor="white";
		all[4].style.backgroundColor="white";
		all[5].style.backgroundColor="white";
		all[6].style.backgroundColor="white";
		all[7].style.backgroundColor="white";		
		divToChange.style.backgroundColor=color;
    }