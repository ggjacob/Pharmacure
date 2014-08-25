<script>
$(function () {
    $('#evol_CA').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'évolution du CA par exercice'
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
                text: 'CA (Million de f cfa)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Million</b></td></tr>',
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

$(function() {
    $( "#datepicker" ).datepicker();
  });

</script>
<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>public/css/jquery-ui.css">
<table>
    <tr>
        <td align="center"> 
            <br>Type: 
            <select name="select">
              <option value="value1" selected>Chiffre d'affaire</option> 
              <option value="value2">Nombre de Vente</option>
              <option value="value3">Marge</option>
            </select>
        </td>
        <td align="center">
            <br>
            Date: 
            <input type="text" id="datepicker">
        </td>
    </tr>
	<tr>
		<td>
			<tr>
				<td style="">
					<div id="evol_CA" style="width:450px; height:300px;margin:10px;"></div>
				</td>
				<td>
					<div id="evol_stock" style="width:450px; height:300px;margin:10px;"></div>
				</td>
			</tr>
		</td>
	</tr>
</table>

