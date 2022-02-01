<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Konkrete Maschinen</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--WARENKORBTABELLE START--------------------------------------------------------------->
    <div class="container">
      <table class="table table-responsive table-hovered">

      
    
        <thead style="background-color: #e3f2fd;">
          <tr>
            <th scope="col">Konkrete_MaschineID</th>
            <th >Maschinentyp</th>
            <th >Bezeichnung</th>
          </tr>
        </thead>
        <tbody>
        <?php


$result = $mysqli->query('SELECT * FROM konkrete_maschine');

$konkrete_maschinen = $result->fetch_all(MYSQLI_ASSOC);
?>
          <?php
          foreach($konkrete_maschinen as $konkrete_maschine) {
          ?>
          <tr>
            <td ><?php echo "<a href='f_KonkreteMaschine.php?konkrete_maschine=".$konkrete_maschine["konkrete_maschineID"]."'>".$konkrete_maschine["konkrete_maschineID"]."</a>" ?></td>
            <td><?php echo "<a href='f_KonkreteMaschine.php?konkrete_maschine=".$konkrete_maschine["konkrete_maschineID"]."'>".$konkrete_maschine["maschinentyp"]."</a>" ?></td>
            <td><?php echo "<a href='f_KonkreteMaschine.php?konkrete_maschine=".$konkrete_maschine["konkrete_maschineID"]."'>".$konkrete_maschine["bezeichnung"]."</a>" ?></td>
           
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