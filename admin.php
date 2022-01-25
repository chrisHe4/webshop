<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>webshop</title>
  </head>

  <body>
  <!--NAVBAR--START--------------------------------------------------------------------------->
    <?php
    include('navbar.php');
    ?>
  <!--NAVBAR--END--------------------------------------------------------------------------->

  
    <div class="container">
      <H1>Adminbereich</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
    <!--ÜBERSCHRIFT/TEXT--START---------------------------------------------------------------> 
      <p>Produkte bearbeiten</p>
    <!--BUTTON NEU/BEARBEITEN START--------------------------------------------------------->
    <button type="button" class="btn btn-primary">Produkte bearbeiten</button>
    <button type="button" class="btn btn-primary">Neue Produkte hinzufügen</button>

    <!--BUTTON NEU/BEARBEITEN STOP--------------------------------------------------------->
     


    <!--FORMULAR START---------------------------------------------------------------------->
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Produktname</label>
          <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Artikel</label>
          <input type="text" class="form-control" id="inputPassword4">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Preis</label>
          <input type="text" class="form-control" id="inputCity">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Produktbeschreibung</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    <br></br>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
      <button type="submit" class="btn btn-primary">Speichern</button>
    <!--BUTTON SPEICHER/LÖSCHEN START------------------------------------------------------->
        <button type="submit" class="btn btn-primary">Löschen</button>
    
    </form>

    <!--FORMULAR STOP---------------------------------------------------------------------->



    

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->
</body>
</html>