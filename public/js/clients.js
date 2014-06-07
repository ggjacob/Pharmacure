jQuery(document).ready(function($){
    
    function submitForm(){
        // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        //e.preventDefault();
         
            
            var ville = $("#ville").val(); // on récupère la valeur de la région
            //$('#retour').hide();
            $.ajax({
                type: "POST",
                url: 'annonces/filtrer',
                data: ({'id_ville' : $("#ville").val(),
                        'prix_min' : $("#slider_prix").slider("values", 0),
                        'prix_max' : $("#slider_prix").slider("values", 1),
                        'id_categorie' : $("#categorie").val(),
                        'mot' : $("#mot").val(),
                        'id_region' : $("#region").val()}), // on envoie $_GET['id_region']
                dataType: 'html',
                success: function(data) {
                    $('#retour').html('');
                    $("#retour").append(data);
                    $('#retour').fadeIn();                       
                    
                }
            });
    }


        // Création d'un slider dans l'élément id slider_prix
        $("#slider_prix").slider({
            range:  true,
            min:    0,          // valeur min
            max:    10000,       // valeur max
            values: [0,0],   // position des 2 curseurs à l'initialisation
             
            // Action à effectuer lorsqu'on déplace l'un des curseur
            

            slide: function(event, ui){
                $('#prix_min').html(ui.values[0]);
                $('#prix_max').html(ui.values[1]);
            },
            change: function(event, ui){ submitForm(); }
           
        });
     
    // Initialisation des valeurs numériques au chargement de la page
    $('#prix_min').html($("#slider_prix").slider("values", 0));
    $('#prix_max').html($("#slider_prix").slider("values", 1));


    /* Bind events form submit */
    $('#region').change( function(event){ submitForm(); });
    $('#ville').change(    function(event){ submitForm(); });
    $('#categorie').change(    function(event){ submitForm(); });
    $('#mot').change(    function(event){ submitForm(); });
    $('#mot').keyup(    function(event){ submitForm(); });
    keydown
    $('#form').submit(function(e){
        // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        e.preventDefault();
    });
});
