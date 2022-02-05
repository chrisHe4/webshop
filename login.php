<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Login';
  include('htmlHeader.php');
?>

<!--ÜBERSCHRIFT--START--------------------------------------------------------------->
<div class="container" style="text-align: center;">
  <H1>Login</H1>
</div>

<?php 
  // URL auslesen um den Zustand abzufragen
  $success = false;
  $admin = false;
  $fehlermeldung = "";
  
  if (isset($_GET['ponies'])) // Hintergrund der URL wird verschleiert
  {
    $modus = $_GET['ponies'];
    if ($modus == 'gehoerenalleuns')
    {
      $success = true;
      $admin = true;
    }
    if ($modus == 'habenwir')
    {
      $success = true;
      $admin = false;
    }
    if ($modus == 'habenwirnicht')
    {
      $success = false;
      $admin = false;
    }
  }
  if (isset($_GET['f']))
  {
    $fehlermeldung = $_GET['f'];
  }
?>

<!--Login--START--------------------------------------------------------------->
    <div class="container" style="text-align: center;">
<?php 
  if ($fehlermeldung != '')
  {
    echo '<p class="text-danger">'.$fehlermeldung.'</p>';
  }
  // Nutzer erfolgreich eingeloggt
  if ($success)
  { 
?>
    <p>Sie sind nun eingeloggt!</p>
    <p><a href="index.php">Klicken Sie hier</a> um zur Startseite zurückzukehren.</p>
<?php 
    if ($admin)
    {echo '<p><a href="AdminButtons.php">Hier gehts zum Admin-Bereich</a></p>';}
  }
  else // Einloggen fehlgeschlagen oder erster Besuch der Seite
  { 
?>
      <p>Bitte melden Sie sich mit Benutzernamen und Passwort an.</p>
      <form action="loginRedirect.php" method="post">
        <div class="mb-3">
          <label for="benutzername" class="form-label">Benutzername</label>
          <input type="text" class="form-control" id="benutzername" name="benutzername">
        </div>
        <div class="mb-3">
          <label for="passwort" class="form-label">Passwort</label>
          <input type="password" class="form-control" id="passwort" name="passwort">
          <div class="form-text">Geben Sie niemals Ihr Passwort weiter, auch wir werden Sie nie danach fragen!</div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <br><p>Wenn Sie noch kein Konto bei uns haben, <a href="registrieren.php">registrieren Sie sich hier!</a></p>
    </div>
<?php 
  } 
?>

<?php
  include('htmlFooter.php');
?>