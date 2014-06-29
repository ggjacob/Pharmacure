		<div id="" class="wrapper clearfix">
			<div class="main">
				<div id="contenu">
						<a onclick='$("#retour").html("");' href="#">Annuler</a>
					<h1><?=$view["titre"]?></h1>
					<form action="<?=WEBROOT?>Produits/creation" id="ajouterForm" method="post">

						<input type="hidden" value='<?=$view["form"]["type"]?>' name="type">
						<ul>
							<li>
								<label>Prix</label>
								<input type="text" name='prix' value='<?php if(isset($view['form']['prix'])) echo$view['form']['prix'];?>' placeholder="Saisissezle prix" required>
							</li>
							<li>
								<label>Libelle</label>
								<input type="text" name='libelle' value='<?php if(isset($view['form']['libelle'])) echo$view['form']['libelle'];?>' placeholder="Saisissez le nom du produit" required>
                                                                <?php if(isset($view['erreur']['libelle'])) echo$view['erreur']['libelle'];?>
                                                        </li>
							<li>
								<label>Ordonnance</label>
                                                                <input type="radio" name="ordonnance" value="0" <?php if($view['form']['ordonnance'] != 1){echo 'checked';} ?>>Non  <input type="radio" name="ordonnance" value="1" <?php if($view['form']['ordonnance'] == 1){echo 'checked';} ?>>Oui
							</li>

							<li>
								<label>Conditionnement </label>
								<input type="text" name='conditionnement' value='<?php if(isset($view['form']['conditionnement'])) echo$view['form']['conditionnement'];?>' placeholder="Saisissez le conditonnement" required>
							</li>
							<li>
								<label> </label>
								<span style='color:red;'><?php if(isset($view['erreur']['login'])) echo $view['erreur']['login'];?></span>
							</li>
                                                        <li>
								<label>Taxe </label>
                                                                <select style="width:90px; text-overflow: ellipsis;" name="idtaxe">
                                                                <?php foreach ($view['taxes'] as $taxes):?>
                                                                    <option value="<?=$taxes->id?>" <?php if($view['form']['idtaxe'] == $taxes->id) {echo 'selected';} ?>> <?=$taxes->Libelle?></option>
                                                                <?php endforeach; ?>
                                                                </select>
							</li>
                                                        <li>
								<label>Classe</label>
                                                                <select  style="width:90px; text-overflow: ellipsis;" name="idclasse">
                                                                <?php foreach ($view['classes'] as $classes):?>
                                                                    <option value="<?=$classes->id?>" <?php if($view['form']['idclasse'] == $classes->id) {echo 'selected';} ?>> <?=$classes->Libelle?></option>
                                                                <?php endforeach; ?>
                                                                </select>
							</li>
							<li>
								<label>Commentaire</label>
								<textarea rows="4" cols="50" type="text" name='commentaire'><?php if(isset($view['form']['commentaire'])) echo$view['form']['commentaire'];?></textarea>
							</li>
							
							<li>
								<input type="submit" value="Enregistrer" class="btn3">
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
