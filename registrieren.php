<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Registrieren';
  include('htmlHeader.php');
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

<?php
  include('htmlFooter.php');
?>