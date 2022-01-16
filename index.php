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
    <!--ToDo kann navbar als extra Datei in einzelne Seiten eingefügt werden?-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">Webshop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Achtung! form class d-flex macht rechtbündig-->
        <form class="d-flex">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">   
            <a class="nav-link active" href="katalog.html">Katalog</a></li>
            <li><a class="nav-link active" href="warenkorb.html">Warenkorb</a></li>
            <li><a class="nav-link active" href="#">Datenschutz</a></li>
            <li><a class="nav-link active" href="#">Impressum</a> </li>
              
              
           
          <!--------------------------------
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
          --------------------------------->
          <!--------------------------------
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          ----------------------------------->
            <div class="btn-group">
              <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                Anmelden
              </button>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><a class="dropdown-item" href="login.html">Login</a></li>
                <li><a class="dropdown-item" href="registrieren.html">Registrieren</a></li>
              </ul>
            </div>
          </form>
        </div>
      </div>
    </nav>
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
            <form action="warenkorb.php" method="POST">
              <input type="hidden" name="produktID" value="<?php echo $produkt["produktID"] ?>">
              <input class="btn btn-primary btn-sm" type="submit" value="Bestellen">
            </form>
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