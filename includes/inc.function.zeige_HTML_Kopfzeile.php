<?php
	function zeige_HTML_Kopfzeile( $titel ) {

	    // HTML-Kopfzeile
	    echo '<!DOCTYPE html>' . "\n" .
			'<html>' . "\n" .
			'<head>' . "\n" .
			'    <meta charset="UTF-8">' . "\n" .
	        '    <title>Meine Blumen</title>' . "\n" .
			'    <link  href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet" type="text/css" ></link>' . "\n" .
		    '    <link href="css/styles.css" rel="stylesheet" type="text/css"></link> ' . "\n".
		    '    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">' . "\n".
            '    <!-- Latest compiled and minified JavaScript -->
                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>'."\n".
			'    <script type="text/javascript" src="js/scripts.js"></script>' . "\n" .
	        '</head>' . "\n" .
	        '<body onload="suchfeld_focus_setzen();">' . "\n".
	        '<div class="container">' . "\n".
            '<div class="row">' . "\n".
            '<div class="col-md-6">' . "\n";
	}
?>
