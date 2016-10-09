// Meine Funktionen

function suchfeld_focus_setzen(){
    sTempValue = window.document["suche"]["suchbegriff"].value;
    window.document["suche"]["suchbegriff"].focus();
    window.document["suche"]["suchbegriff"].value = sTempValue;
}