<?php
  // Auslagerung, da alle Seiten das gleiche Grundgerüst haben
  $pageName = 'Webshop Admin';
  include('htmlHeader.php');
?>
  
    <div style ="text-align:center;" >
      <H1>Adminbereich</H1>
      <p>Willkommen im Adminbereich!</p>
    </div>
    <div >
    <form class="d-grid gap-2 col-6 mx-auto " action="t_Produkte.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Produkte">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="t_Baugruppe.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Baugruppe">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="t_Maschinen.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Maschinentyp">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="t_KonkreteMaschine.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Konkrete Maschine">
            </form>
    </br>
    <form class="d-grid gap-2 col-6 mx-auto " action="t_Bedingungen.php" method="POST">
              <input class="btn btn-primary" type="submit" value="Bedingunen">
            </form>
    </div>

    

   


  <!--ÜBERSCHRIFT/TEXT--STOP--------------------------------------------------------------->

<?php
  include('htmlFooter.php');
?>