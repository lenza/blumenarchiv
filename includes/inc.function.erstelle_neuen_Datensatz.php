<?php

function erstelle_neuen_Datensatz( $conn ) {

    //Variable um den Namen (deutsch) der Pflanze anzuzeigen
    $namederpflanze = $_POST['NAME_DEUTSCH'];

    //Zielpfad (Konstante in config definiert) des Bildes in Variable speichern
    $uploaddir = IMAGE_PATH;

     //Variable findet den Bildtyp (Endung) um später andere als jpg, png, gif auszuschließen
    $imagefiletype = strtolower(pathinfo($_FILES['BILD']['name'], PATHINFO_EXTENSION));

    //Variable speichert den Pfad + den Namen + den Filetyp
    $uploadfile = $uploaddir . $namederpflanze . '.' . $imagefiletype;

    //Setze Datenbankbild leer
    $dbbild = '';

    //Wenn imagefiletype nicht die Endung jpg, jpeg, png, gif hat bleibt datei leer, lad es nicht hoch und gib einen Fehler aus.
    if ( $imagefiletype != "jpg" && $imagefiletype != "jpeg" && $imagefiletype != "png" && $imagefiletype != "gif" ){
        $dbbild = '';
        echo "Die ausgewählte Datei ist kein Bild.";
    }
    else{

    //Ändere den tmp_name des Bildes um und speichere in $dbbild den basisnamen für das bild im img Ordner auf dem Server
        if ( move_uploaded_file($_FILES['BILD']['tmp_name'], $uploadfile ))
	   {
        $dbbild = basename($uploadfile);
         }
     }
    
    $sql = 'INSERT INTO  ' . DB_TABLE . ' ' .
            '(' .
				'id, ' .
                'name_deutsch, ' .
                'name_latein, ' .
                'art, ' .
                'beschreibung, ' .
                'nachweis, ' .
                'bild, ' .
                'datum, ' .
		        'letzte_aenderung ' .
                
            ') ' .
            'VALUES ' .
            '( NULL, ?, ?, ?, ?, ?, ?, ?, ? )';
	if ( $result = $conn->prepare( $sql ) ) {
		$jetzt = date( 'Y-m-d H:i:s' );
		$result->bind_param( 'ssssssss',
			$_POST[ 'NAME_DEUTSCH' ],
			$_POST[ 'NAME_LATEIN'],
			$_POST[ 'ART' ],
			$_POST[ 'BESCHREIBUNG' ],
			$_POST[ 'NACHWEIS' ],
            $dbbild,			
			$_POST[ 'DATUM' ],
            date("Y-m-d H:i:s")
			
		);



		if ( $result->execute() ) {

		    // Die ID der gerade erzeugten Datensatzes ermitteln (weil in der Datenbank als auto_increment)
			$datensatz_id = $result->insert_id; 
	
			// Rückgabewert der Funktion
			return $datensatz_id;
		} else
			die ( 'Problem!' . $conn->error . "\n" );
	}
	else 
		die ( 'SQL-Abfrage konnte nicht ausgef&uuml;hrt werden!' . "\n" );

	// und Referenz zum Result-Objekt löschen, brauchen wir ja nicht mehr...
	unset( $result );

}

?>
