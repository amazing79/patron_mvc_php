<?php

abstract class EnumAccion{

    const agregar = 'agregar_contenido';
    const modificar = 'editar_contenido';
    const eliminar  = 'eliminar_contenido';
    const mostrar_agregar = 'mostrar_agregar'; 
    const mostrar_editar = 'mostrar_editar';
    const mostrar_eliminar = 'mostrar_eliminar';
    const show_index = 'listar';

    public static function Agregar()
    {
        return self::agregar;
    }

    public static function Modificar()
    {
        return self::modificar;
    }

    public static function Eliminar()
    {
        return self::eliminar;
    }

    public static function Mostrar_index()
    {
        return self::show_index;
    }

    public static function Mostrar_Agregar()
    {
        return self::mostrar_agregar;
    }

    public static function Mostrar_Editar()
    {
        return self::mostrar_editar;
    }

    public static function Mostrar_Eliminar()
    {
        return self::mostrar_eliminar;
    }

}
?>