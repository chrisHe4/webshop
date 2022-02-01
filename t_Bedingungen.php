<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Bedingunen</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--BEDINGUNGENTABELLE START--------------------------------------------------------------->
    <div class="container">

     <!--BUTTON NEU/BEARBEITEN START--------------------------------------------------------->
     <button type="button" class="btn btn-primary">Neu hinzufügen</button>
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
            <td ><?php echo "<a href='f_Bedingungen.php?produkt=".$bedingung["bedingungID"]."'>".$bedingung["bedingungID"]."</a>"?></td>
            <td><?php echo "<a href='f_Bedingungen.php?produkt=".$bedingung["bedingungID"]."'>". $bedingung["baugruppe"] ?></td>
            <td><?php echo "<a href='f_Bedingungen.php?produkt=".$bedingung["bedingungID"]."'>". $bedingung["fertige_baugruppe"] ?></td>
            <td><?php echo "<a href='f_Bedingungen.php?produkt=".$bedingung["bedingungID"]."'>". $bedingung["menge"] ?></td>
            
           
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
          
      </table>
    </div>
  <!--BEDINGUNGENTABELLE STOP --------------------------------------------------------------->
  </div>
<?php
  include('htmlFooter.php');
?>