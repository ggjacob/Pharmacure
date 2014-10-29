<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/jquery.gridster.css">
<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/dashboard.css">
        <section class="demo">
            <div class="gridster">
                <ul id="global" >
                    <li data-row="1" data-col="1" data-sizex="6" data-sizey="3">
                        <table>
                            <tr>
                            <td>
                                <div class="category"; style="width:328px !important;height:110px;">
                                    <span class="category_title category_title_statistique">Aujourd'hui</span>
                                    <div class="sub_category" style="padding:5px">
                                        <table width="300px">
                                            <tr>
                                                <td>
                                                    Chiffre d'affaire:
                                                    <br>Nombre de vente:
                                                    <br>Marge brute:
                                                    <br>Articles en stock:
                                                    <br>Valeur du stock:            
                                                </td>
                                                <td align="right">
                                                    <?=$view['today']["CA"]?> F cfa
                                                    <br><?=$view['today']["vente"]?> article(s)
                                                    <br><?=$view['today']["marge"]?> F cfa
                                                    <br><?=$view['today']["nbArticleStock"]?> article(s)
                                                    <br><?=$view['today']["valeurStock"]?> F cfa
                                                    <br>  
                                                </td>
                                            </tr>
                                        </table>
                                    </div>     
                                </div>
                            </td>
                            <td>
                            <div class="category"; style="width:328px !important;height:110px;float:right;">
                                <span class="category_title category_title_statistique">Depuis</span>
                                <div class="sub_category" style="padding:5px">
                                    <table width="300px">
                                            <tr>
                                                <td>
                                                    Chiffre d'affaire:
                                                    <br>Nombre de vente:
                                                    <br>Marge brute:            
                                                </td>
                                                <td align="right">
                                                    <?=$view['since']["CA"]?> F cfa
                                                    <br><?=$view['since']["vente"]?> article(s)
                                                    <br><?=$view['since']["marge"]?> F cfa
                                                    <br>  
                                                </td>
                                            </tr>
                                    </table>
                                </div>     
                            </div>
                            </td>
                            </tr>
                        </table>
                        
                    </li>
                    <li data-row="1" data-col="1" data-sizex="3" data-sizey="1">
                        Indicateurs: 
                        <select name="select">
                          <option value="value1" selected>Chiffre d'affaire</option> 
                          <option value="value2">Nombre de Vente</option>
                          <option value="value3">Marge brute</option>
                        </select>
                    </li>
                    <li data-row="1" data-col="2" data-sizex="3" data-sizey="1">
                        De: 
                        <input type="date" id="debut">
                        A: 
                        <input type="date" id="fin">
                    </li>
                    <li data-row="2" data-col="1" data-sizex="3" data-sizey="5">
                        <div id="evol_CA" style="width:330px; height:220px;margin:5px"></div>
                    </li>
                    <li data-row="2" data-col="2" data-sizex="3" data-sizey="5">
                        <div id="evol_stock" style="width:330px; height:220px;margin:5px"></div>
                    </li>
                    <li data-row="3" data-col="1" data-sizex="6" data-sizey="1">
                        <center><h3>Espace pour les filtres</h3></center>
                    </li>              
                </ul>
            </div>
        </section>
        <script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.gridster.js" charster="utf-8"></script>
        
        <script type="text/javascript">
            var gridster1;
            var gridster2;

            $(function() {
                gridtster1 = $(".gridster #global").gridster({
                    namespace: '#global',
                    widget_margins: [10, 10], 
                    widget_base_dimensions: [100, 30],
                    
                }).data('gridster');
            });
        </script>
        <script>
$(function () {
    $('#evol_CA').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: "Chiffre d'affaire"
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Jan',
                'Fev',
                'Mar',
                'Avr',
                'Mai',
                'Jui',
                'Jul'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'CA (f cfa)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} F cfa</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
                    {
                    name: '2013',
                    data: [3.9, 2.5, 3.0, 4.2, 5.0, 8.0, 9.6]

                    }, 
                    {
                    name: '2014',
                    data: [4.6, 3.8, 3.4, 5.1, 5.0, 6.7, 11.0]

                    }
        ]
    });
});

$(function () {
    $('#evol_stock').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'évolution du stock'
        },
        subtitle: {
            text: '2014'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
        },
        yAxis: {
            title: {
                text: 'Nombre  d\'articles'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: false
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Total',
            data: [850, 700, 1300, 1233, 1289, 1356, 1400]
        }, {
            name: 'Vendu',
            data: [300, 230,377 , 350, 378, 500, 570]
        }]
    });
});
</script>