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
    <table style="float:right; margin-bottom:20px" width="250px">  
        <tr >
                <td colspan="2" align="center">
                    Pharmacie Pharmacure
                </td>
        </tr>
        <tr >
                <td align="left">
                    Adresse
                </td>
                <td align="right">
                    babalabougou lampani coro
                </td>
        </tr>
        <tr >
                <td align="left">
                    Téléphone
                </td>
                <td align="right">
                    00 00 00 00
                </td>
        </tr>
        <tr >
                <td align="left">
                    registre
                </td>
                <td align="right">
                    12345678
                </td>
        </tr>
        <tr >
                <td align="left">
                    Immobilier
                </td>
                <td align="right">
                    5678910
                </td>
        </tr>
        <tr >
                <td align="left">
                    Fiscale
                </td>
                <td align="right">
                    123988
                </td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

<?php endif; ?>
<table id="sale_table" width="600px" >
    <tr><th>Code Barre</th><th>Article</th><th>prix</th></tr>
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
                    </tr>
            <?php endforeach;?>
        <?php endif; ?>                     
    </table>
</div>