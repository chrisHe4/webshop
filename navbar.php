    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Webshop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Achtung! form class d-flex macht rechtbündig-->
        
        <form class="d-flex">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">   
            
            <li><a class="nav-link active" href="warenkorb.php">Warenkorb</a></li>
            <li><a class="nav-link active" href="datenschutz.php">Datenschutz</a></li>
            <li><a class="nav-link active" href="impressum.php">Impressum</a> </li>
              
            <?php 
              // Benutzer angemeldet? --> ja
              $benutzername = '';
              if (isset($_SESSION['webshopLogin'][0]['benutzername']) and $_SESSION['webshopLogin'][0]['benutzername'] != '')
              {
                $benutzername = $_SESSION['webshopLogin'][0]['benutzername'];
              }
            ?>
            <div class="btn-group">
              <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <?php if ($benutzername != '') {echo $benutzername;} else {echo 'Anmelden';} ?>
              </button>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <?php 
                  if ($benutzername != '') 
                  {
                    echo '<li><a class="dropdown-item" href="logoutRedirect.php">Logout</a></li>';
                  }
                  else
                  {
                    echo '<li><a class="dropdown-item" href="login.php">Login</a></li>';
                    echo '<li><a class="dropdown-item" href="registrieren.php">Registrieren</a></li>';
                  } 
                ?>
              </ul>
            </div>
          </form>
        </div>
      </div>
    </nav>
    <!--script im body nicht im head, weil wenn Fehler in js, dann wird trotzdem html angezeigt-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
