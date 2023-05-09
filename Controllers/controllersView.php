<?php

class ControllerViews{

    public function Producto(){
        return"./Productos.php";
    }

    public function Cards(){
        header('location: ./Cards.php');
    }

    public function Venta(){
        return "./Venta.php";
    }

    

    public function Index(){
        return "./../index.php";
    }

    public function Ventas(){
        return"./ventas.php";
    }

}

