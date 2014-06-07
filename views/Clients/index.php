<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript">
function ajoutClient(){
            $.ajax({
                type: "POST",
                url: 'creation',
                dataType: 'html',
                success: function(data) {
                    $('#retour').html('');
                    $("#retour").append(data);
                    $('#retour').fadeIn();                                
                }
            });       
    }
function modifClient(id){
            $.ajax({
                type: "GET",
                url: 'mesinfos/'+id,
                dataType: 'html',
                success: function(data) {
                    $('#modifier').html('');
                    $("#modifier").append(data);
                    $('#modifier').fadeIn();
                }
            });       
    }

</script>
<ul id="featured" class="wrapper clearfix">
	<h1><?=$view['titre']?></h1>
	
	
				<a onclick='ajoutClient()' href="#">Ajouter</a> <br>
				<div id="retour">
    			<i></i>
				</div>
				-----------------------------------------------------------------
	<?php foreach($view['clients'] as $client) : ?>
				</br>
				<a href="<?=WEBROOT?>Clients/delete/<?=$client->id?>">Supprimer</a> <br>
				<a onclick='modifClient(<?=$client->id?>)' href="#">Modifier</a> <br>
				
				<?=$client->Nom?> 
				</br>
				<?=$client->Prenom?> 
				</br>
				<?=$client->Tel?>
				<div id="modifier">
				</div> 
				</br>
				-----------------------------------------------------------------
<?php endforeach;?>
</ul>
