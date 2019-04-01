<?php 
 require_once('controller/proveedor_controller.php');
 require_once('controller/EnumAccion.php');

 $controller = new ProveedorController();
 if (isset($_REQUEST['accion']))
 {
     switch($_REQUEST['accion'])
     {
         case EnumAccion::Mostrar_Agregar():
             $controller->cargarAlta();
             break;
         case EnumAccion::Mostrar_Editar():
             $controller->cargarEdicion($_POST);
         break;
         case EnumAccion::Mostrar_Eliminar():
             $controller->cargarEliminar($_POST);
         break;
         case EnumAccion::Agregar():
         $unObj = $controller->cargarDatos($_POST);
         $controller->guardarDatos($unObj);
         break;
         case EnumAccion::Modificar():
         $unObj = $controller->cargarDatos($_POST);
         $controller->modificarDatos($unObj);
         break;
         case EnumAccion::Eliminar():
         $unObj = $controller->cargarDatos($_POST);
         $controller->eliminarDatos($unObj);
         break;
         default:
         $controller->index();
     }
 }
 else{
     $controller->index();
 }

?>