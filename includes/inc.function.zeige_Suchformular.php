<?php

function zeige_Suchformular( $suchbegriff ) {

    // Formular für den Suchbegriff
    echo '<h1>Meine Blumen</h1>' . "\n";
    echo '<form name="suche" id="suche" method="get" action="index.php">' . "\n";
	echo '  <p>Suchbegriff: <input type="text" class="form-control" placeholder="Blume " size="' . INPUT_TEXT_SIZE .
			'" name="suchbegriff" value="' .
            $suchbegriff .
            '">' . "\n";
    echo '<p>Kategorie: <input type="radio" name="kategorie" value="name_deutsch" checked> Deutsch
<input type="radio" name="kategorie" value="name_latein"> Latein</input></p>';
    echo '  <input type="submit" class="btn btn-primary" value="Suche starten">' . "\n";
    echo '</form>';
}

?>
