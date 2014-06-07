<ul id="featured" class="wrapper clearfix">
	<h1><?=$view['titre']?></h1>
	<?php foreach($view['annonces'] as $annonce) : ?>
			<div class="photo">
				<img src="<?=WEBROOT?>public/images/<?=$annonce->image1?>" />
			</div>
			<li>
				<?=utf8_encode($annonce->getDate())?>
				<img src="<?=WEBROOT?>public/images/astronaut.jpg" alt="Img" height="204" width="220">
				<h3><a href="<?=WEBROOT?>Annonces/view/<?=$annonce->id?>"><?=utf8_encode($annonce->titre)?></a></h3>
				<p>
					<?=utf8_encode($annonce->description)?> 
				</p>
			</li>
<?php endforeach;?>
</ul>