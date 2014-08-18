<style type="text/css">
    table { width: 100%;}
    strong {color:black;}
    
    #articles_table {
        border-collapse:collapse;
        border:solid;border-width:2px;
    }

    #articles_table th{
        border-style:solid;border-width:1px;
    }

    #articles_table td{
        border-style:solid;border-width:1px;
    }
</style>
<page backleft="10mm" backright="10mm" backbottom="30m" backtop="20mm">
<page_footer>
    <hr>
</page_footer>
<table>
    <tr>
        <td style="width:100%;text-align: center; "><img src="<?=ROOT?>public/images/logo_facture.png"></td>
    </tr>
</table>
<br><br>
<?php if(!is_null($view['facture']->IdClient)) : ?>
    <table>  
        <tr >
                <td style="width:73%;vertical-align:top;">
                    <strong><?=$this->getPharmacieInfos('nom')?></strong><br><br>
                    <strong>Adresse :</strong> <?=$this->getPharmacieInfos('adresse')?><br><br>
                    <strong>Téléphone :</strong> <?=$this->getPharmacieInfos('tel')?><br><br>
                    <strong>Registre :</strong> <?=$this->getPharmacieInfos('registre')?><br><br>
                    <strong>Immobilier :</strong> <?=$this->getPharmacieInfos('mobilier')?><br><br>
                    <strong>Fiscale :</strong> <?=$this->getPharmacieInfos('fiscale')?>
                </td>
                <td style="width:27%;vertical-align:top;">
                    <strong>Référence client :</strong> <?=$view['facture']->Client->id?><br><br>
                    <strong>Nom :</strong> <?=$view['facture']->Client->Nom?><br><br>
                    <strong>Prenom :</strong> <?=$view['facture']->Client->Prenom?><br><br>
                    <strong>Téléphone :</strong> <?=$view['facture']->Client->Tel?>
                </td>
        </tr>
        </table>
<?php endif; ?>
<?php if(is_null($view['facture']->IdClient)) : ?>
    <table>  
        <tr >
                <td style="width:73%;vertical-align:top;">
                    <strong><?=$this->getPharmacieInfos('nom')?></strong><br><br>
                    <strong>Adresse :</strong> <?=$this->getPharmacieInfos('adresse')?><br><br>
                    <strong>Téléphone :</strong> <?=$this->getPharmacieInfos('tel')?><br><br>
                    <strong>Registre :</strong> <?=$this->getPharmacieInfos('registre')?><br><br>
                    <strong>Immobilier :</strong> <?=$this->getPharmacieInfos('mobilier')?><br><br>
                    <strong>Fiscale :</strong> <?=$this->getPharmacieInfos('fiscale')?>
                </td>
                <td style="width:27%;vertical-align:top;">
                </td>
        </tr>
        </table>
<?php endif; ?>
<br><br><br>
    <table>
        <tr>
            <td style="width:50%;">Facture N° <?=$view['facture']->id?></td>
            <td style="width:50%;text-align: right;">Emise le <?=$view['facture']->Date?></td>
        </tr>
    </table>
<br><br>
    <table id="articles_table">
        <tr>
            <th style="width:25%">Code Barre</th>
            <th style="width:35%">Article</th>
            <th style="width:15%">prix HT</th>
            <th style="width:15%">prix TTC</th>
            <th style="width:10%">TVA</th>
        </tr>
            <?php foreach($view['ligneFactures'] as $ligneFacture) : ?>
                <tr>
                    <td><?=$ligneFacture->Article->CodeBarre?></td>
                    <td ><?=$ligneFacture->Article->Produit->Libelle?></td>
                    <td ><?=$ligneFacture->Article->Produit->Prix?> f cfa</td>
                    <td ><?=$ligneFacture->Article->Produit->Prix * ( 1 + ($ligneFacture->Article->Produit->Taxe->Taux/100))?> f cfa</td>
                    <td ><?=$ligneFacture->Article->Produit->Taxe->Taux?>%</td>
                </tr>
            <?php endforeach;?>                     
    </table>
    <br><br>
    <table>  
        <tr >
                <td style="width:80%">
                    <b>Total HT</b>
                </td>
                <td style="width:20%;text-align: right;">
                    <b><?=$view['facture']->TotalHT?> f cfa</b>
                </td>
        </tr>
        <tr>
                <td  style="width:80%">
                    <b>Total TTC</b>
                </td>
                <td style="width:20%;text-align: right;">
                    <b><?=$view['facture']->TotalTTC?> f cfa</b>
                </td>
        </tr>
    </table>
 </page>