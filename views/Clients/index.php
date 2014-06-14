<div class="upper_content_forms">
        <form action="#" method="post" id="sale_form">
            <font color="black" size="4">
                <table class="info" border="0px" width="600px">
                    <tr>
                        <td width="100px" align="left">Id Client</td>   <td align="center"><input type="text" name="lastname" placeholder="Votre Nom de Famille">   </td>
                    </tr>
                    <tr>
                        <td width="100px" align="left">Ajout Article</td>   <td align="center"><input type="text" name="lastname" placeholder="Votre Nom de Famille">   </td>
                    </tr>
                </table>
                <table id="sale_table" width="600px" >
                    <tr width="100%"><th>Id</th><th>Article</th><th>prix</th>  <th width="15px">Quantité</th></tr>
                    <tr ><td align="center">4563</td><td align="center">Article 1</td><td style="border-right-style:hidden;" align="right">350 CFA</td>  <td align="center" style=" border-top-style:solid;border-top-width:1px;">x1</td></tr>
                    <tr ><td align="center">7364</td><td align="center">Article 2</td><td style="border-right-style:hidden;" align="right">1 5000 CFA</td>  <td align="center">x2</td></tr>
                    <tr ><td align="center">9034</td><td align="center">Article 3</td><td style="border-right-style:hidden;" align="right">2 0000 CFA</td>  <td align="center">x2</td></tr>
                    <tr ><td align="center">8374</td><td align="center">Article 4</td><td style="border-right-style:hidden;" align="right">200 CFA</td>  <td align="center">x5</td></tr>
                </table>
</div>
                            <div class="lower_content" >
                                    <div class="table_header"><div class="menu_icon"></div><span class="table_title">Mes clients</span></div>
                                    <table id="data_source">
                         <thead>
                            <tr ><th>Id</th><th>Prenom</th>   <th >Nom</th>  <th >Mail</th><th>Tel</th> <th >Commentaires</th></tr>    
                         </thead>
                         <tbody>
                        <?php foreach($view['clients'] as $client) : ?>
                                <tr><td class="center"><?=$client->id?></td>  <td ><?=$client->Prenom?></td> <td><?=$client->Nom?></td><td><?=$client->Mail?></td> <td><?=$client->Tel?></td> <td><?=$client->Commentaire?></td></tr>
                        <?php endforeach;?>
                        <tbody>
                    </table>
</div>
