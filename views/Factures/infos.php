    <table width="300px" style="float:left;">  
        <tr >
                <td align="left">
                    Référence client
                </td>
                <td align="left">
                    <?=$view['facture']->Client->id?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Nom
                </td>
                <td align="left">
                    <?=$view['facture']->Client->Nom?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Prenom
                </td>
                <td align="left">
                    <?=$view['facture']->Client->Prenom?>
                </td>
        </tr>
        <tr >
                <td align="left">
                    Téléphone
                </td>
                <td align="left">
                    <?=$view['facture']->Client->Tel?>
                </td>
        </tr>
    </table>
<table id="sale_table" width="600px" >
    <tr><th>Code Barre</th><th>Article</th><th>prix HT</th><th>prix TTC</th><th>TVA</th></tr>
</table>
<div style="height:100px;overflow:auto;">
    <table id="sale_table" width="600px">
            <?php foreach($view['facture']->LigneFactureFacture as $ligne) : ?>
                <tr >
                    <td align="center">
                        <?=$ligne->Article->CodeBarre?>
                    </td>
                    <td align="center"><?=$ligne->Article->Produit->Libelle?></td>
                    <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$ligne->Article->Produit->Prix?> f cfa</td>
                    <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$ligne->Article->Produit->Prix * ( 1 + ($ligne->Article->Produit->Taxe->Taux/100))?> f cfa</td>
                    <td align="center" style=" border-top-style:solid;border-top-width:1px;"><?=$ligne->Article->Produit->Taxe->Taux?>%</td>
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