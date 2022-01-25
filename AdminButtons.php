<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Webshop</title>
  </head>

  <body>
  <!--NAVBAR--START--------------------------------------------------------------------------->
    <?php
    include('navbar.php');
    ?>
  <!--NAVBAR--END--------------------------------------------------------------------------->

  
    <div style ="text-align:center;" >
      <H1>Adminbereich</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
    <div >
    <form class="d-grid gap-2 col-6 mx-auto " action="tabelleProdukte.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Produkte">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="aBaugruppe.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Baugruppe">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="tabelleMaschinen.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Maschinentyp">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="aKonkreteMaschine.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Konkrete Maschine">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="aBedingungen.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Bedingunen">
            </form>
    </div>

    

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
   <!--script im body nicht im head, weil wenn Fehler in js, dann wird trotzdem html angezeigt-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>