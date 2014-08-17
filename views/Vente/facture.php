<style type="text/css">
    table { width: 100%;background:red;}
    strong {color:black;}
    
    #articles_table {
        border:solid;border-width:2px;
    }

    #articles_table th{
        
    }

    #articles_table td{
        border-top-style:solid;border-top-width:1px;
    }
</style>
<page backleft="10mm" backright="10mm" backbottom="30m" backtop="20mm">
<?php if(isset($_SESSION['client'])) : ?>
    <table>  
        <tr >
                <td style="width:73%;vertical-align:top;">
                    <strong><?=$this->getPharmacieInfos('nom')?></strong><br>
                    <strong>Adresse :</strong> <?=$this->getPharmacieInfos('adresse')?><br>
                    <strong>Téléphone :</strong> <?=$this->getPharmacieInfos('tel')?><br>
                    <strong>Registre :</strong> <?=$this->getPharmacieInfos('registre')?><br>
                    <strong>Immobilier :</strong> <?=$this->getPharmacieInfos('mobilier')?><br>
                    <strong>Fiscale :</strong> <?=$this->getPharmacieInfos('fiscale')?>
                </td>
                <td style="width:27%;vertical-align:top;">
                    <strong>Référence client :</strong> <?=$_SESSION['client']->id?><br>
                    <strong>Nom :</strong> <?=$_SESSION['client']->Nom?><br>
                    <strong>Prenom :</strong> <?=$_SESSION['client']->Prenom?><br>
                    <strong>Téléphone :</strong> <?=$_SESSION['client']->Tel?>
                </td>
        </tr>
        </table>
<?php endif; ?>
    <table id="articles_table">
        <tr>
            <th style="width:25%">Code Barre</th>
            <th style="width:35%">Article</th>
            <th style="width:15%">prix HT</th>
            <th style="width:15%">prix TTC</th>
            <th style="width:10%">TVA</th>
        </tr>
        <?php if(isset($_SESSION['panier'])) : ?>
            <?php foreach($_SESSION['panier'] as $article) : ?>
                <tr>
                    <td><?=$article->CodeBarre?></td>
                    <td ><?=$article->Produit->Libelle?></td>
                    <td ><?=$article->Produit->Prix?> f cfa</td>
                    <td ><?=$article->Produit->Prix * ( 1 + ($article->Produit->Taxe->Taux/100))?> f cfa</td>
                    <td ><?=$article->Produit->Taxe->Taux?>%</td>
                </tr>
            <?php endforeach;?>
        <?php endif; ?>                     
    </table>
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
 </page>