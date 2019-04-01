<?php
class AppRouter
{
    const DEFAULT_PAGE = 'default.php';
    
    public static function router($pagina)
    {
        if(($pagina != ''))
        {
            require_once('paginas/'. $pagina .'.php');
        }
        else
        {
            require_once('paginas/'. self::DEFAULT_PAGE);   
        }
    }
}
?>