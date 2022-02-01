<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Maschinen</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--WARENKORBTABELLE START--------------------------------------------------------------->
    <div class="container">
      <table class="table table-responsive table-hovered">

      
    
        <thead style="background-color: #e3f2fd;">
          <tr>
            <th scope="col">MaschinentypID</th>
            <th >Bezeichnung</th>
          </tr>
        </thead>
        <tbody>
        <?php


$result = $mysqli->query('SELECT * FROM maschinentyp');

$maschinentypen = $result->fetch_all(MYSQLI_ASSOC);
?>
          <?php
          foreach($maschinentypen as $maschinentyp) {
          ?>
          <tr>
            <td ><?php echo "<a href='f_Maschine.php?produkt=".$maschinentyp["maschinentypID"]."'>".$maschinentyp["maschinentypID"]."</a>" ?></td>
            <td><?php echo "<a href='f_Maschine.php?produkt=".$maschinentyp["maschinentypID"]."'>".$maschinentyp["bezeichnung"]."</a>" ?></td>
           
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
          
      </table>
    </div>
  <!--WARENKORBTABELLE STOP --------------------------------------------------------------->
  </div>

<?php
  include('htmlFooter.php');
?>