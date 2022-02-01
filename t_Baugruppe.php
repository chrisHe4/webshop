<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Baugruppe</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--BAUGRUPPETABELLE START--------------------------------------------------------------->
  <div class="container">

<!--BUTTON NEU/BEARBEITEN START--------------------------------------------------------->
<button type="button" class="btn btn-primary">Neu hinzufügen</button>
<!--BUTTON NEU/BEARBEITEN STOP--------------------------------------------------------->
<br></br>
      <table class="table table-responsive table-hovered">

      
    
        <thead style="background-color: #e3f2fd;">
          <tr>
            <th scope="col">BaugruppeID</th>
            <th >Bezeichnung</th>
            <th >Maschinentyp</th>
            <th >Produkt</th>
            
            
          </tr>
        </thead>
        <tbody>
        <?php


$result = $mysqli->query('SELECT * FROM baugruppe');

$baugruppen = $result->fetch_all(MYSQLI_ASSOC);
?>
          <?php
          foreach($baugruppen as $baugruppe) {
          ?>
          <tr>
            <td ><?php echo "<a href='f_Baugruppe.php?baugruppe=".$baugruppe["baugruppeID"]."'>".$baugruppe["baugruppeID"]."</a>"?></td>
            <td><?php echo "<a href='f_Baugruppe.php?baugruppe=".$baugruppe["baugruppeID"]."'>". $baugruppe["bezeichnung"] ?></td>
            <td><?php echo "<a href='f_Baugruppe.php?baugruppe=".$baugruppe["baugruppeID"]."'>". $baugruppe["maschinentyp"] ?></td>
            <td><?php echo "<a href='f_Baugruppe.php?baugruppe=".$baugruppe["baugruppeID"]."'>". $baugruppe["produkt"] ?></td>
            
          </tr>
          <?php } ?>
          
          <!--------------------------------------->        
        </tbody>
          
      </table>
    </div>
  <!--BAUGRUPPETABELLE STOP --------------------------------------------------------------->
  </div>
  
<?php
  include('htmlFooter.php');
?>