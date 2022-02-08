<?php
    require_once('./dbconnect.php');
    

    $zahlMittel = $_POST['zahlmittel'];
    $lieferung = $_POST['lieferung'];
    $datenschutz = $_POST['datenschutz'];
    $angemeldet = false;
    
    if (isset($_SESSION['webshopLogin'][0]['benutzername']))
    {
        // Angemeldet, DB Abfragen machen
        // Auftrag anlegen mit KundenID
        $sql1 = 'INSERT INTO auftrag (kunde) VALUES ('.$_SESSION['webshopLogin'][0]['kundeID'].')';
        $sqlRes1 = $mysqli -> query($sql1);

        // Neue Auftrags ID rausfinden
        $sql2 = 'SELECT MAX(auftragID) FROM auftrag';
        $sqlRes2 = $mysqli -> query($sql2);
        $auftragID = mysqli_fetch_array($sqlRes2)[0];

        // Auftragspos zum Auftrag für jedes Produkt mit Menge anlegen
        foreach($_SESSION['warenkorb'] as $produkt)
        {
            $sql3 = 'INSERT INTO auftragspos (auftrag, produkt, menge) VALUES ('.$auftragID.', '.
                $produkt['produktID'].', '.$produkt['menge'].')';
            $sqlRes3 = $mysqli -> query($sql3);
        }

        // Auftragspositionen rausfinden
        $sql4 = 'SELECT * FROM auftragspos WHERE auftrag = '.$auftragID.'';
        $sqlRes4 = $mysqli -> query($sql4);
        $arr4 = $sqlRes4 -> fetch_all();
        foreach ($arr4 as $auftragspositionen) 
        {
            // $auftragspositionen hat alle Spalten von auftragspos
            // Baugruppen zu den Auftragspositionen suchen
            $sql5 = 'SELECT * FROM baugruppe JOIN produkt ON produkt.produktID = baugruppe.produkt '.
                'WHERE produkt.bezeichnung = baugruppe.bezeichnung AND produkt = '.$auftragspositionen[2];
            $sqlRes5 = $mysqli -> query($sql5);
            foreach (mysqli_fetch_all($sqlRes5) as $baugruppen) 
            {
                // $baugruppen hat alle Spalten von baugruppe
                // Für die Baugruppe Bedingungen auslesen und fertige_baugruppen auslesen mit Menge
                $sql6 = 'SELECT * FROM bedingung WHERE baugruppe = '.$baugruppen[0];
                $sqlRes6 = $mysqli -> query($sql6);
                $arr6 = $sqlRes6 -> fetch_all();
                foreach ($arr6 as $benoetigteBaugruppeAusBedingung) 
                {
                    // Für jede benötigte Baugruppe Maschinentyp auslesen und konkrete_maschine suchen
                    $sql7 = 'SELECT konkrete_maschineID FROM konkrete_maschine JOIN maschinentyp ON '.
                        'maschinentyp.maschinentypID = konkrete_maschine.maschinentyp JOIN baugruppe ON '.
                        'baugruppe.maschinentyp = maschinentyp.maschinentypID WHERE baugruppeID = '.
                        $benoetigteBaugruppeAusBedingung[2];
                    $sqlRes7 = $mysqli -> query($sql7);
                    $konkrete_maschinen = $sqlRes7 -> fetch_all();

                    //todo anlegen mit konkreter_maschine, auftragspos, baugruppe, status, dauer
                    foreach ($konkrete_maschinen as $konkrete_maschine)
                    {
                        $sql8 = 'INSERT INTO todo (konkrete_maschine, auftragspos, baugruppe, status, '.
                            'dauer) VALUES ('.$konkrete_maschine[0].', '.$auftragspositionen[0].
                            ', '.$benoetigteBaugruppeAusBedingung[2].', 1, 0)';
                        $sqlRes8 = $mysqli -> query($sql8);
                    }
                }
            }
        }
        // ----------------------------------------------------------------------
        // Hinweis: TODOs erstellen funktioniert noch nicht korrekt
        // Die Menge der gekauften Produkte wird noch nicht beachtet und
        // wenn Baugruppen in den Bedingungen gefunden werden, werden von diesen
        // nicht noch einmal nach Bedingungen gesucht.
        // ----------------------------------------------------------------------
        
        // Tabelle TODOs Baugruppen durchgehen und alle die keine Bedingung haben status anpassen
        $sql9 = 'UPDATE todo SET todo.status = 2 WHERE todo.baugruppe NOT IN (SELECT bedingung.baugruppe FROM bedingung)';
        $sqlRes9 = $mysqli -> query($sql9);

        // Wenn alles geklappt hat, kassenSchluss, Warenkorb zurücksetzen
        $_SESSION['warenkorb'] = array();
        header('Refresh:0; url=kassenSchluss.php');
    }
    else
    {
        // Nicht angemeldet, zurück mit Fehlermeldung
        header('Refresh:0; url=kasse.php?end=fail');
    }

    
?>