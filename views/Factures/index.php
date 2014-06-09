
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
</ul>
