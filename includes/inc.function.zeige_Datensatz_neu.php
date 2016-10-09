 <?php

function zeige_Datensatz_neu( $suchbegriff ) {

    echo '<h1>Neuer Datensatz</h1>' . "\n";

    echo '<div id="container_form_neu_abbrechen">' . "\n";
    
    // Knopf zum Abbrechen
    echo '<form name="abbrechen" action="index.php" method="get">' . "\n";
    echo '<input type="submit" class="btn btn-sm btn-default btn-lg active" value="abbrechen" />' . "\n";
    echo '<input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />' . "\n";
    echo '</form>' . "\n";
    echo '</div>' . "\n";

    // Formular zum Speichern
    echo '<form name="speichern" action="datensatz_neu_speichern.php" method="post" enctype="multipart/form-data">' . "\n";
    echo '<div id="container_form_neu_speichern">' . "\n";
    echo '<input type="submit" class="btn btn-sm btn-primary btn-lg active" value="speichern" />' . "\n";
    echo '<input type="hidden" name="suchbegriff" value="' . $suchbegriff . '" />' . "\n";
    echo '</div>' . "\n";

    // Tabelle mit leeren Textfeldern beginnen
    echo '<table class="table" border=0 id="tabelle_neuer_datensatz">' . "\n";
        
    // Kopfzeile der Tabelle
    echo '    
	<tr>
    <td class="tabelle_zelle_beschriftung" align=right>NAME</td>
    <td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
        INPUT_TEXT_SIZE . '" name="NAME_DEUTSCH" value=""></td>
    </tr>

    <tr>
    <td class="tabelle_zelle_beschriftung" align=right>LATEIN</td>
    <td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
        INPUT_TEXT_SIZE . '" name="NAME_LATEIN" value=""></td>
    </tr>

    <tr>
    <td class="tabelle_zelle_beschriftung" align=right>ART</td>
    <td nowrap class="tabelle_zelle_inhalt">
    <select name="ART">
    <option selected>Keine</option>
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
        INPUT_TEXT_SIZE . '" name="BESCHREIBUNG" value=""></textarea></td>
    </tr>

    <tr>
    <td class="tabelle_zelle_beschriftung" align=right>NACHWEIS</td>
    <td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
        INPUT_TEXT_SIZE . '" name="NACHWEIS" value=""></td>
    </tr>

    <tr>
    <td class="tabelle_zelle_beschriftung" align=right>BILD</td>
    <td nowrap class="tabelle_zelle_inhalt">
    <input type="file" name="BILD" />' . "\n";

    echo '</td></tr>
    
    <tr>
    <td class="tabelle_zelle_beschriftung" align=right>DATUM</td>
    <td nowrap class="tabelle_zelle_inhalt"><input type="text" class="form-control" size="' .
        INPUT_TEXT_SIZE . '" name="DATUM" value=""></td>
    </tr>
	' . "\n";

    echo '</table>' . "\n";
    echo '</form>' . "\n";
}

?>
