<html lang="fr">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="<?=WEBROOT?>public/css/alert.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script language="JavaScript">
function cancelDiv() {
            $("#alert").hide();
        }

        function ShowDiv() {
            $("#alert").css("backgroundColor", "white");
            $("#alert").show();
            setTimeout(function(){$("#alert").hide()}, <?=$duration?>)
        }

        $(function () { 
            $("#alert").hide();            
        });
      
      function caller(){  
      	ShowDiv();
      }  
</script>
</head>
<body onload="caller()">

<div class="container" id="alert">
<?=$msg?>
</div>
</body>
<html>	
