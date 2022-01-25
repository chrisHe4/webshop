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
    <!--REGISTRIERUNGSFORMULAR START-->
    <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" class="form-control" id="inputEmail4">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">E-mail</label>
            <input type="email" class="form-control" id="inputPassword4">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Password</label>
          <input type="password" class="form-control" id="inputAddress">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Password wiederholen</label>
          <input type="password" class="form-control" id="inputAddress2">
        </div>
        <br></br>
        <button type="submit" class="btn btn-primary">Registrieren</button>
    </form>
    <!--REGISTRIERUNGSFORMULAR END-->
</body>
</html>