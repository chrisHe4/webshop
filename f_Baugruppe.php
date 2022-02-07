<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
<br></br>
  <button type="button" class="btn btn-primary"><a href="t_Baugruppe.php"style="color:inherit" > Zurück </a></button>
  
    <div class="container">
      <H1>Adminbereich</H1>
      
    </div>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p><b>Baugruppe bearbeiten</b></p>
   

    
     
      <?php
      $baugruppeID= "";
      $bezeichnung= "";
      $maschinentyp= "";
      $produkt= "";
      
      if(isset($_GET["baugruppe"]))
      {
$baugruppeID = $_GET["baugruppe"];

$gewaelteBaugruppen = $mysqli->query('SELECT * FROM baugruppe where baugruppeID = '.$baugruppeID );
$bestimmteBaugruppe= mysqli_fetch_array($gewaelteBaugruppen);
$baugruppeID= $bestimmteBaugruppe["baugruppeID"];
$bezeichnung= $bestimmteBaugruppe["bezeichnung"];
$maschinentyp= $bestimmteBaugruppe["maschinentyp"]; 
$produkt= $bestimmteBaugruppe["produkt"];

      }

?>

    <!--FORMULAR START---------------------------------------------------------------------->
    <form action ="f_Baugruppe.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">BaugruppeID</label>
          <input type="text" name ="baugruppeID" class="form-control" id="inputEmail4" value =<?php echo $baugruppeID?>>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Bezeichnung</label>
          <input type="text" name="bezeichnung" class="form-control" id="inputPassword4" value=<?php echo $bezeichnung?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Maschinentyp</label>
          <input type="text" name="maschinentyp" class="form-control" id="inputCity"value=<?php echo $maschinentyp?>>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Produkt</label>
          <input type="text" name="produkt" class="form-control" id="inputCity" value=<?php echo $produkt?>>
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
    $baugruppeID= intval($_POST['baugruppeID']);
    $bezeichnung= $_POST['bezeichnung'];
    $maschinentyp=intval( $_POST['maschinentyp']);
    $produkt= intval($_POST['produkt']);
    $baugruppecheck = $mysqli->query('SELECT baugruppeID FROM baugruppe WHERE baugruppeID='.$baugruppeID);
    if (mysqli_num_rows($baugruppecheck)) 
    {
      //Update
      $updateBaugruppe = $mysqli->query('UPDATE baugruppe SET bezeichnung = "'.$bezeichnung.'", maschinentyp = '.$maschinentyp.',produkt = '.$produkt.' WHERE baugruppeID = '.$baugruppeID);
    }
    else
    {
      // Neue Baugruppe
      $neueBaugruppe = $mysqli->query('INSERT INTO baugruppe (baugruppeID, bezeichnung, maschinentyp, produkt)VALUES ('.
        $baugruppeID.',"'.$bezeichnung.'",'.$maschinentyp.','.$produkt.')');
     
    }
    echo "Daten in die DB gespeichert"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }

  if(isset($_POST['löschen']))
  {
    $baugruppeID= intval($_POST['baugruppeID']);
    $zuLoeschendeBaugruppe = $mysqli->query('DELETE FROM baugruppe WHERE baugruppeID = '.$baugruppeID);
    // TODO testen
    echo "Daten aus der DB gelöscht"; // Optionales TODO Prüfen ob die Anfrage an die DB wirklich geklappt hat
  }
?>


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
   
<?php
  include('htmlFooter.php');
?>