		<div id="" class="wrapper clearfix">
			<div class="main">
				<div id="contenu">
					<h1>Nouvelle annonce</h1>
					<form action="<?=WEBROOT?>Annonces/ajouter" method="post" enctype="multipart/form-data">
						<input type="hidden" value='<?=$view["form"]['type']?>' name="type">
						<input type="hidden" value='<?php if(isset($view["id_annonce"])) echo $view["id_annonce"];?>' name="id">

						<input type="hidden" value='<?php if(isset($view['fic']["fic1"])) echo $view['fic']["fic1"];?>' name="fic1">
						<input type="hidden" value='<?php if(isset($view['fic']["fic2"])) echo $view['fic']["fic2"];?>' name="fic2">
						<input type="hidden" value='<?php if(isset($view['fic']["fic3"])) echo $view['fic']["fic3"];?>' name="fic3">
						<ul>
							<li>
								<label>Catégorie</label>
								<select name='categorie' required>
									<?php foreach($view['categories'] as $categorie) : ?>
									<option value='<?=$categorie->id?>' <?php if(isset($view['form']['categorie']) and $view['form']['categorie'] == $categorie->id ) echo 'selected';?> >
									<?=utf8_encode($categorie->nom)?>				
									</option>
									<?php endforeach;?>
								</select>
							</li>
							<li>
								<label>Prix</label>
								<input type="text" name='prix' value='<?php if(isset($view['form']['prix'])) echo$view['form']['prix'];?>' placeholder="Saisissez le prix" required>
							</li>
							<li>
								<label>Titre</label>
								<input type="text" name='titre' value='<?php if(isset($view['form']['titre'])) echo$view['form']['titre'];?>' placeholder="Ecrivez le titre" required>
							</li>
							<li>
								<label>Description</label>
								<textarea name='description'  placeholder="Ecrivez la description de votre annonce en détails" required><?php if(isset($view['form']['description'])) echo$view['form']['description'];?></textarea>
							</li>

							<li>
								<label>Région</label>								
								<select <?php if(isset($view['fic']['fic1'])) echo "id='regionAnnoncemodif'"; else echo "id='regionAnnonce'"; ?> name='region' class="liste"  required>
									<option>Région</option>
									<?php foreach($view['regions'] as $region) : ?>
									<option value='<?=$region->id?>' <?php /*if(isset($view['form']['region']) and $view['form']['region'] == $region->id ) echo 'selected';*/?> >
									<?=utf8_encode($region->nom)?>				
									</option>
									<?php endforeach;?>
								</select>
							</li>
							


							<li>
								<label>Code postal</label>
								<select id='ville' name='cp' class="liste"  required>
									<option>Ville</option>
								</select>
							</li>
							<!--  
							<li>
								<label>Ville</label>
								<input type="text" id='ville' readonly='true' name='ville' value='<?php if(isset($view['form']['ville'])) echo$view['form']['ville'];?>' placeholder="Saisissez la ville">
							</li>
							-->
							<li>
								<label>Images</label>
								<input type="file" name='image1' >
							</li>
							<li>
								<label></label>
								<input type="file" name='image2' >
							</li>
							<li>
								<label></label>
								<input type="file" name='image3' >
							</li>
							<li>
								<input type="submit" name="ajouterAnnonce" value="Créer" class="btn3">
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>