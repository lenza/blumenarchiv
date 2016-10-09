<?php

// ############################################################################
// #######    includes/inc.config.php    ######################################
// ############################################################################

/*
 * Wichtige Variablen,
 * HIER bitte anpassen!
*/

// Zugangsdaten für die Datenbank
define( 'DB_HOST',     'localhost'     );
define( 'DB_DATABASE', 'blumen'      );
define( 'DB_TABLE',    't_blumen'    );
define( 'DB_USER',     'blumen' );
define( 'DB_PASS',     ''         );

// Länge des Textfeldes für die Eingabe des Suchbegriffs
define( 'INPUT_TEXT_SIZE', 60 );

// Wenn mehr als MAX_TREFFER_PRO_SEITE gefunden, wird die Anzahl per LIMIT begrenzt
define( 'MAX_TREFFER_PRO_SEITE', 100 );

// Image Path für Bilder auf dem Server
define( 'IMAGE_PATH', '/home/shira/public_html/img/');

// Image-URL anpassen
define( 'IMAGE_URL', '/~shira/img/');


// ############################################################################
// #######    Ende der Konfiguration, ab jetzt nicht mehr ändern    ###########
// ############################################################################

// Globale Variablen setzen
	// Variable mit der Datensatz-ID überprüfen
if ( isset( $_GET[ 'datensatz_id' ] ) )
    $datensatz_id = htmlentities( $_GET[ 'datensatz_id' ] );
elseif ( isset( $_POST[ 'datensatz_id' ] ) )
    $datensatz_id = htmlentities( $_POST[ 'datensatz_id' ] );
else
    $datensatz_id = 0;

// Variable mit dem Suchbegriff überprüfen
if ( isset( $_GET[ 'suchbegriff' ] ) )
    $suchbegriff = htmlentities( $_GET[ 'suchbegriff' ] );
elseif ( isset( $_POST[ 'suchbegriff' ] ) )
    $suchbegriff = htmlentities( $_POST[ 'suchbegriff' ] );
else
    $suchbegriff = '';

// ############################################################################
// #######    Ende der Programms    ###########################################
// ############################################################################

?>
