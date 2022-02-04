<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
<br></br>
  <button type="button" class="btn btn-primary"><a href="t_Produkte.php"style="color:inherit" > Zurück </a></button>
    <div class="container">
      <H1>Adminbereich</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
      
    </div>
  
<br></br>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p><b>Produkt bearbeiten</b></p>
   

      <?php
$produktID = $_GET["produkt"];

$gewaelteProdukte = $mysqli->query('SELECT * FROM produkt where produktID = '.$produktID );
$bestimmteProdukt= mysqli_fetch_array($gewaelteProdukte);


?>
     


    <!--FORMULAR START---------------------------------------------------------------------->
    <form action ="f_Produkt.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">ProduktID</label>
          <input type="text" name="produktid" class="form-control" id="inputEmail4"<?php echo $bestimmteProdukt["produktID"]?> >
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Bezeichnung</label>
          <input type="text" name="bezeichnung" class="form-control" id="inputPassword4">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Bild</label>
          <input type="text" name="bild" class="form-control" id="inputCity">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Produktbeschreibung</label>
        <textarea class="form-control" name="produktbeschreibung" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Preis</label>
          <input type="text" name="preis" class="form-control" id="inputCity">
        </div>
    <br></br>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
      <button type="submit" name = "speichern"class="btn btn-primary">Speichern</button>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
        <button type="submit" name="löschen" class="btn btn-primary">Löschen</button>
    
    </form>

    <!--FORMULAR STOP---------------------------------------------------------------------->
<?php
  if(isset($_POST['speichern']))
  {
    $produktid= $_POST['produktid'];
    $bezeichnung= $_POST['bezeichnung'];
    $bild= $_POST['bild'];
    $produktbeschreibung= $_POST['produktbeschreibung'];
    $preis= $_POST['preis'];


  }
?>
    

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

<?php
  include('htmlFooter.php');
?>