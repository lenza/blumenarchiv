<?php

// ############################################################################
// #######    datensatz_details.php    ########################################
// ############################################################################

// Wichtige Variablen, bitte die Konfiguration in der Datei dort anpassen!
require_once './includes/inc.config.php';

// Diese Funktionen werden gleich benötigt ;-)
require_once './includes/inc.function.zeige_HTML_Kopfzeile.php';
require_once './includes/inc.function.verbinde_mit_Datenbank_persistent.php';
require_once './includes/inc.function.zeige_Suchformular.php';
require_once './includes/inc.function.zeige_Datensatz_Details.php';
require_once './includes/inc.function.zeige_HTML_Ende.php';


// ############################################################################
// #######    Hauptprogramm    ################################################
// ############################################################################

zeige_HTML_Kopfzeile( 'Details anzeigen' );
$conn = verbinde_mit_Datenbank_persistent();
zeige_Suchformular( $suchbegriff );
zeige_Datensatz_Details( $conn, $datensatz_id, $suchbegriff, 'Details' );
zeige_HTML_Ende();

// ############################################################################
// #######    Ende der Programms    ###########################################
// ############################################################################

?>
