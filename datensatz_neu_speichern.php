<?php

// ############################################################################
// #######    datensatz_neu_speichern.php    ##################################
// ############################################################################

// Wichtige Variablen, bitte die Konfiguration in der Datei dort anpassen!
require_once './includes/inc.config.php';

// Diese Funktionen werden gleich benötigt ;-)
require_once './includes/inc.function.zeige_HTML_Kopfzeile.php';
require_once './includes/inc.function.verbinde_mit_Datenbank_persistent.php';
require_once './includes/inc.function.zeige_Suchformular.php';
require_once './includes/inc.function.erstelle_neuen_Datensatz.php';
require_once './includes/inc.function.zeige_Datensatz_Details.php';
require_once './includes/inc.function.zeige_HTML_Ende.php';


// ############################################################################
// #######    Hauptprogramm    ################################################
// ############################################################################

zeige_HTML_Kopfzeile( 'Neuer Datensatz gespeichert' );
$conn = verbinde_mit_Datenbank_persistent();
zeige_Suchformular( $suchbegriff );
$datensatz_id = erstelle_neuen_Datensatz( $conn );
zeige_Datensatz_Details( $conn, $datensatz_id, $suchbegriff, 'Neuer Datensatz gespeichert' );
zeige_HTML_Ende();

// ############################################################################
// #######    Ende der Programms    ###########################################
// ############################################################################

?>
