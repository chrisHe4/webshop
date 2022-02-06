<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Bedingungen</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
      <button type="button" class="btn btn-primary"><a href="AdminButtons.php"style="color:inherit" > Zurück </a></button>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
<br></br>
  <!--BEDINGUNGENTABELLE START--------------------------------------------------------------->
    <div class="container">

     <!--BUTTON NEU/BEARBEITEN START--------------------------------------------------------->
     <button type="button" class="btn btn-primary"><a href="f_Bedingungen.php"style="color:inherit" > Neu hinzufügen </a></button>
<!--BUTTON NEU/BEARBEITEN STOP--------------------------------------------------------->
<br></br>

      <table class="table table-responsive table-hovered">

      
    
        <thead style="background-color: #e3f2fd;">
          <tr>
            <th scope="col">BedingungID</th>
            <th >Baugruppe</th>
            <th >Fertige Baugruppe</th>
            <th >Menge</th>
            
            
          </tr>
        </thead>
        <tbody>
        <?php


$result = $mysqli->query('SELECT * FROM bedingung');

$bedingungen = $result->fetch_all(MYSQLI_ASSOC);
?>
          <?php
          foreach($bedingungen as $bedingung) {
          ?>
          <tr>
            <td ><?php echo "<a href='f_Bedingungen.php?bedingung=".$bedingung["bedingungID"]."'>".$bedingung["bedingungID"]."</a>"?></td>
            <td><?php echo "<a href='f_Bedingungen.php?bedingung=".$bedingung["bedingungID"]."'>". $bedingung["baugruppe"] ?></td>
            <td><?php echo "<a href='f_Bedingungen.php?bedingung=".$bedingung["bedingungID"]."'>". $bedingung["fertige_baugruppe"] ?></td>
            <td><?php echo "<a href='f_Bedingungen.php?bedingung=".$bedingung["bedingungID"]."'>". $bedingung["menge"] ?></td>
            
           
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