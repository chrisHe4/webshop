<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Maschinen</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
      <button type="button" class="btn btn-primary"><a href="AdminButtons.php"style="color:inherit" > Zurück </a></button>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
<br></br>

  <!--MASCHINENTABELLE START--------------------------------------------------------------->

    <div class="container">

      <!--BUTTON NEU/BEARBEITEN START--------------------------------------------------------->
<button type="button" class="btn btn-primary"><a href="f_Maschine.php"style="color:inherit" > Neu hinzufügen </a></button>
<!--BUTTON NEU/BEARBEITEN STOP--------------------------------------------------------->

<br></br>
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
            <td ><?php echo "<a href='f_Maschine.php?maschinentyp=".$maschinentyp["maschinentypID"]."'>".$maschinentyp["maschinentypID"]."</a>" ?></td>
            <td><?php echo "<a href='f_Maschine.php?maschinentyp=".$maschinentyp["maschinentypID"]."'>".$maschinentyp["bezeichnung"]."</a>" ?></td>
           
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
          
      </table>
    </div>
  <!--MASCHINENTABELLE STOP --------------------------------------------------------------->
  </div>

<?php
  include('htmlFooter.php');
?>