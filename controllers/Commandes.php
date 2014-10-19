<?php

class Commandes extends Controller {

    /**
     * @UserS('REQUIRED')
     */
    function index() {
        $form['type'] = 'create';
        $fournisseurs = new Fournisseur();
        $fournisseurs = Doctrine_Core::getTable('fournisseur')->findAll();

        $d['view'] = array("titre" => "Gestion des fournisseurs", "fournisseurs" => $fournisseurs, "form" => $form);
        $this->set($d);
        $this->render('index');
    }

    function infos($id) {
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($id);

        $totalHT = 0;
        $totalTTC = 0;
        foreach ($commande->LigneCommandeCommande as $ligne) {
            $totalHT += $ligne->Produit->Prix * $ligne->Quantite;
            $totalTTC += ($ligne->Produit->Prix * ( 1 + ($ligne->Produit->Taxe->Taux / 100))) * $ligne->Quantite;
        }

        $d['view'] = array("commande" => $commande, "totalHT" => $totalHT, "totalTTC" => $totalTTC);
        $this->set($d);
        $this->render('infos');
    }

    function data() {
        $commandes = new Commande();
        $commandes = Doctrine_Core::getTable('commande')->findAll();
        $bordereaux = new Bordereau();
        $bordereaux = Doctrine_Core::getTable('bordereau')->findAll();

        for ($i = 0; $i < $commandes->count(); $i++) {
            $commandes[$i]->IdFournisseur = $commandes[$i]->Fournisseur->Libelle;
            $commandes[$i]->IdEtat = $commandes[$i]->Etat->Libelle;
        }
        $commandes = $commandes->toArray(false);
        foreach ($commandes as $key => $c) {
            $bordereau = new Bordereau();
            $bordereau = Doctrine_Core::getTable('bordereau')->findOneByIdCommande($c['id']);
            if ($bordereau != null) {
                $commandes[$key]['IdBordereau'] = $bordereau->id;
            } else {
                $commandes[$key]['IdBordereau'] = '0';
            }
        }
        $data = array('data' => $commandes);
        //var_dump($commandes);
        $text = json_encode($data);
        echo $text;
    }

    function listeProduit() {
        $produits = new Produit();
        $produits = Doctrine_Core::getTable('produit')->findAll();
        echo '<tr>
                    <td width="42px" align="left">Produit</td>
                    <td align="center">
                    <input type="hidden" name="checkproduit[]" value="0">
                    <select classe="idproduit" style="width:90px; text-overflow: ellipsis;" name="idproduit[]">
                    <option value="">Select...</option>';
        foreach ($produits as $l) {
            echo'<option value="' . $l->id . '">' . $l->Libelle . '</option>';
        }
        echo '</select>
                </td>
                <td width="42px" align="left">Quantité</td>   
                <td align="center"><input width="40px" classe="quantite" type="number" name="quantite[]"  placeholder="Quantité"></td>
                <td align="center" onclick="deletenewline(this)"><input width="40px" type="button" name="deletenewline" value="Supprimer"/></td>
                </tr>';
    }

    function modification($id) {
        $etat = new Etat();
        $etat = Doctrine_Core::getTable('etat')->findAll();
        $produit = new Produit();
        $produit = Doctrine_Core::getTable('produit')->findAll();
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($id);
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($id);
        $form = Array();
        $form['idetat'] = $commande->IdEtat;
        $form['type'] = 'update';
        $d['view'] = array("titre" => "Modification commande", "form" => $form, "id" => $id, "etat" => $etat, "produit" => $produit, "lignecommande" => $lignecommande);
        $this->set($d);
        $this->render('modification');
    }

    /**
     * @UserS('REQUIRED')
     */
    function creation() {
        $erreur = "";
        if (isset($_POST['type'])) {
            $form['type'] = $this->data['type'];

            if ($form['type'] == "create") {
                $commande = new Commande();
                $commande->init($this->data['idfournisseur']);
                $commande->save();
                $erreur = "success";
            } else {

                $currentCommande = new Commande();
                $currentCommande = Doctrine_Core::getTable('commande')->find($this->data['id']);
                if (!$currentCommande)
                    $erreur = "failed";
                if (empty($erreur)) {
                    $produitList = $this->data['idproduit'];
                    $quantiteList = $this->data['quantite'];
                    $checkList = $this->data['checkproduit'];
                    foreach ($produitList as $key => $p) {
                        //Si la ligne existe on la modifie
                        if ($checkList[$key] != 0) {
                            $lignecommande = new LigneCommande();
                            $lignecommande = Doctrine_Core::getTable('lignecommande')->findOneById($checkList[$key]);
                            $lignecommande->init2($p, $quantiteList[$key]);
                            $lignecommande->save();
                        }
                        // Si la ligne n'existe pas on créer une nouvelle ligne
                        else if ($checkList[$key] == 0) {
                            //Il faut instancier un nouvel objet pour chaque ligne
                            $lignecommande = new LigneCommande();
                            $lignecommande->init($this->data['id'], $p, $quantiteList[$key]);
                            $lignecommande->save();
                        }
                    }
                    $currentCommande->save();
                    $erreur = "success";
                }
            }

            echo $erreur;
        }
    }

    /**
     * @UserS('REQUIRED')
     */
    function suppression($id) {
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($id);
        foreach ($lignecommande as $l) {
            $l->delete();
        }

        $bordereau = new Bordereau();
        $bordereau = Doctrine_Core::getTable('bordereau')->findOneByIdCommande($id);
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($bordereau->id);
        foreach ($lignebordereau as $l) {
            $l->delete();
        }

        $bordereau->delete();
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->findOneById($id);
        if (!$commande->delete())
            $this->redirect('Commandes/index', 0);
        $erreur = "success";
        echo $erreur;
    }

    function suppressionligne($id) {
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findOneById($id);
        if (!$lignecommande->delete())
            $this->redirect('Commandes/index', 0);
    }

    /**
     * @UserS('REQUIRED')
     */
    function indexBordereau($idcommande) {
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($idcommande);
        $form = Array();
        $form['idetat'] = $commande->IdEtat;
        $produit = new Produit();
        $produit = Doctrine_Core::getTable('produit')->findAll();
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($idcommande);
        $bordereau = new Bordereau();
        $bordereau = Doctrine_Core::getTable('bordereau')->findOneByIdCommande($idcommande);
        //var_dump($bordereau);
        if ($bordereau == null) {
            $bordereau = new Bordereau();
            $bordereau->init($idcommande);
            $bordereau->save();

            foreach ($lignecommande as $l) {
                $lignebordereau = new LigneBordereau();
                $lignebordereau->init($l->id, $l->Quantite, $bordereau->id);
                $lignebordereau->save();
            }
        }
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($bordereau->id);
        $articles = new Article();
        $articles = Doctrine_Core::getTable('article')->findByIdBordereau($bordereau->id);

        if ($articles != null) {
            $d['view'] = array("titre" => "Bordereau", "bordereau" => $bordereau->id, "lignebordereau" => $lignebordereau, "produit" => $produit, "articles" => $articles, "form" => $form);
        } else {
            $d['view'] = array("titre" => "Bordereau", "bordereau" => $bordereau->id, "produit" => $produit, "lignecommande" => $lignecommande, "form" => $form);
        }
        $this->set($d);
        $this->render('indexBordereau');
    }

    function createBordereau($idcommande) {
        $check = "failed";
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($idcommande);

        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($idcommande);
        if ($lignecommande->count() > 0) {

            $bordereau = new Bordereau();
            $bordereau->init($idcommande);
            $bordereau->save();
            foreach ($lignecommande as $l) {
                $lignebordereau = new LigneBordereau();
                $lignebordereau->init($l->IdProduit, $l->Quantite, $bordereau->id);
                $lignebordereau->save();
            }

            $commande->IdEtat = 1;
            $commande->save();

            $check = "success";
        }
        echo $check;
    }

    function addArticle($idBordereau) {
        $ligneBordereau = new LigneBordereau();
        $ligneBordereau = Doctrine_Core::getTable('ligneBordereau')->findByIdBordereau($idBordereau);
        echo'<tr>               
                <td width="42px" align="left">Code barre</td>
                <td align="center">
                        <input type="hidden" name="checkArticle[]" value="0">
                        <input type="text" name="cbarticle[]" placeholder="Code Barre">
                <td width="42px" align="left">Date de péremption</td>
                    <td align="center" ><input width="40px" classe="date" type="date" name="dateexpiration[]"></td>
                    <td width="42px" align="left">Produit</td>
                    <td align="center">
                        <select classe="idproduit" style="width:90px; text-overflow: ellipsis;" name="idproduitArticle[]">
                        <option value="">Select...</option>';
        foreach ($ligneBordereau as $l) {
            echo'<option value="' . $l->IdProduit . '">' . $l->Produit->Libelle . '</option>';
        }
        echo '</select>
                    <td align="center" onclick="deletenewline(this)"><input width="40px" type="button" name="deletenewline" value="Supprimer"/></td>
            </tr>';
    }

    /**
     * @UserS('REQUIRED')
     */
    function modificationBordereau() {
        $erreur = "";
        if (isset($this->data['id'])) {
            $currentBordereau = new Bordereau();
            $currentBordereau = Doctrine_Core::getTable('bordereau')->find($this->data['id']);
            if (!$currentBordereau)
                $erreur = "failed";
            if (empty($erreur)) {
                $erreur = "success";
                $produitList = $this->data['idproduit'];
                $quantiteList = $this->data['quantite'];
                $checkList = $this->data['checkbordereau'];
                if (isset($this->data['checkArticle'])) {
                    $codeList = $this->data['cbarticle'];
                    $dateListe = $this->data['dateexpiration'];
                    $checkArticle = $this->data['checkArticle'];
                    $produitArticle = $this->data['idproduitArticle'];
                }
                foreach ($produitList as $key => $p) {
                    //Si la ligne existe on la modifie
                    if (!isset($checkList[$key])) {
                        $checkList[$key] = 0;
                    }
                    if ($checkList[$key] != 0) {
                        $lignebordereau = new LigneBordereau();
                        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findOneById($checkList[$key]);
                        $lignebordereau->init2($p, $quantiteList[$key]);
                        $lignebordereau->save();
                    }
                    // Si la ligne n'existe pas on créer une nouvelle ligne
                    else if ($checkList[$key] == 0) {
                        //Il faut instancier un nouvel objet pour chaque ligne
                        $lignebordereau = new LigneBordereau();
                        $lignebordereau->init($p, $quantiteList[$key], $this->data['id']);
                        $lignebordereau->save();
                    }
                }
                if (isset($codeList)) {
                    foreach ($codeList as $key => $c) {
                        if (!isset($checkArticle[$key])) {
                            $checkArticle[$key] = 0;
                        }

                        if ($checkArticle[$key] != 0) {
                            $article = new Article();
                            $article = Doctrine_Core::getTable('article')->findOneById($checkArticle[$key]);
                            $article->init($c, $dateListe[$key], $produitArticle[$key], $this->data['id']);
                            $article->save();
                        } else if ($checkArticle[$key] == 0) {
                            $article = new Article();
                            $article->init($c, $dateListe[$key], $produitArticle[$key], $this->data['id']);
                            $article->save();
                        }
                    }
                }

                //Verification du bordereau et changement d'etat de la commande si OK
                $check = false;
                $ligneBordereau = new LigneBordereau();
                $ligneBordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($currentBordereau->id);
                foreach ($ligneBordereau as $l) {
                    $quantiteArticle = 0;
                    $article = new Article();
                    $article = Doctrine_Core::getTable('article')->findByIdBordereau($currentBordereau->id);
                    $quantiteArticle = $article->count();
                    if ($quantiteArticle == $l->Quantite) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                }
                if ($check == true) {
                    $commande = $bordereau->Commande;
                    $commande->IdEtat = 3;
                    $commande->save();
                }
            }
        }
        echo $erreur;
    }

    /**
     * @UserS('REQUIRED')
     */
    function checkBordereau(Bordereau $bordereau) {
        $check = false;
        $ligneBordereau = new LigneBordereau();
        $ligneBordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($bordereau->id);
        foreach ($ligneBordereau as $l) {
            $quantiteArticle = 0;
            $article = new Article();
            $article = Doctrine_Core::getTable('article')->findByIdBordereau($bordereau->id);
            $quantiteArticle = $article->count();
            if ($quantiteArticle == $l->Quantite) {
                $check = true;
            } else {
                $check = false;
            }
        }
        if ($check == true) {
            $commande = $bordereau->Commande;
            $commande->IdEtat = 3;
            $commande->save();
        }
    }

    function suppressionBordereau($id) {
        $bordereau = new Bordereau();
        $bordereau = Doctrine_Core::getTable('bordereau')->findOneByIdCommande($id);
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($bordereau->id);
        foreach ($lignebordereau as $l) {
            $l->delete();
        }

        $bordereau->delete();
    }

    function suppressionLigneBordereau($id) {
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findOneById($id);
        if (!$lignebordereau->delete())
            $this->redirect('Commandes/index', 0);
    }

    function modificationArticle() {
        $idArticle = $_POST['id'];
        $idBordereau = $_POST['bordereau'];
        $codeBarre = $_POST['codebarre'];
        $dateExpiration = $_POST['dateperemption'];
        $idProduit = $_POST['produit'];
        $article = new Article();
        $article = Doctrine_Core::getTable('article')->findOneById($idArticle);
        $article->init($codeBarre, $dateExpiration, $idProduit, $idBordereau);
        $article->save();

        echo "success";
    }

    function suppressionArticle($id) {
        $article = new Article();
        $article = Doctrine_Core::getTable('article')->findOneById($id);
        if (!$article->delete())
            $this->redirect('Commandes/index', 0);
    }

    function consolidation() {
        $bordereau = new Bordereau();
        $bordereau = Doctrine_Core::getTable('bordereau')->findAll();
        foreach ($bordereau as $b) {
            $check = false;
            $ligneBordereau = new LigneBordereau();
            $ligneBordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($b->id);
            if ($ligneBordereau->count() > 0) {
                foreach ($ligneBordereau as $l) {
                    $quantiteArticle = 0;
                    $article = new Article();
                    $article = Doctrine_Core::getTable('article')->findByIdBordereau($b->id);
                    $quantiteArticle = $article->count();
                    if ($quantiteArticle == $l->Quantite) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                }
                if ($check == true) {
                    $commande = $bordereau->Commande;
                    $commande->IdEtat = 3;
                    $commande->save();
                }
            }
        }
    }

}
