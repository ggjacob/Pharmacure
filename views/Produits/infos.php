Libelle : <?=$view['produit']->Libelle?><br>
Prix : <?=$view['produit']->Prix?><br>
Taxe : <?=$view['produit']->Taxe->Libelle?> : <?=$view['produit']->Taxe->Taux?>%<br>
Classe pharmaceutique : <?=$view['produit']->Classe->Libelle?><br>
Ordonnance : <?php if($view['produit']->Ordonnance == 1){echo 'Oui';}else {echo 'Non';} ?><br>
Conditionnement : <?=$view['produit']->Conditionnement?><br>
Alerte : <?=$view['produit']->Alerte?><br>
Commentaire : <?=$view['produit']->Commentaire?><br>
