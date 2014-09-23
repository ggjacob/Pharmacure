    <table width="300px" style="float:left;">  
        <tr >
                <td align="left">
                    Référence
                </td>
                <td align="left">
                    <?=$view['commande']->Fournisseur->id?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Libellé
                </td>
                <td align="left">
                    <?=$view['commande']->Fournisseur->Libelle?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Adresse
                </td>
                <td align="left">
                    <?=$view['commande']->Fournisseur->Adresse?>
                </td>
        </tr>
        <tr>
                <td align="left">
                    Téléphone
                </td>
                <td align="left">
                    <?=$view['commande']->Fournisseur->Tel?>
                </td>
        </tr>
        
    </table>
<table id="sale_table" width="600px" >
    <tr><th>Produit</th><th>Quantité</th><th>prix HT</th><th>prix TTC</th><th>TVA</th></tr>
</table>
<div style="height:100px;overflow:auto;">
    <table id="sale_table" width="600px">
            <?php foreach($view['commande']->LigneCommandeCommande as $ligne) : ?>
                <tr>
                    <td align="center">
                        <?=$ligne->Produit->Libelle?>
                    </td>
                    <td align="center"><?=$ligne->Quantite?></td>
                    <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$ligne->Produit->Prix?> f cfa</td>
                    <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$ligne->Produit->Prix * ( 1 + ($ligne->Produit->Taxe->Taux/100))?> f cfa</td>
                    <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$ligne->Produit->Taxe->Taux?>%</td>
                </tr>
            <?php endforeach;?>                     
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