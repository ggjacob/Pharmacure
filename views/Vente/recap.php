<?php if ($view['totalTTC'] != 0): ?>
<?php if(isset($_SESSION['client'])) : ?>
    <table width="300px" style="float:left;">  
        <tr >
                <td align="left">
                    Référence client
                </td>
                <td align="left">
                    <?=$_SESSION['client']->id?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Nom
                </td>
                <td align="left">
                    <?=$_SESSION['client']->Nom?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Prenom
                </td>
                <td align="left">
                    <?=$_SESSION['client']->Prenom?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Téléphone
                </td>
                <td align="left">
                    <?=$_SESSION['client']->Tel?>
                </td>
        </tr>

    </table>
<?php endif; ?>
<table style="float:right; margin-bottom:20px" width="250px">  
        <tr >
                <td colspan="2" align="center">
                     <?=$this->getPharmacieInfos('nom')?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Adresse
                </td>
                <td align="right">
                     <?=$this->getPharmacieInfos('adresse')?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Téléphone
                </td>
                <td align="right">
                     <?=$this->getPharmacieInfos('tel')?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    registre
                </td>
                <td align="right">
                     <?=$this->getPharmacieInfos('registre')?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Immobilier
                </td>
                <td align="right">
                     <?=$this->getPharmacieInfos('mobilier')?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Fiscale
                </td>
                <td align="right">
                     <?=$this->getPharmacieInfos('fiscale')?>
                </td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

    <table id="sale_table" width="600px" >
        <tr><th>Code Barre</th><th>Article</th><th>prix HT</th><th>prix TTC</th><th>TVA</th></tr>
    </table>
    <div style="height:100px;overflow:auto;">
        <table id="sale_table" width="600px">
            <?php if(isset($_SESSION['panier'])) : ?>
                <?php foreach($_SESSION['panier'] as $article) : ?>
                    <tr >
                        <td align="center">
                            <?=$article->CodeBarre?>
                        </td>
                        <td align="center"><?=$article->Produit->Libelle?></td>
                        <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$article->Produit->Prix?> f cfa</td>
                        <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$article->Produit->Prix * ( 1 + ($article->Produit->Taxe->Taux/100))?> f cfa</td>
                        <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$article->Produit->Taxe->Taux?>%</td>
                        </tr>
                <?php endforeach;?>
            <?php endif; ?>                     
        </table>
    </div>
    <table width="600px">  
            <tr >
                    <td align="left">
                        <b>Total HT</b>
                    </td>
                    <td align="right">
                        <b><?=$view['totalHT']?> f cfa</b>
                    </td>
            </tr>
            <tr >
                    <td align="left">
                        <b>Total TTC</b>
                    </td>
                    <td align="right">
                        <b><?=$view['totalTTC']?> f cfa</b>
                    </td>
            </tr>
        </table>
<?php else:?>
    <div  id="formKO" class="alert alert-icon alert-danger">
            <div id="KOText" class="text">
            Votre Panier est vide. Veuillez choisir au moins un produit.
            </div>
    </div>
<?php endif ?>