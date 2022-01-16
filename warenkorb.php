<?php

require_once("./dbconnect.php");

//wenn produkt im Warenkorb vorhanden dann soll er sich ProduktID aus dem DB holen
if(isset($_POST["produktID"])) {
  // Aus dem POST die Produkt ID holen
  $newProductID = $_POST["produktID"];
//Datenbank soll ergebnis liefern mit dem ProduktID die er aus POST sich geholt hat
  $result = $mysqli->query("SELECT * FROM produkt WHERE produktID="  .$newProductID);
//gib mir alle Produkter aus
  $produkte = $result->fetch_all(MYSQLI_ASSOC);

  //gib alle Proukte von der Session aus und in die menge soll er zusazliche felder füllen.
  //todo Gesamtpreis berechnen
  foreach($produkte as $produkt){
    $produkt["menge"] = 1;
    $produkt["gesamtpreis"] = 0;
    $_SESSION["warenkorb"][] = $produkt; 
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>webshop</title>
  </head>
<body>
  <!-- NAVBAR--START------------------------------------------------------------------------- -->
  <?php
    include('navbar.html');
  ?>
  <!--NAVBAR--END--------------------------------------------------------------------------->

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Warenkorb</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--WARENKORBTABELLE START--------------------------------------------------------------->
    <div class="container">
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
          foreach($_SESSION["warenkorb"] as $produkt) {
          ?>
          <tr>
            <td><?php echo $produkt["bezeichnung"] ?></td>
            <td style="text-align:right">1 Stk</td>
            <td style="text-align:right"><?php echo $produkt["preis"] ?> EUR</td>
            <td style="text-align:right">xxx EUR</td>
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
        <caption style="background-color: #e3f2fd; text-align: right;">Preis gesamt 20,00 EUR</caption>  
      </table>
    </div>
  <!--WARENKORBTABELLE STOP --------------------------------------------------------------->
  </div>
  <!--script im body nicht im head, weil wenn Fehler in js, dann wird trotzdem html angezeigt-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>