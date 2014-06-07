<form action="" id="rechercheForm" method="post">	
		<div id="recherche">
			
			<input type="text" name='mot' id='mot' placeholder='mot clés'>
			<select id='categorie'  name='categorie' class="liste"  required>
				<option value='000'>Catégorie</option>
				<?php foreach($view['categories'] as $categorie) : ?>
				<option value='<?=$categorie->id?>' <?php if(isset($view['form']['categorie']) and $view['form']['categorie'] == $categorie->id ) echo 'selected';?> >
				<?=utf8_encode($categorie->nom)?>				
				</option>
				<?php endforeach;?>
			</select>
			

			<select id='region' name='region' class="liste"  required>
				<option value='000'>Région</option>
				<?php foreach($view['regions'] as $region) : ?>
				<option value='<?=$region->id?>' <?php if(isset($view['form']['region']) and $view['form']['region'] == $region->id ) echo 'selected';?> >
				<?=utf8_encode($region->nom)?>				
				</option>
				<?php endforeach;?>
			</select>

			<select id='ville' name='ville' class="liste"  required>
				<option value="000">Ville</option>
			</select>

			<div>
				<b>Prix : </b> De <span id="prix_min"></span> à <span id="prix_max"></span> €
    		</div>
    		<div id="slider_prix"></div>
    		

			<!--<input type="text" name='prixmin' value='<?php if(isset($view['form']['prixmin'])) echo$view['form']['prixmin'];?>' placeholder="Prix min">
			<input type="text" name='prixmax' value='<?php if(isset($view['form']['prixmax'])) echo$view['form']['prixmax'];?>' placeholder="Prix max">
			<input type="submit" value="Rechercher" class="btn3">-->
		</div>
</form>
