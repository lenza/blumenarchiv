<?php

function zeige_Details( $conn, $datensatz_id, $suchbegriff ) {

    // Datensätze für die Anzeige auslesen
	$sql = 'SELECT ' .
	
			'id, ' .
			'name_deutsch, ' .
            'name_latein, ' .
            'art, ' .
            'beschreibung, ' .
            'nachweis, ' .
            'bild, ' .
            'datum, ' .
			'letzte_aenderung ' .
	
		'FROM ' . DB_TABLE . ' ' .
	    'WHERE id = ?';
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
			$result->bind_result(
				$row[ 0  ],
				$row[ 1  ],
				$row[ 2  ],
				$row[ 3  ],
				$row[ 4  ],
				$row[ 5  ],
				$row[ 6  ],
				$row[ 7  ],
				$row[ 8  ]
		);

			// Zum Glück gibt es doch Treffer ;-)
			$result->fetch();
						
			// Tabelle mit Ergebnissen beginnen
			//  border=0 id="datensatz_details"
			echo '<table class="table" class="table">';

			// Kopfzeile der Tabelle
			echo '
			<tr>
            <td class="tabelle_zelle_beschriftung" align=right>ID</td>
            <td nowrap class="tabelle_zelle_inhalt">' . htmlspecialchars( $row[ 0 ]   ) . '</td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>NAME</td>
            <td nowrap class="tabelle_zelle_inhalt">' . htmlspecialchars( $row[ 1 ]  ) . '</td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>LATEIN</td>
            <td nowrap class="tabelle_zelle_inhalt">' . htmlspecialchars( $row[ 2 ]  ) . '</td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>ART</td>
            <td nowrap class="tabelle_zelle_inhalt">' . htmlspecialchars( $row[ 3 ]  ) . '</td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>BESCHREIBUNG</td>
            <td nowrap class="tabelle_zelle_inhalt"><textarea rows="8" cols="77" readonly>' . htmlspecialchars( $row[ 4 ]  ) . '</textarea></td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>NACHWEIS</td>
            <td nowrap class="tabelle_zelle_inhalt"><a href="' . $row[ 5 ]   . '">'. htmlspecialchars( $row[ 5 ]  ) . ' </a></td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>BILD</td>
            <td nowrap class="tabelle_zelle_inhalt">' . '<a href="' . IMAGE_URL . $row[ 6 ]  . '">'. htmlspecialchars( $row[ 6 ]  ) .'</a> </td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>DATUM</td>
            <td nowrap class="tabelle_zelle_inhalt">' . htmlspecialchars( $row[ 7 ]  ) . '</td>
            </tr><tr>
            <td class="tabelle_zelle_beschriftung" align=right>LETZTE ÄNDERUNG</td>
            <td nowrap class="tabelle_zelle_inhalt">' . htmlspecialchars( $row[ 8 ] ) . '</td>
            </tr>
			';

			echo "\n</table>\n";
			$result->close();
		}
	}
	else
		die ( 'SQL-Abfrage konnte nicht ausgef&uuml;hrt werden!' );

	// und Referenz zum Result-Objekt löschen, brauchen wir ja nicht mehr...
	unset( $result );

}

?>