<ul id="featured" class="wrapper clearfix">
	<h1><?=$view['titre']?></h1>
	<?php foreach($view['users'] as $user) : ?>
				</br>
				<?=$user->Nom?> 
				</br>
				<?=$user->Prenom?> 
				</br>
				<?=$user->Tel?> 
				</br>
				-----------------------------------------------------------------
<?php endforeach;?>
</ul>