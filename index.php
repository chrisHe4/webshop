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
      <H1>Willkommen im Webshop</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--Produkte--START----------------------------------------------------------------------->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">

      <?php

          require_once("./dbconnect.php");

$result = $mysqli->query('SELECT * FROM produkt');

$produkte = $result->fetch_all(MYSQLI_ASSOC);

// geh über alle Produkt durch und zeig alle an
foreach($produkte as $produkt){ 
      ?>
        <!-------------->
        <div class="col">
          <div class="card h-100">
            <img src="./images/shoes-1433925_640.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $produkt["bezeichnung"] ?></h5>
              <p class="card-text"><?php echo $produkt["beschreibung"] ?></p>
          
            <div class="col">
              <div style="text-align: center; padding: 1em;"> 
                <small class="text-muted">Preis <?php echo number_format($produkt["preis"], 2, ',', '.')   ?> €</small>
              </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
              <div style="text-align: center; padding: 1em;"> 

     <!---BESTELLEN-->         
                <form action="warenkorb.php" method="POST">
                  <input type="hidden" name="produktID" value="<?php echo $produkt["produktID"] ?>">
                  <input class="btn btn-primary btn-center" type="submit" value="Bestellen">
                </form>
              </div>
            </div>
            </div>
            <div class="card-footer">
              <div style="text-align: center;"> 
                <small>
                  <a href="warenkorb.php" class="link-secondary">zum Warenkorb</a>
                </small>
              </div>
            </div>
          </div>
        </div>
     <?php } ?>
      <!-------------->
      </div>
    </div>
  <!--Produkte--END------------------------------------------------------------------------->
  
    <!--script im body nicht im head, weil wenn Fehler in js, dann wird trotzdem html angezeigt-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>