<?php
// Steuerungsvariable AKTION überprüfen
/*
if ( isset( $_POST[ 'AKTION' ] ) )
    $AKTION = $_POST[ 'AKTION' ];
elseif ( isset( $_GET[ 'AKTION' ] ) )
    $AKTION = $_GET[ 'AKTION' ];
else
    $AKTION = '';
*/

// Ablauf des Programms nach Inhalt von AKTION steuern
if ( $AKTION == 'details' ) {
    zeige_HTML_Kopfzeile( 'Details anzeigen' );
    $conn = verbinde_mit_Datenbank_persistent();
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Datensatz_Details( $datensatz_id, $suchbegriff, 'Details', $suchfeld );
}
elseif ( $AKTION == 'bearbeiten' ) {
    zeige_HTML_Kopfzeile( 'Datensatz bearbeiten' );
    $conn = verbinde_mit_Datenbank_persistent();
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Datensatz_bearbeiten( $datensatz_id, $suchbegriff, $suchfeld );
}
elseif ( $AKTION == 'speichern' ) {
    zeige_HTML_Kopfzeile( '&Auml;nderungen speichern' );
    $conn = verbinde_mit_Datenbank_persistent();
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Datensatz_Details_gespeichert( $datensatz_id, $suchbegriff, $suchfeld );
}
elseif ( $AKTION == 'neu' ) {
    zeige_HTML_Kopfzeile( 'neuen Datensatz anlegen' );
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Datensatz_neu( $datensatz_id, $suchbegriff, $suchfeld );
}
elseif ( $AKTION == 'neu_speichern' ) {
    zeige_HTML_Kopfzeile( 'neuen Datensatz speichern' );
    $conn = verbinde_mit_Datenbank_persistent();
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Datensatz_neu_gespeichert( $suchbegriff, $suchfeld );
}
elseif ( $AKTION == 'loeschen' ) {
    zeige_HTML_Kopfzeile( 'bitte best&auml;tigen - Datensatz l&ouml;schen' );
    $conn = verbinde_mit_Datenbank_persistent();
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Datensatz_loeschen( $datensatz_id, $suchbegriff, $suchfeld );
}
elseif ( $AKTION == 'loeschen_ok' ) {
    zeige_HTML_Kopfzeile( 'Datensatz gel&ouml;scht' );
    $conn = verbinde_mit_Datenbank_persistent();
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Datensatz_wirklich_geloescht( $datensatz_id, $suchbegriff, $suchfeld );
}
else {
    zeige_HTML_Kopfzeile( 'Suche starten' );
    $conn = verbinde_mit_Datenbank_persistent();
    zeige_Suchformular( $suchbegriff, $suchfeld );
    zeige_Treffer( $suchbegriff, $suchfeld );
}

?>