<?php

function zeige_Treffer( $conn, $suchbegriff ) {

    // Treffer anzeigen
    if ( $suchbegriff <> '' ) {

        // Start für Seitenzahl der Anzeige auslesen
        if ( isset( $_GET[ 'seite_starten_mit_datensatz' ] ) )
                $limit_starten_mit = $_GET[ 'seite_starten_mit_datensatz' ];
        else
                $limit_starten_mit = 0;

        // Gesamtzahl der Datensätze ermitteln
        $sql = 'SELECT count(*) as datensaetze_gesamt from ' . DB_TABLE;
		$result = $conn->query( $sql );
		if ( isset( $result->num_rows ) ) {
			$row = $result->fetch_assoc();
			$anzahl_datensaetze_gesamt = $row[ 'datensaetze_gesamt' ];
			$result->free();
			unset( $row );		
		}
		else
			$anzahl_datensaetze_gesamt = 0;
	if ( isset( $_GET[ 'kategorie' ] ) ){
		$kategorie = $_GET[ 'kategorie' ];
	}
	else {
		$kategorie = 'name_deutsch';
	}
        // Anzahl der Treffer ermitteln
		$sql = 'SELECT count(*) from ' . DB_TABLE . ' ' .
				'WHERE ' .$kategorie. ' LIKE ?';
		if ( $result = $conn->prepare( $sql ) ) {
			
			$result->bind_param( 's', '$suchbegriff' );
	
			$result->execute();
			$result->bind_result( $anzahl_datensaetze_treffer );
			$result->fetch();
			$result->close();
		}
		else
			die ( 'Kann Anzahl der Treffer nicht ermitteln!' );

        // Datensätze für die Anzeige auslesen
        $sql = 'SELECT ' .
			'id, ' .
			'name_deutsch, ' .
            'name_latein, ' .
            'art, ' .
            'beschreibung, ' .
            'nachweis, ' .
            'bild, ' .
            'datum,' .
			'letzte_aenderung' .
			' FROM ' . DB_TABLE . ' ' .
            'WHERE ' . $kategorie . ' LIKE ? LIMIT 0, ?';


		$result = $conn->prepare( $sql );

        $treffer_pro_seite = MAX_TREFFER_PRO_SEITE;
		$result->bind_param( 'si', $suchbegriff, $treffer_pro_seite );
			
		$result->execute();
        if ( !$result ) {
            echo '<p>SQL-Abfrage konnte nicht ausgef&uuml;hrt werden!';
            exit;
        }
		$result->store_result();
        if ( $result->num_rows == 0 ) {
            echo '<p>Keine Treffer gefunden.' . "\n";
            exit;
        }
        // Es gab Treffer!
        else {
            // Anzahl der gefundenen Treffer ausgeben
            echo '<p>Gefunden <b>' . $anzahl_datensaetze_treffer . '</b> Treffer ' .
                    'in insgesamt <b>' . $anzahl_datensaetze_gesamt . '</b> Datens&auml;tzen.' . "\n";
            if ( $anzahl_datensaetze_treffer > $treffer_pro_seite ) {
                echo '<br>Es werden die ersten <b>' . $treffer_pro_seite . '</b> Datens&auml;tze angezeigt.' . "\n";
            }

            // Kopfzeile der Tabelle
            echo '    <p><table class="table" border=0 id="tabelle_treffer">
                <tr class="tabelle_treffer_beschriftung">
                    					
					<th>ID</th>
                    <th>NAME DEUTSCH</th>
                    <th>NAME LATEIN</th>
                    <th>ART</th>
                    <th>BESCHREIBUNG</th>
                                  
                </tr>
                ';

            // Alle Treffer abarbeiten
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
			
			$i = 0;
            while ( $result->fetch() ) {
                // Felder einzeln ausgeben
                echo '<tr class="';
				echo ($i++ % 2) ? 'tabelle_treffer_gerade' : 'tabelle_treffer_ungerade';
				echo '">' . "\n";

                    echo '  <td nowrap>' .
                        '<a href="datensatz_details.php?datensatz_id=' . htmlentities( $row[ 0 ] ) .
                        '&suchbegriff=' . urlencode( $suchbegriff )  .
                        '">' .
                        htmlentities( $row[ 0 ]       ) .
                        '</a>' .
                        '</td>' . "\n";

                    echo '  <td nowrap>' .
                        '<a href="datensatz_details.php?datensatz_id=' . htmlentities( $row[ 0 ] ) .
                        '&suchbegriff=' . urlencode( $suchbegriff )  .
                        '">' .
                        htmlentities( $row[ 1 ]       ) .
                        '</a>' .
                        '</td>' . "\n";
						
                    echo '  <td nowrap>' .
                        '<a href="datensatz_details.php?datensatz_id=' . htmlentities( $row[ 0 ] ) .
                        '&suchbegriff=' . urlencode( $suchbegriff )  .
                        '">' .
                        htmlentities( $row[ 2 ]       ) .
                        '</a>' .
                        '</td>' . "\n";
						
                    echo '  <td nowrap>' .
                        '<a href="datensatz_details.php?datensatz_id=' . htmlentities( $row[ 0 ] ) .
                        '&suchbegriff=' . urlencode( $suchbegriff )  .
                        '">' .
                        htmlentities( $row[ 3 ]       ) .
                        '</a>' .
                        '</td>' . "\n";

						
                    echo '  <td nowrap>' .
                        '<a href="datensatz_details.php?datensatz_id=' . htmlentities( $row[ 0 ] ) .
                        '&suchbegriff=' . urlencode( $suchbegriff )  .
                        '">Beschreibung hier</a>' .
                        '</td>' . "\n";
						


                echo '<td><a href=" datensatz_details.php?datensatz_id=' . htmlentities( $row[ 0 ] ) .
                        '&suchbegriff=' . urlencode( $suchbegriff )  .
                        '">Mehr</a></td>' . "\n";  
						
                echo '</tr>' . "\n";
                

            }
                
            echo '</table>' . "\n\n";

           
			$result->close();
        }
    }
    else
        echo '<p>Bitte eine Blume eingeben.' . "\n";
		
	// und Referenz zum Result-Objekt löschen, brauchen wir ja nicht mehr...
	unset( $result );

    echo '</form>' . "\n";


    // Knopf für einen neuen Datensatz
    echo '<p><form name="neu" action="datensatz_neu.php" method="get">' . "\n" .
        '  <input type="submit" class="btn btn-info" value="neuen Datensatz anlegen" />' . "\n" .
        '  <input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />' . "\n" .
        '</form>' . "\n";
}

?>
