<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <style>
      body{
.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
    </style>
  </head>
  <body>
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
      <img src="../assets/img/draw2.jpg" class="img-fluid">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <form action="" method="POST" enctype="multipart/form-data">

        <?php

          include_once './../Controllers/controllersModel.php';
          $controllers = new ControllerModels();
          $controllers->Login();
        ?>
            <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Login</p>
          </div>
          <div class="form-outline mb-4">
          <input class="form-control mb-3" type="text" name="username" placeholder="Ingrese su usuario" required>
            <label class="form-label" for="form3Example3">Usuario</label>
          </div> 
          <div class="form-outline mb-3">
          <input class="form-control mb-3" type="password" name="password" placeholder="Ingrese su contraseña" required>
            <label class="form-label" for="form3Example4">Contraseña</label>
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
          <input class="btn btn-primary mb-3" name="btn" type="submit" value="Acceder" id="submit" style="padding-left: 2.5rem; padding-right: 2.5rem;"> 
          </div>
        </form>
    </div>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>