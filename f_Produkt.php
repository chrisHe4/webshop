<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
<br></br>
  <button type="button" class="btn btn-primary"><a href="t_Produkte.php"style="color:inherit" > Zurück </a></button>
    <div class="container">
      <H1>Adminbereich</H1>
      
      
    </div>
  
<br></br>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p><b>Produkt bearbeiten</b></p>
   

      <?php
      $produktID= "";
      $bezeichnung= "";
      $bild= "";
      $beschreibung= "";
      $preis= "";
      if(isset($_GET["produkt"]))
      {
$produktID = $_GET["produkt"];

$gewaelteProdukte = $mysqli->query('SELECT * FROM produkt where produktID = '.$produktID );
$bestimmteProdukt= mysqli_fetch_array($gewaelteProdukte);
$produktID= $bestimmteProdukt["produktID"];
$bezeichnung= $bestimmteProdukt["bezeichnung"];
$bild= $bestimmteProdukt["bildlink"]; 
$beschreibung= $bestimmteProdukt["beschreibung"];
$preis= $bestimmteProdukt["preis"];
      }

?>
     


    <!--FORMULAR START---------------------------------------------------------------------->
   <div> <form action ="f_Produkt.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">ProduktID</label>
          <input type="text" name="produktID" class="form-control" id="inputEmail4" value =<?php echo $produktID?> >
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Bezeichnung</label>
          <input type="text" name="bezeichnung" class="form-control" id="inputPassword4" value=<?php echo $bezeichnung?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Bild</label>
          <input type="text" name="bildlink" class="form-control" id="inputCity"value=<?php echo $bild?>> 
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Produktbeschreibung</label>
        <textarea class="form-control" name="beschreibung" id="exampleFormControlTextarea1"value=<?php echo $beschreibung?> rows="3"></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Preis</label>
          <input type="text" name="preis" class="form-control" id="inputCity"value=<?php echo $preis?>>
        </div>
    <br></br>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
      <button type="submit" name = "speichern"class="btn btn-primary">Speichern</button>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
        <button type="submit" name="löschen" class="btn btn-primary">Löschen</button>
    
    </form></div>

    <!--FORMULAR STOP---------------------------------------------------------------------->
<?php
  if(isset($_POST['speichern']))
  {
    $produktID= intval($_POST['produktID']);
    $bezeichnung= $_POST['bezeichnung'];
    $bild= $_POST['bildlink'];
    $beschreibung= $_POST['beschreibung'];
    $preis= floatval($_POST['preis']);
    $produktcheck = $mysqli->query('SELECT produktID FROM produkt WHERE produktID='.$produktID);
    if (mysqli_num_rows($produktcheck)) 
    {
      //Update
      $updateProdukt = $mysqli->query('UPDATE produkt SET bezeichnung = "'.$bezeichnung.'", preis = '.$preis.',beschreibung = "'.$beschreibung.'", bildlink = "'.$bild.'" WHERE produktID = '.$produktID);
    }
    else
    {
      // Neues Produkt
      $neuesProdukt = $mysqli->query('INSERT INTO produkt (produktID, bezeichnung, preis, beschreibung, bildlink)VALUES ('.
        $produktID.',"'.$bezeichnung.'",'.$preis.',"'.$beschreibung.'","'.$bild.'")');
     
    }
    echo "Daten in die DB gespeichert"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }

  if(isset($_POST['löschen']))
  {
    $produktID= intval($_POST['produktID']);
    $zuLoeschendesProdukt = $mysqli->query('DELETE FROM produkt WHERE produktID = '.$produktID);
    // TODO testen
    echo "Daten aus der DB gelöscht"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }
?>
    

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

<?php
  include('htmlFooter.php');
?>