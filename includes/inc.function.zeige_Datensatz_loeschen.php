<?php

// Wird ganz unten benötigt
require_once './includes/inc.function.zeige_Details.php';

// Hier die eigentliche Funktion
function zeige_Datensatz_loeschen( $conn, $datensatz_id, $suchbegriff ) {

    echo '<h2>Datensatz wirklich l&ouml;schen?</h2>' . "\n";

    // -----------------------------------------------------------------------
    // Knopf zum abbrechen
    echo '<div id="container_form_loeschen_abbrechen">' . "\n";
    echo '<form name="edit" action="datensatz_details.php" method="get">
        <input type="submit" class="btn btn-sm" value="Nein, abbrechen!" />
        <input type="hidden" name="datensatz_id" value="' .
           $datensatz_id .
        '" />
        <input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />
    </form>
    ';
    echo '</div>' . "\n";

    // -----------------------------------------------------------------------
    // Knopf zum löschen
    echo '<div id="container_form_loeschen_ja">' . "\n";
    echo '<form name="delete" action="datensatz_loeschen_ok.php" method="get">
        <input type="submit" class="btn btn-primary btn-sm" value="Ja, l&ouml;schen" />
        <input type="hidden" name="datensatz_id" value="' .
           $datensatz_id .
        '" />
        <input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />
    </form>
    ';
    echo '</div>' . "\n";

    // -----------------------------------------------------------------------
    // Daten aus der Datenbank anzeigen
    zeige_Details( $conn, $datensatz_id, $suchbegriff );
}

?>