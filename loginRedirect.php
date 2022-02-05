<?php 
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  require_once('./dbconnect.php');
?>

<?php 
    // Versuche den Nutzer einzuloggen
    $success = false;
    $admin = false;
    $benutzerName = '';
    $passwort = '';
    $fehlermeldung = '';

    // Benutzername checken, vorhanden, nicht leer, ohne ;
    if (isset($_POST['benutzername']))
    {
        if ($_POST['benutzername'] != '' and ! str_contains($_POST['benutzername'], ';'))
        {
        $benutzerName = $_POST['benutzername'];
        $success = true;
        }
        else
        {
        $fehlermeldung .= 'Benutzername nicht oder fehlerhaft ausgefüllt<br>';
        $success = false;
        }
    }

    // Passwort checken
    if ($success) 
    {
        if (isset($_POST['passwort']))
        {
        if ($_POST['passwort'] != '' and ! str_contains($_POST['passwort'], ';'))
        {
            $passwort = $_POST['passwort'];
            $success = true;
        }
        else
        {
            $fehlermeldung .= 'Passwort nicht oder fehlerhaft ausgefüllt<br>';
            $success = false;
        }
        }
    }

    // Benutzer in DB suchen wenn Felder korrekt ausgefüllt
    if ($success)
    {
        $sqlBenutzername = 'SELECT * FROM kunde WHERE benutzername="'.$benutzerName.'"';
        $benutzernameAusDB = $mysqli -> query($sqlBenutzername);
        if (!$benutzernameAusDB)
        {
        $success = false;
        $fehlermeldung .= 'Datenbank reagiert nicht, bitte versuchen Sie es später wieder<br>';
        }
        $kundeAusDB = $benutzernameAusDB -> fetch_array();
        if ($success and $kundeAusDB == null)
        {
        $success = false;
        $fehlermeldung .= 'Benutzername existiert nicht (Schlechte Fehlermeldung! Allgemein halten)<br>';
        }
        if ($success and $benutzerName == $kundeAusDB[3] and $passwort == $kundeAusDB[5])
        {
        // Login erfolgreich, Session mit Kundendaten befüllen
        $_SESSION['webshopLogin'][] = $kundeAusDB;
        if ($benutzerName == 'admin') // Hier könnte man weitere Benutzer als Admin hinzufügen über den Benutzernamen
        {
            $admin = true;
        }
        }
        else
        {
        // Login fehlgeschlagen
        $success = false;
        $fehlermeldung .= 'Passwort passt nicht zum Benutzernamen (Schlechte Fehlermeldung! Allgemein halten)<br>';
        }
    }
    
    // Login Seite wieder aufrufen mit neuen Informationen über die Anmeldung
    if ($success == true)
    {
        if ($admin == true) // Hintergrund der URL wird verschleiert
        {
            // Admin
            header('Refresh:0; url=login.php?ponies=gehoerenalleuns&f='.$fehlermeldung);
        }
        else
        {
            // Eingeloggter Benutzer
            header('Refresh:0; url=login.php?ponies=habenwir&f='.$fehlermeldung);
        }
    }
    else
    {
        // Nicht gefunden oder Problem
        header('Refresh:0; url=login.php?ponies=habenwirnicht&f='.$fehlermeldung);
    }
?>

