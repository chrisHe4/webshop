<?php
require_once("./dbconnect.php");
?>
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
  <?php
    include('navbar.php');
  ?>
  <!--NAVBAR--END--------------------------------------------------------------------------->

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container">
      <H1>Baugruppe</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

  <!--WARENKORBTABELLE START--------------------------------------------------------------->
    <div class="container">
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
  <!--WARENKORBTABELLE STOP --------------------------------------------------------------->
  </div>
  
</body>
</html>