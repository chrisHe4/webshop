<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Warenkorb';
  include('htmlHeader.php');
?>

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container" style="text-align: center;">
      <H1>Warenkorb</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <?php
//wenn produkt im Warenkorb vorhanden dann soll er sich ProduktID aus dem DB holen
if(isset($_POST["produktID"])) {
  // Aus dem POST die Produkt ID holen
  $newProductID = $_POST["produktID"];
//Datenbank soll ergebnis liefern mit dem ProduktID die er aus POST sich geholt hat
  $result = $mysqli->query("SELECT * FROM produkt WHERE produktID="  .$newProductID);//TODO SQL INJECTION!!!
//gib mir alle Produkter aus
  $produkte = $result->fetch_all(MYSQLI_ASSOC);

  //gib alle Proukte von der Session aus und in die menge soll er zusazliche felder füllen.
  //todo Gesamtpreis berechnen
  
  foreach($produkte as $produkt){
    $gefunden = false;
    foreach($_SESSION["warenkorb"] as &$produktImWarenkorb){
      if($produktImWarenkorb["produktID"] === $produkt["produktID"]){
        $produktImWarenkorb["menge"] = $produktImWarenkorb["menge"]+1;
        $produktImWarenkorb["gesamtpreis"] = $produktImWarenkorb["preis"]* $produktImWarenkorb["menge"];
        $gefunden = true;
        break;
      }
    }
    if(!$gefunden){
      $produkt["menge"] = 1;
      $produkt["gesamtpreis"] = $produkt["menge"]*$produkt["preis"];
      $_SESSION["warenkorb"][] = $produkt;
    }
  }
}
?>

  <!--WARENKORBTABELLE START--------------------------------------------------------------->
    <div class="container" style="text-align: center;">
      <table class="table table-responsive table-hovered">
    
        <thead style="background-color: #e3f2fd;">
          <tr>
            <th scope="col">Artikel</th>
            <th style="text-align:right">Menge</th>
            <th style="text-align:right">Einzelreis</th>
            <th style="text-align:right">Preis</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach($_SESSION["warenkorb"] as $produkt) {
            $total += $produkt["gesamtpreis"]; // Total für alle Produkte
          ?>
          <tr>
            <td><?php echo $produkt["bezeichnung"] ?></td>
            <td style="text-align:right"><?php echo $produkt["menge"] ?></td>
            <td style="text-align:right"><?php echo $produkt["preis"] ?> EUR</td>
            <td style="text-align:right"><?php echo $produkt["gesamtpreis"] ?> EUR</td>
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
        <caption style="background-color: #e3f2fd; text-align: right;">Preis gesamt <?php echo $total; ?> EUR</caption>  
      </table>
      <div class="mb-3" style="text-align: center;">
        <a href="kasse.php"><input type="button" class="btn btn-primary" value="Weiter"></a>
      </div>
    </div>
  <!--WARENKORBTABELLE STOP --------------------------------------------------------------->

<?php
  include('htmlFooter.php');
?>
