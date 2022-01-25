
<?php
require_once("./dbconnect.php");
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
    include('navbar.php');
  ?>
  <!--NAVBAR--END--------------------------------------------------------------------------->

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Produkte</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--WARENKORBTABELLE START--------------------------------------------------------------->
    <div class="container">
      <table class="table table-responsive table-hovered">

      
    
        <thead style="background-color: #e3f2fd;">
          <tr>
            <th scope="col">ProduktID</th>
            <th >Bezeichnung</th>
            <th >Beschreibung</th>
            <th >Bild</th>
            <th style="text-align:right;" >Preis</th>
            
          </tr>
        </thead>
        <tbody>
        <?php


$result = $mysqli->query('SELECT * FROM produkt');

$produkte = $result->fetch_all(MYSQLI_ASSOC);
?>
          <?php
          foreach($produkte as $produkt) {
          ?>
          <tr>
            <td ><?php echo "<a href='admin.php?produkt=".$produkt["produktID"]."'>".$produkt["produktID"]."</a>"?></td>
            <td><?php echo "<a href='admin.php?produkt=".$produkt["produktID"]."'>". $produkt["bezeichnung"] ?></td>
            <td><?php echo "<a href='admin.php?produkt=".$produkt["produktID"]."'>". $produkt["beschreibung"] ?></td>
            <td><?php echo "<a href='admin.php?produkt=".$produkt["produktID"]."'>". $produkt["bildlink"] ?></td>
            <td style="text-align:right;"><?php echo "<a href='admin.php?produkt=".$produkt["produktID"]."'>".number_format ( $produkt["preis"], 2, ',', '.')   ?> EUR</td>
           
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
          
      </table>
    </div>
  <!--WARENKORBTABELLE STOP --------------------------------------------------------------->
  </div>
  <!--script im body nicht im head, weil wenn Fehler in js, dann wird trotzdem html angezeigt-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>