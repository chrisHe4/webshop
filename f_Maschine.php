<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
<br></br>
  <button type="button" class="btn btn-primary"><a href="t_Maschinen.php"style="color:inherit" > Zurück </a></button>
  
    <div class="container">
      <H1>Adminbereich</H1>
      
    </div>

    <br></br>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p><b>Maschine bearbeiten</b></p>
   

      <?php
      $maschinentypID= "";
      $bezeichnung= "";
      
      if(isset($_GET["maschinentyp"]))
      {
$maschinentypID = $_GET["maschinentyp"];

$gewaelteMaschinen = $mysqli->query('SELECT * FROM maschinentyp where maschinentypID = '.$maschinentypID );
$bestimmteMaschine= mysqli_fetch_array($gewaelteMaschinen);
$maschinentypID= $bestimmteMaschine["maschinentypID"];
$bezeichnung= $bestimmteMaschine["bezeichnung"];

      }

?>
     


    <!--FORMULAR START---------------------------------------------------------------------->
    <div><form action ="f_Maschine.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">MaschinentypID</label>
          <input type="text" name="maschinentypID" class="form-control" id="inputEmail4" value =<?php echo $maschinentypID?>>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Bezeichnung</label>
          <input type="text" name="bezeichnung" class="form-control" id="inputPassword4"value =<?php echo $bezeichnung?>>
        </div>
      </div>
      
    <br></br>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
      <button type="submit"name = "speichern" class="btn btn-primary">Speichern</button>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
        <button type="submit" name="löschen" class="btn btn-primary">Löschen</button>
    
    </form></div>

    <!--FORMULAR STOP---------------------------------------------------------------------->
    <?php
  if(isset($_POST['speichern']))
  {
    $maschinentypID= intval($_POST['maschinentypID']);
    $bezeichnung= $_POST['bezeichnung'];
   ;
    $maschinecheck = $mysqli->query('SELECT maschinentypID FROM maschinentyp WHERE maschinentypID='.$maschinentypID);
    if (mysqli_num_rows($maschinecheck)) 
    {
      //Update
      $updateMaschine = $mysqli->query('UPDATE maschinentyp SET bezeichnung = "'.$bezeichnung.'" WHERE maschinentypID = '.$maschinentypID);
    }
    else
    {
      // Neues Produkt
      $neueMaschine = $mysqli->query('INSERT INTO maschinentyp (maschinentypID, bezeichnung)VALUES ('.
      $maschinentypID.',"'.$bezeichnung.'")');
     
    }
    echo "Daten in die DB gespeichert"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }

  if(isset($_POST['löschen']))
  {
    $maschinentypID= intval($_POST['maschinentypID']);
    $zuLoeschendeMaschine = $mysqli->query('DELETE FROM maschinentyp WHERE maschinentypID = '.$maschinentypID);
    
    echo "Daten aus der DB gelöscht"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }
?>


    

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
   
<?php
  include('htmlFooter.php');
?>