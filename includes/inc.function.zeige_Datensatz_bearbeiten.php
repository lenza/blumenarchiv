<?php

function zeige_Datensatz_bearbeiten( $conn, $datensatz_id, $suchbegriff ) {
    
	// Die SQL-Anweisung, die den Datensatz findet
	$sql = 'SELECT ' .
				'id, ' .
				'name_deutsch, ' .
                'name_latein, ' .
                'art, ' .
                'beschreibung, ' .
                'nachweis, ' .
                'bild, ' .
                'datum, ' .
				'letzte_aenderung' .
			
		' FROM ' . DB_TABLE . ' ' .
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

			echo '<h2>Bearbeiten</h2>' . "\n";

		    // -----------------------------------------------------------------------
			// Knopf zum abbrechen
		    echo '<div id="container_form_bearbeiten_abbrechen">' . "\n";
			echo '<form name="edit" action="datensatz_details.php" method="get">
				<input type="submit" class="btn btn-sm" value="abbrechen" />
				<input type="hidden" name="datensatz_id" value="' .
					$datensatz_id .
				'" />
				<input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />' . "\n";
			echo '</form>' . "\n";
 		    echo '</div>' . "\n";

		    // -----------------------------------------------------------------------
			// Knopf zum speichern
 			echo '<form name="edit" action="datensatz_bearbeiten_speichern.php" method="post" enctype="multipart/form-data">' . "\n";
   			echo '<div id="container_form_bearbeiten_speichern">
				<input type="submit" class="btn btn-primary btn-sm" value="speichern" />
				<input type="hidden" name="datensatz_id" value="' .
					$datensatz_id .
				'" />
				<input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />' . "\n";
    		echo '</div>' . "\n";

		    // -----------------------------------------------------------------------
			// Tabelle mit Ergebnissen beginnen
			echo '<table class="table" border=0 id="datensatz_bearbeiten">
				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>ID</td>
				<td nowrap class="tabelle_zelle_inhalt">' . htmlentities( $row[ 0 ]         ) . '</td>
				</tr>
				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>NAME</td>
				<td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
					INPUT_TEXT_SIZE . '"
					name="NAME_DEUTSCH" value="' .
					htmlentities( $row[ 1 ]       ) . '"></td>
				</tr>

				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>LATEIN</td>
				<td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
					INPUT_TEXT_SIZE . '"
					name="NAME_LATEIN" value="' . htmlentities( $row[ 2 ]  ) . '"></td>
				</tr>

				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>ART</td>
				<td nowrap class="tabelle_zelle_inhalt">

                <select name="ART" >
                <option>Keine</option>
                <option>Kräuter</option>
                <option>Sonnengewächs</option>
                <option>Halbschattengewächs</option>
                <option>Schattengewächs</option>
                </select>
				</td>
				</tr>
				
				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>BESCHREIBUNG</td>
				<td nowrap class="tabelle_zelle_inhalt"><textarea rows="8" cols="77" type="text" class="form-control" size="' .
					INPUT_TEXT_SIZE . '"
					name="BESCHREIBUNG">' . htmlentities( $row[ 4 ]  ) . '</textarea></td>
				</tr>
				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>NACHWEIS</td>
				<td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
					INPUT_TEXT_SIZE . '"
					name="NACHWEIS" value="' . htmlentities( $row[ 5 ]  ) . '"></td>
				</tr>
				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>BILD</td>
				<td nowrap class="tabelle_zelle_inhalt">
				<input type="file" name="BILD" value"' . htmlentities( $row[ 6 ] ) . '"/>

				<a href="' . IMAGE_URL . $row[ 6 ]  . '">'. htmlspecialchars( $row[ 6 ]  ) .'</a>
				<input type="hidden" name="BILD_ALT" value="'. $row[ 6 ] .'">
				</td>
				</tr>
				
				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>DATUM</td>
				<td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
					INPUT_TEXT_SIZE . '"
					name="DATUM" value="' . htmlentities( $row[ 7 ]  ) . '"></td>
				</tr>
				<tr>
				<td class="tabelle_zelle_beschriftung" align=right>LETZTE ÄNDERUNG</td>
				<td nowrap class="tabelle_zelle_inhalt">' .
				htmlentities( $row[ 8 ] ) . '</td>
				</tr>' . "\n";
			echo '</tr>' . "\n";

			echo '</table>' . "\n";

			echo '</form>' . "\n";
		}
	}
	else
		die ( 'SQL-Abfrage konnte nicht ausgef&uuml;hrt werden!' );

	// und Referenz zum Result-Objekt löschen, brauchen wir ja nicht mehr...
	unset( $result );
}

?>