<?php

// ############################################################################
// #######    index.php    ####################################################
// ############################################################################

// Wichtige Variablen, bitte die Konfiguration in der Datei dort anpassen!
require_once './includes/inc.config.php';

// Diese Funktionen werden gleich benötigt ;-)
require_once './includes/inc.function.zeige_HTML_Kopfzeile.php';
require_once './includes/inc.function.verbinde_mit_Datenbank_persistent.php';
require_once './includes/inc.function.zeige_Suchformular.php';
require_once './includes/inc.function.zeige_Treffer.php';
require_once './includes/inc.function.zeige_HTML_Ende.php';


// ############################################################################
// #######    Hauptprogramm    ################################################
// ############################################################################
?>


<?php

zeige_HTML_Kopfzeile( 'Suche starten' );
$conn = verbinde_mit_Datenbank_persistent();
zeige_Suchformular( $suchbegriff );
zeige_Treffer( $conn, $suchbegriff );
zeige_HTML_Ende();

// ############################################################################
// #######    Ende der Programms    ###########################################
// ############################################################################

?>
