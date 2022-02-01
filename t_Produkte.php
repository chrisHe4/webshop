<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Produkte</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--PRODUKTETABELLE START--------------------------------------------------------------->
    <div class="container">

    <!--BUTTON NEU/BEARBEITEN START--------------------------------------------------------->
    <button type="button" class="btn btn-primary"><a href="f_Produkt.php"style="color:inherit" > Neu hinzufügen </a></button>
<!--BUTTON NEU/BEARBEITEN STOP--------------------------------------------------------->
<br></br>
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
            <td ><?php echo "<a href='f_Produkt.php?produkt=".$produkt["produktID"]."'>".$produkt["produktID"]."</a>"?></td>
            <td><?php echo "<a href='f_Produkt.php?produkt=".$produkt["produktID"]."'>". $produkt["bezeichnung"] ?></td>
            <td><?php echo "<a href='f_Produkt.php?produkt=".$produkt["produktID"]."'>". $produkt["beschreibung"] ?></td>
            <td><?php echo "<a href='f_Produkt.php?produkt=".$produkt["produktID"]."'>". $produkt["bildlink"] ?></td>
            <td style="text-align:right;"><?php echo "<a href='f_Produkt.php?produkt=".$produkt["produktID"]."'>".number_format ( $produkt["preis"], 2, ',', '.')   ?> EUR</td>
           
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
          
      </table>
    </div>
  <!--PRODUKTETABELLE STOP --------------------------------------------------------------->
  </div>
  
<?php
  include('htmlFooter.php');
?>