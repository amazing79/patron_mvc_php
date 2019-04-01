<?php

class conexion {
    
    private $conection = null;

    public static function conectar ()
    {
        try{
            $conection = new mysqli('localhost', 'productosmvc', 'producto', 'productos');

            return $conection;
        }
        catch (exception $e)
        {
            die('Ocurrio el error: ' . $e->getMessage() . 'Error al conectarse a la base de datos');
        }
    }
}

?>