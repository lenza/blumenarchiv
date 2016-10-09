<?php

function verbinde_mit_Datenbank_persistent() {

    // mysql_pconnect für persistente Datenbankverbindung
	$conn = @new mysqli(
		'p:' . DB_HOST,
		DB_USER,
		DB_PASS,
		DB_DATABASE
    );

    if ( !$conn )
        die( 'Keine Verbindung zur Datenbank!' );

	/* change character set to utf8 */
	if ( !$conn->set_charset( 'utf8' ) )
		echo 'Error loading character set utf8!';

	// turn autocommit on
	$conn->autocommit( TRUE );
	
    return $conn;
}

?>