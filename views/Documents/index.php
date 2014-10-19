<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=WEBROOT?>public/css/jquery-ui.css">
		<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery.min.for.elfinder.js"></script>
		<script type="text/javascript" src="<?=WEBROOT?>public/js/jquery-ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=WEBROOT?>lib/gestion_document/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=WEBROOT?>lib/gestion_document/css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="<?=WEBROOT?>lib/gestion_document/js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="<?=WEBROOT?>lib/gestion_document/js/i18n/elfinder.fr.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
                var path = $('span').attr('id');
				var elf = $('#elfinder').elfinder({
					url : path, // connector URL (REQUIRED)
					lang: 'fr',             // language (OPTIONAL)
				}).elfinder('instance');
			});
			
		</script>
	</head>
	<body>
            <span id="<?=WEBROOT?>lib/gestion_document/php/connector.php"></span>
		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>