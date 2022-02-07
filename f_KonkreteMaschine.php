<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
  <br></br>
  <button type="button" class="btn btn-primary"><a href="t_KonkreteMaschine.php"style="color:inherit" > Zurück </a></button>
    <div class="container">
      <H1>Adminbereich</H1>
     
    </div>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p><b>Konkrete Maschine bearbeiten</b></p>
   

    
     

      <?php
      $konkrete_maschineID= "";
      $maschinentyp= "";
      $bezeichnung= "";
      
      
      if(isset($_GET["konkrete_maschine"]))
      {
$konkrete_maschineID = $_GET["konkrete_maschine"];

$gewaelteKonkrete_maschinen = $mysqli->query('SELECT * FROM konkrete_maschine where konkrete_maschineID = '.$konkrete_maschineID );
$bestimmteKonkrete_maschine= mysqli_fetch_array($gewaelteKonkrete_maschinen);
$konkrete_maschineID= $bestimmteKonkrete_maschine["konkrete_maschineID"];
$maschinentyp= $bestimmteKonkrete_maschine["maschinentyp"]; 
$bezeichnung= $bestimmteKonkrete_maschine["bezeichnung"];


      }

?>
    <!--FORMULAR START---------------------------------------------------------------------->
    <form action ="f_KonkreteMaschine.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Konkrete_MaschineID</label>
          <input type="text" name="konkrete_MaschineID" class="form-control" id="inputEmail4" value =<?php echo $konkrete_maschineID?>>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Maschinentyp</label>
          <input type="text"name="maschinentyp" class="form-control" id="inputPassword4" value=<?php echo $maschinentyp?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Bezeichnung</label>
          <input type="text"name="bezeichnung" class="form-control" id="inputCity" value=<?php echo $bezeichnung?>>
        </div>
      </div>
      
    <br></br>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
      <button type="submit" name = "speichern" class="btn btn-primary">Speichern</button>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
        <button type="submit" name="löschen" class="btn btn-primary">Löschen</button>
    
    </form>

    <!--FORMULAR STOP---------------------------------------------------------------------->



    <?php
  if(isset($_POST['speichern']))
  {
    $konkrete_maschineID= intval($_POST['konkrete_maschineID']);
    $maschinentyp=intval( $_POST['maschinentyp']);
    $bezeichnung= $_POST['bezeichnung'];
    
    $konkrete_maschinecheck = $mysqli->query('SELECT konkrete_maschineID FROM konkrete_maschine WHERE konkrete_maschineID='.$konkrete_maschineID);
    if (mysqli_num_rows($konkrete_maschinecheck)) 
    {
      //Update
      $updateKonkrete_maschine = $mysqli->query('UPDATE konkrete_maschine SET maschinentyp = '.$maschinentyp.', bezeichnung = "'.$bezeichnung.'" WHERE konkrete_maschineID = '.$konkrete_maschineID);
    }
    else
    {
      // Neue Konkrete_Maschine
      $neueKonkrete_maschine = $mysqli->query('INSERT INTO konkrete_maschine (konkrete_maschineID, maschinentyp, bezeichnung)VALUES ('.
      $konkrete_maschineID.','.$maschinentyp.',"'.$bezeichnung.'")');
     
    }
    echo "Daten in die DB gespeichert"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }

  if(isset($_POST['löschen']))
  {
    $konkrete_maschineID= intval($_POST['konkrete_maschineID']);
    $zuLoeschendeKonkrete_maschine = $mysqli->query('DELETE FROM konkrete_maschine WHERE konkrete_maschineID = '.$konkrete_maschineID);
    // TODO testen
    echo "Daten aus der DB gelöscht"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }
?>

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
   
<?php
  include('htmlFooter.php');
?>