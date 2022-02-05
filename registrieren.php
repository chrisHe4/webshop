<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Registrieren';
  include('htmlHeader.php');
?>

  <div class="container">
    <h1>Registrieren Sie sich hier</h1>
    <p>Hinweis: Alle Felder müssen ausgefüllt werden!</p>
    <!--REGISTRIERUNGSFORMULAR START-->
    <form action="registrieren.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <?php 
            // Variablen aus der Oberfläche prüfen und befüllen, wenn der Benutzer 
            // bereits Eingaben gemacht hatte.
            $success = true;
            $fehlermeldung = '';
            $vorname = '';
            $nachname = '';
            $benutzername = '';
            $mail = '';
            $passwort = '';
            $passwort2 = '';
            $ort = '';
            $postleitzahl = '';
            $strasse = '';
            if (isset($_POST['inputVorname']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputVorname'] == '' or str_contains($_POST['inputVorname'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'Vorname nicht oder fehlerhaft ausgefüllt<br>';
              }
              $vorname = $_POST['inputVorname'];
            }
            else
            {
              $success = false;
              $vorname = '';
            }

            if (isset($_POST['inputNachname']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputNachname'] == '' or str_contains($_POST['inputNachname'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'Nachname nicht oder fehlerhaft ausgefüllt<br>';
              }
              $nachname = $_POST['inputNachname']; 
            }
            else
            {
              $success = false;
              $nachname = '';
            }

            if (isset($_POST['inputBenutzername']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputBenutzername'] == '' or str_contains($_POST['inputBenutzername'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'Benutzername nicht oder fehlerhaft ausgefüllt<br>';
              }
              // Benutzername muss eindeutig in der DB sein
              $sqlBenutzername = 'SELECT * FROM kunde WHERE benutzername="'.$_POST['inputBenutzername'].'"';
              $benutzernameAusDB = $mysqli->query($sqlBenutzername);
              if (!$benutzernameAusDB)
              {
                $success = false;
                $fehlermeldung .= 'Datenbank reagiert nicht, bitte versuchen Sie es später wieder<br>';
              }
              if (mysqli_num_rows($benutzernameAusDB) != 0)
              {
                $success = false;
                $fehlermeldung .= 'Benutzername "'.$_POST["inputBenutzername"].'" bereits vergeben<br>';
              }
              $benutzername = $_POST['inputBenutzername'];
            }
            else
            {
              $success = false;
              $benutzername = '';
            }

            if (isset($_POST['inputMail']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputMail'] == '' or str_contains($_POST['inputMail'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'E-Mail nicht oder fehlerhaft ausgefüllt<br>';
              }
              $mail = $_POST['inputMail'];
            }
            else
            {
              $success = false;
              $mail = '';
            }

            if (isset($_POST['inputPasswort']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen, PW Länge min 8 Zeichen
              if ($_POST['inputPasswort'] == '' or str_contains($_POST['inputPasswort'], ';') or strlen($_POST['inputPasswort']) < 8)
              {
                $success = false;
                $fehlermeldung .= 'Passwort nicht oder fehlerhaft ausgefüllt<br>';
              }
              $passwort = $_POST['inputPasswort'];
            }
            else
            {
              $success = false;
              $passwort = '';
            }

            if (isset($_POST['inputPasswort2']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputPasswort2'] == '' or str_contains($_POST['inputPasswort2'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'Passwort Wiederholung nicht oder fehlerhaft ausgefüllt<br>';
              }
              $passwort2 = $_POST['inputPasswort2'];
            }
            else
            {
              $success = false;
              $passwort2 = '';
            }

            if (isset($_POST['inputOrt']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputOrt'] == '' or str_contains($_POST['inputOrt'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'Ort nicht oder fehlerhaft ausgefüllt<br>';
              }
              $ort = $_POST['inputOrt'];
            }
            else
            {
              $success = false;
              $ort = '';
            }

            if (isset($_POST['inputPostleitzahl']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputPostleitzahl'] == '' or str_contains($_POST['inputPostleitzahl'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'PLZ nicht oder fehlerhaft ausgefüllt<br>';
              }
              $postleitzahl = $_POST['inputPostleitzahl'];
            }
            else
            {
              $success = false;
              $postleitzahl = '';
            }

            if (isset($_POST['inputStrasse']))
            {
              //Prüfung auf Feld-Inhalt und simple Verhinderung von DB Abfragen
              if ($_POST['inputStrasse'] == '' or str_contains($_POST['inputStrasse'], ';'))
              {
                $success = false;
                $fehlermeldung .= 'Straße nicht oder fehlerhaft ausgefüllt<br>';
              }
              $strasse = $_POST['inputStrasse'];
            }
            else
            {
              $success = false;
              $strasse = '';
            }

            // Passwörter auf Gleichheit prüfen
            if ($passwort != $passwort2)
            {
              $success = false;
              $fehlermeldung .= 'Passwörter stimmen nicht überein<br>';
            }

            if ($success)
            {
              // Neuen Kunden in der DB anlegen
              // Passwörter sollten noch verschlüsselt werden
              $sqlKunde = 'INSERT INTO kunde (vorname, nachname, benutzername, email, '
                .'passwort, ort, plz, strassehausnr)' 
                .'VALUES ("'.$vorname.'", "'.$nachname.'", "'.$benutzername.'", "'.$mail.'", "'
                .$passwort.'", "'.$ort.'", "'.$postleitzahl.'", "'.$strasse.'");';
              if ($mysqli->query($sqlKunde) === TRUE) 
              {
                // Kunde erfolgreich angelegt
                $meldungDB = 'Ihr Konto wurde erfolgreich angelegt<br>Sie können sich jetzt damit anmelden.';
                $meldungDB = '<p class="text-success">'.$meldungDB.'</p>';
              } 
              else 
              {
                // Kunde anlegen fehlgeschlagen
                $meldungDB = 'Datenbank reagiert nicht, bitte versuchen Sie es später wieder';
                $meldungDB = '<p class="text-danger">'.$meldungDB.'</p>';
              }
              echo $meldungDB;
            }
            else
            {
              if ($fehlermeldung != '')
              {
                echo '<p class="text-danger">'.$fehlermeldung.'</p>';
              }
            }
          ?>
          
          <!-- Oberfläche bauen und befüllen -->
          <label for="inputVorname">Vorname</label>
          <input type="text" class="form-control" id="inputVorname" name="inputVorname" value="<?php echo $vorname; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputNachname">Nachname</label>
          <input type="text" class="form-control" id="inputNachname" name="inputNachname" value="<?php echo $nachname; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputBenutzername">Benutzername</label>
          <input type="text" class="form-control" id="inputBenutzername" name="inputBenutzername" value="<?php echo $benutzername; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputMail">E-Mail</label>
          <input type="email" class="form-control" id="inputMail" name="inputMail" value="<?php echo $mail; ?>">
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPasswort">Password (Mindestens 8 Zeichen lang)</label>
        <input type="password" class="form-control" id="inputPasswort" name="inputPasswort" value="<?php echo $passwort; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPasswort2">Password wiederholen</label>
        <input type="password" class="form-control" id="inputPasswort2" name="inputPasswort2" value="<?php echo $passwort2; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputOrt">Ort</label>
        <input type="text" class="form-control" id="inputOrt" name="inputOrt" value="<?php echo $ort; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPostleitzahl">Postleitzahl</label>
        <input type="text" class="form-control" id="inputPostleitzahl" name="inputPostleitzahl" value="<?php echo $postleitzahl; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputStrasse">Straße und Hausnummer</label>
        <input type="text" class="form-control" id="inputStrasse" name="inputStrasse" value="<?php echo $strasse; ?>">
      </div>
      <br></br>
      <button type="submit" class="btn btn-primary">Registrieren</button>
    </form>
    <br></br>
    <!--REGISTRIERUNGSFORMULAR END-->
  </div>

<?php
  include('htmlFooter.php');
?>