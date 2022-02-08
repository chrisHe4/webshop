<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Kasse';
  include('htmlHeader.php');
?>

<!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
<div class="container" style="text-align: center;">
  <H1>Jetzt bestellen!</H1>
  <p>
    Hier sehen Sie noch einmal den zu zahlenden Betrag. Wenn Sie auf den Button 'Jetzt bestellen' drücken,<br>
    dann wird eine kostenpflichtige Bestellung aufgegeben.
  </p>
<!--ÜBERSCHRIFT/TEXT--STOP---------------------------------------------------------------->

<!--TEXT--START--------------------------------------------------------------------------->
  <p>
    Bitte beachten Sie dabei folgendes (Jap, das hier ist das Kleingedruckte):<br>
    <p style="font-size: 5px;">
      Sie müssen eingeloggt sein, um Bestellungen aufzugeben<br>
      Sie müssen die Richtlinien zum Datenschutz vor der Bestellung akzeptieren<br>
      Bitte wählen Sie eine Methode zur Zahlung aus (Aufgrund von technischen Schwierigkeiten
        stehen derzeit nur Bestellungen auf Rechnung zur Verfügung. Wir bitten um Ihr Verständnis)<br>
      Wählen Sie eine normale oder die Express-Lieferung (Aufgrund von technischen Schwierigkeiten
        steht derzeit nur die normale Lieferung zur Verfügung. Wir bitten um Ihr Verständnis)<br>
    </p>
  </p>
</div>
<!--TEXT--STOP---------------------------------------------------------------------------->

<?php
// Total für alle Produkte ausrechnen
  $total = 0;
  foreach($_SESSION['warenkorb'] as $produkt) 
  {
  $total += $produkt['gesamtpreis']; 
  }

// Fehlermeldung checken
$fehlermeldung = '';
  if (isset($_GET['end']))
  {
    if ($_GET['end'] == 'fail')
    {
      $fehlermeldung .= 'Sie müssen angemeldet sein, um eine Bestellung aufzugeben!';
    }
  }
?>

<!-- Zahlungsbedingungen, Lieferbedingungen, Checkbox Datenschutz, Button kostenpflichtig bestellen -->
<form action="kasseRedirect.php" method="post">
  <div class="container" style="text-align: center;">
    <p><b>Zu zahlender Betrag: <?php echo $total; ?> €</b></p>
    
    Zahlen mit<br>
    <label for="rechnung">Rechnung</label>
    <input type="radio" name="zahlmittel" id="rechnung" value="rechnung" checked>
    <label for="paypal" style="margin-left:50px;">Paypal</label>
    <input type="radio" name="zahlmittel" id="paypal" value="paypal" disabled>
    <label for="überweisung" style="margin-left:50px;">Überweisung</label>
    <input type="radio" name="zahlmittel" id="überweisung" value="überweisung" disabled>
    <br><br>
    Lieferung<br>Normal: 2-4 Wochen<br>Express: Folgender Werktag<br>
    <label for="normal">Normal</label>
    <input type="radio" name="lieferung" id="normal" value="normal" checked>
    <label for="express" style="margin-left:50px;">Express</label>
    <input type="radio" name="lieferung" id="express" value="express" disabled>
    <br><br>
    Zustimmung zum Datenschutz<br>
    <label for="datenschutz">Ich stimme allem zu!</label>
    <input type="checkbox" name="d" id="d" value="d" checked disabled>
    <input type="checkbox" name="datenschutz" id="datenschutz" value="datenschutz" checked hidden>
    <br><br>
    <?php if ($fehlermeldung != '') {echo '<p class="text-danger">'.$fehlermeldung.'</p>';} ?>
    <button type="submit" class="btn btn-primary">Jetzt kostenpflichtig bestellen!</button>
  </div>
</form>

<?php
  include('htmlFooter.php');
?>