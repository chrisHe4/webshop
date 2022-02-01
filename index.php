<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>

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

<?php
include('htmlFooter.php');
?>