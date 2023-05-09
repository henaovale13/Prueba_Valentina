<?php
echo    "<title>Productos</title>";

echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>";

require_once "./base/navbar.php";

include_once './../Controllers/controllersProductos.php';
$controllers = new ControllerProductos();

?>

<div class="container">


  <?php
  if (isset($_GET['alert'])) {
    echo "<div class='alert alert-success' role='alert'>
  Compra exitosa
</div>";
  }

  if (isset($_GET['alerta'])) {
    echo "<div class='alert alert-danger' role='alert'>
    campos vacios o campos invalidos
</div>";
  }

  


  ?>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Registrar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="./ruteador.php?controller=Productos&action=create" method="post">

            <?php
              include './form_productos.php';
            ?>

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <input name="salvar" value="Registrar" type="submit" class="btn btn-primary">
        </div>

        </form>

      </div>
    </div>
  </div>

  <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="./ruteador.php?controller=Productos&action=update" method="post">

            <?php
              include './form_productos.php';
            ?>

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <input name="editar" value="Editar" type="submit" class="btn btn-primary">
        </div>

        </form>

      </div>
    </div>
  </div>

  <script>
             
              let modalEdit = document.getElementById('staticBackdrop1');

                modalEdit.addEventListener('shown.bs.modal',(e) =>{
                console.log('entro');

                let button = e.relatedTarget
                id = button.getAttribute('data-bs-id')

                Inputid = modalEdit.querySelector('.modal-body #id')
                nombre = modalEdit.querySelector('.modal-body #name')
                peso = modalEdit.querySelector('.modal-body #peso')
                precio = modalEdit.querySelector('.modal-body #precio')
                referencia = modalEdit.querySelector('.modal-body #referencia')
                categoria = modalEdit.querySelector('.modal-body #categoria')
                fecha = modalEdit.querySelector('.modal-body #fecha')
                stock = modalEdit.querySelector('.modal-body #stock')


                let url = './ruteador.php?controller=Productos&action=getbyId&id='+ id;

                peticion(url)
               

              })

              function peticion(url){

                fetch(url,{
                  method:"GET"
                }).then(response =>  response.json())
                  .then(data =>{

                    console.log(data)

                      Inputid.value = data.ID
                      nombre.value = data.NOMBRE_PRODUCTO
                      peso.value = data.PESO
                      referencia.value = data.REFERENCIA
                      categoria.value = data.CATEGORIA
                      precio.value = data.PRECIO
                      fecha.value = data.FECHA_CREACION
                      stock.value = data.STOCK

                }).cath(err => console.log(err))

              }
  
                      </script>


  <div class="row mt-4">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-center">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Peso</th>
                <th scope="col">Precio</th>
                <th scope="col">Referencia</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

            <tbody class="text-center">

              <?php
              $controllers->Read();
              ?>
            </tbody>
          </table>
        </div>
      </div>


      <?php

      echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

   ?>