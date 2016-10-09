<?php

// wird am Ende verwendet:
require_once './includes/inc.function.zeige_Treffer.php';

// Die eigentliche Funktion
function zeige_Datensatz_loeschen_ok( $conn, $datensatz_id, $suchbegriff ) {
    $sql = 'SELECT bild FROM '. DB_TABLE . ' WHERE id = ?';
    if ( $result = $conn->prepare( $sql ) ) {
		$result->bind_param( 'i', $datensatz_id );
		$result->execute();
		$result->store_result();
	    if ( $result->num_rows == 0 ) {
            echo '<h2>Keine Treffer gefunden.</h2>' . "\n";
            exit;
        }
        // Es gab Treffer!
        else {
			$result->bind_result($dateiname);

			// Zum Glück gibt es doch Treffer ;-)
			$result->fetch();
			unlink(IMAGE_PATH.$dateiname);
	    }
	}
    // Datensatz löschen
    $sql = 'DELETE FROM ' . DB_TABLE . ' ' .
            'WHERE id = ?';
	if ( $result = $conn->prepare( $sql ) ) {
		$result->bind_param( 'i', $datensatz_id );
		$result->execute();
		$result->store_result();

		echo '<h2>Datensatz mit ID [' . $datensatz_id . '] gel&ouml;scht!</h2>' . "\n";

		// Die sonstigen Treffer mit dem aktuellen Suchbegriff anzeigen
		zeige_Treffer( $conn, $suchbegriff );
	}
	else
		die ( 'SQL-Abfrage konnte nicht ausgef&uuml;hrt werden!' );

	// und Referenz zum Result-Objekt löschen, brauchen wir ja nicht mehr...
	unset( $result );
}

?>