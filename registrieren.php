<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registrieren</title>
  </head>

  <body>
  <!--NAVBAR--START--------------------------------------------------------------------------->
  <?php
    include('navbar.php');
  ?>
  <!--NAVBAR--END--------------------------------------------------------------------------->
  <div class="container">
    <h1>Registrieren Sie sich hier</h1>
    <p>Hinweis: Alle Felder sind Pflichtfelder!</p>
    <!--REGISTRIERUNGSFORMULAR START-->
    <form action="registrieren.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputVorname">Vorname</label>
          <?php 
            $vorname = $_POST['inputVorname'];
            if (isset($vorname))
            {
              echo '<input type="text" class="form-control" id="inputVorname" value="'.$vorname.'">';
            }
            else
            {
              echo '<input type="text" class="form-control" id="inputVorname">';
            }
          ?>
          <input type="text" class="form-control" id="inputVorname">
        </div>
        <div class="form-group col-md-6">
          <label for="inputNachname">Nachname</label>
          <input type="text" class="form-control" id="inputNachname">
        </div>
        <div class="form-group col-md-6">
          <label for="inputBenutzername">Benutzername</label>
          <input type="text" class="form-control" id="inputBenutzername">
        </div>
        <div class="form-group col-md-6">
          <label for="inputMail">E-mail</label>
          <input type="email" class="form-control" id="inputMail">
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress">Password</label>
        <input type="password" class="form-control" id="inputAddress">
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress2">Password wiederholen</label>
        <input type="password" class="form-control" id="inputAddress2">
      </div>
      <div class="form-group col-md-6">
        <label for="inputOrt">Ort</label>
        <input type="text" class="form-control" id="inputOrt">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPostleitzahl">Postleitzahl</label>
        <input type="text" class="form-control" id="inputPostleitzahl">
      </div>
      <div class="form-group col-md-6">
        <label for="inputStrasse">Straße</label>
        <input type="text" class="form-control" id="inputStrasse">
      </div>
      <br></br>
      <button type="submit" class="btn btn-primary">Registrieren</button>
    </form>
    <br></br>
    <!--REGISTRIERUNGSFORMULAR END-->
  </div>
  </body>
  </html>