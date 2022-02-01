<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop';
  include('htmlHeader.php');
?>
<br></br>
  <button type="button" class="btn btn-primary"><a href="t_Maschinen.php"style="color:inherit" > Zurück </a></button>
  
    <div class="container">
      <H1>Adminbereich</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p><b>Maschine bearbeiten</b></p>
   

    
     


    <!--FORMULAR START---------------------------------------------------------------------->
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">MaschinentypID</label>
          <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Bezeichnung</label>
          <input type="text" class="form-control" id="inputPassword4">
        </div>
      </div>
      
    <br></br>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
      <button type="submit" class="btn btn-primary">Speichern</button>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
        <button type="submit" class="btn btn-primary">Löschen</button>
    
    </form>

    <!--FORMULAR STOP---------------------------------------------------------------------->



    

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
   
<?php
  include('htmlFooter.php');
?>