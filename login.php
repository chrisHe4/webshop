<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Login';
  include('htmlHeader.php');
?>

  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container" style="text-align: center;">
      <H1>Anmeldung</H1>
      <p>Hier könnte noch mehr Text stehen!!!</p>
    </div>
  <!--ÜBERSCHRIFT/TEXT--START--------------------------------------------------------------->
    <div class="container" style="text-align: center;">
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">E-Mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Ihre Daten werden niemals an Dritte weitergegeben.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Passwort</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">einloggen</button>
      </form>
    </div>

<?php
  include('htmlFooter.php');
?>