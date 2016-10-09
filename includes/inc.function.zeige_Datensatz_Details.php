<?php

// Wird ganz unten benötigt
require_once './includes/inc.function.zeige_Details.php';

// Hier die eigentliche Funktion
function zeige_Datensatz_Details( $conn, $datensatz_id, $suchbegriff, $ueberschrift ) {

    echo '<h2>' . htmlspecialchars( $ueberschrift ) . '</h2>' . "\n";

    // -----------------------------------------------------------------------
    // Knopf für einen neuen Datensatz
    echo '<div id="container_form_details_neu">' . "\n";
    echo '	<form name="neu" action="datensatz_neu.php" method="get">
		<input type="submit" class="btn btn-info" value="neu" />
		<input type="hidden" name="datensatz_id" value="' .
			$datensatz_id .
		'" />
		<input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />
	</form>' . "\n";
    echo '</div>' . "\n";

    // -----------------------------------------------------------------------
    // Knopf zum bearbeiten
    echo '<div id="container_form_details_edit">' . "\n";
    echo '	<form name="edit" action="datensatz_bearbeiten.php" method="get">
		<input type="submit" class="btn btn-success" value="bearbeiten" />
		<input type="hidden" name="datensatz_id" value="' .
			$datensatz_id .
		'" />
		<input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />
	</form>' . "\n";
    echo '</div>' . "\n";

    echo '<div id="container_form_details_delete">' . "\n";

    // -----------------------------------------------------------------------
    // Knopf zum löschen
    echo '	<form name="delete" action="datensatz_loeschen.php" method="get">
		<input type="submit" class="btn btn-warning" value="l&ouml;schen" />
		<input type="hidden" name="datensatz_id" value="' .
		$datensatz_id .
		'" />
		<input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />
	</form>' . "\n";
    echo '</div>' . "\n";

    // -----------------------------------------------------------------------
    // und jetzt den Datensatz finden und anzeigen
    // -----------------------------------------------------------------------

    zeige_Details( $conn, $datensatz_id, $suchbegriff );
}

?>