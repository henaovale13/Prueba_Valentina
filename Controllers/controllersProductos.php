<?php

class ControllerProductos{

    public function Create(){
        
        require_once("./../Model/productos.php");

        $productos = new Productos();

        if(
            $_POST['name'] == "" 
            or $_POST['peso'] <= 0 
            or $_POST['precio'] <= 0 
            or $_POST['referencia'] == "" 
            or $_POST['stock'] <= 0 
            or $_POST['fecha'] == "" 
            or $_POST['categoria'] == ""
        ){
        
            header('location: ./Productos.php?alerta=valid');
        }else{

            if(isset($_POST['salvar'])){
                $productos->create();

                header('location: ./Productos.php');
            }
        }

      

    }

    public function Delete(){

        require_once("./../Model/productos.php");

        $productos = new Productos();

        if(isset($_GET['id'])){
            $productos->delete($_GET['id']);

            header('location: ./Productos.php');
        }
    }
    public function Read(){
        require_once("./../Model/productos.php");

        $productos = new Productos();

        $cont = 1;
        foreach ($productos->getAll() as $key => $value) {

            echo "<tr>";
            echo  "<th scope='row'>".$cont."</th>";
            
            echo  "<td >" . $value->NOMBRE_PRODUCTO . "</td>";
            echo  "<td >" . $value->PESO . "</td>";
            echo  "<td >" . $value->PRECIO . "</td>";
            echo  "<td >" . $value->REFERENCIA . "</td>";
            echo  "<td >" . $value->STOCK . "</td>";
            echo  "<td >" .  $productos->getCategoria($value->CATEGORIA)[0]->categoria . "</td>";
            echo  "<td >" . $value->FECHA_CREACION . "</td>";
            echo  "<td>

            <div class='d-flex justify-content-center'>

            <a class='btn btn-primary mr-1' data-bs-toggle='modal' data-bs-target='#staticBackdrop1' data-bs-id='$value->ID'>Editar</i></a>

            <a href='./ruteador.php?controller=Productos&action=delete&id=$value->ID' class='btn btn-danger mr-1'>Borrar</a> 

            <a href='./../View/Comprar.php?id=$value->ID' class='btn btn-success mr-1'>Vender</a> 
            </div>

            </td>";
            echo "</tr>";
            $cont++;

           
        }
    }

    
    public function Update(){

        require_once("./../Model/productos.php");

        $productos = new Productos();
        if(
            $_POST['name'] == "" 
            or $_POST['peso'] <= 0 
            or $_POST['precio'] <= 0 
            or $_POST['referencia'] == "" 
            or $_POST['stock'] <= 0 
            or $_POST['fecha'] == "" 
            or $_POST['categoria'] == ""
        ){

            header('location: ./Productos.php?alerta=valid');

           } else{

                    if(isset($_POST['editar'])){
                        $productos->update();

                        header('location: ./Productos.php');
                    }

            }

     
        
    }

    public function UpdateStock(){

        require_once("./../Model/productos.php");

        $productos = new Productos();

        $productos->updateStock($_POST['id']);

        
    }

     public function getAll(){
        require_once("./../Model/productos.php");

        $productos = new Productos();
        echo count($productos->getAll());
        
    }

    public function getId(){
        require_once("./../Model/productos.php");

        $productos = new Productos();

        $data = $productos->getById($_GET['id']);

        //echo json_encode($data);
        return json_encode($data);
        
    }

    public function getbyId(){
        require_once("./../Model/productos.php");

        $productos = new Productos();

        $data = $productos->getById($_GET['id']);

        echo json_encode($data);
        
    }

}
?>