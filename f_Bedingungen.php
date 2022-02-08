<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
<br></br>
<div class="container" >
  <button type="button" class="btn btn-primary"><a href="t_Bedingungen.php"style="color:inherit" > Zurück </a></button>
  
    <div class="container">
      <H1>Adminbereich</H1>
      
    </div>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p><b>Bedingungen bearbeiten</b></p>
   

    
     
      <?php
      $bedingungID= "";
      $baugruppe= "";
      $fertige_baugruppe= "";
      $menge= "";
      
      if(isset($_GET["bedingung"]))
      {
$bedingungID = $_GET["bedingung"];

$gewaelteBedingungen = $mysqli->query('SELECT * FROM bedingung where bedingungID = '.$bedingungID );
$bestimmteBedingung= mysqli_fetch_array($gewaelteBedingungen);
$bedingungID= $bestimmteBedingung["bedingungID"];
$baugruppe= $bestimmteBedingung["baugruppe"];
$fertige_baugruppe= $bestimmteBedingung["fertige_baugruppe"]; 
$menge= $bestimmteBedingung["menge"];

      }

?>

    <!--FORMULAR START---------------------------------------------------------------------->
   <div> <form action ="f_Bedingungen.php" method="POST" >
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">BedingungID</label>
          <input type="text" name="bedingungID" class="form-control" id="inputEmail4" value =<?php echo $bedingungID?>>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Baugruppe</label>
          <input type="text" name="baugruppe" class="form-control" id="inputPassword4" value =<?php echo $baugruppe?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Fertige Baugruppe</label>
          <input type="text" name="fertigeBaugruppe" class="form-control" id="inputCity" value =<?php echo $fertige_baugruppe?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Menge</label>
          <input type="text" name="menge" class="form-control" id="inputCity" value =<?php echo $menge?>>
        </div>
    <br></br>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
      <button type="submit"name = "speichern" class="btn btn-primary">Speichern</button>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
        <button type="submit"name="löschen" class="btn btn-primary">Löschen</button>
    
    </form></div>
    </div>
    <!--FORMULAR STOP---------------------------------------------------------------------->



    

   
    <?php
  if(isset($_POST['speichern']))
  {
    $bedingungID= intval($_POST['bedingungID']);
    $baugruppe= intval($_POST['baugruppe']);
    $fertige_baugruppe=intval( $_POST['fertigeBaugruppe']);
    $menge=intval( $_POST['menge']);
    
    $bedingungcheck = $mysqli->query('SELECT bedingungID FROM bedingung WHERE bedingungID='.$bedingungID);
    if (mysqli_num_rows($bedingungcheck)) 
    {
      //Update
      $updateBedingung = $mysqli->query('UPDATE bedingung SET baugruppe = '.$baugruppe.', fertige_baugruppe = '.$fertige_baugruppe.',menge = '.$menge.' WHERE bedingungID = '.$bedingungID);
    }
    else
    {
      // Neue Bedingung
      $neueBedingung = $mysqli->query('INSERT INTO bedingung (bedingungID, baugruppe, fertige_baugruppe, menge) VALUES ('.
        $bedingungID.','.$baugruppe.','.$fertige_baugruppe.','.$menge.')');
        // $neueBedingung = $mysqli->query('INSERT INTO bedingung (bedingungID, baugruppe, fertige_baugruppe, menge) VALUES (20, 200102, 200102, 1)');
     
    }
    echo "Daten in die DB gespeichert"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }

  if(isset($_POST['löschen']))
  {
    $bedingungID= intval($_POST['bedingungID']);
    $zuLoescheBedingung = $mysqli->query('DELETE FROM bedingung WHERE bedingungID = '.$bedingungID);
    // TODO testen
    echo "Daten aus der DB gelöscht"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }
?>

  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

<?php
  include('htmlFooter.php');
?>