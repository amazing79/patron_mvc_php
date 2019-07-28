<?php
/**
 * Description of SessionManager
 *
 * @author Ignacio
 */
//require_once 'lib/ISessionState.php';
require_once 'lib/SessionNull.php';
require_once 'lib/SessionStarted.php';

class SessionManager {
    //put your code here
    private $hora_inicio = 'hora_inicio'; 
    private $hora_fin = 'hora_fin';
    private $session_name = '4PP_N0V3D4D35';
    private $session_id = 'SID';
    private static $instancia = null;
    private $sesion_state = null;
    private $session_index = 'session_state';
    private $format = 'd/m/Y - H:i';


    private function __construct()
    {
        $this->init_session();
    }
    
    public static function getInstance()
    {
        if (!(self::$instancia instanceof SessionManager))
		{
			self::$instancia = new SessionManager();
		}
        
        return self::$instancia;   
    }
    
    public function init_session()
    {
        session_name($this->session_name);
        session_start();
        if(!isset($_SESSION[$this->session_index]))
        {
            $this->sesion_state = new SessionNull();
            $_SESSION[$this->session_index] = $this->sesion_state;
        }
    }
    
    public function session_close()
    {
        $_SESSION = array();
        unset($_SESSION);
        session_destroy();
    }
    
    public function setUser($unUsuario)
    {
        $key_session = $this->session_name . '-usuario';
        $_SESSION[$key_session] = $unUsuario; 
    }
    
    public function getUser()
    {
        $key_session = $this->session_name . '-usuario';
        if ( isset($_SESSION[$key_session]))
        {
            return $_SESSION[$key_session];
        }
        return null;
    }
    
    public function getSessionID()
    {
        return $_SESSION[$this->session_id];
    }
    
     public function setSessionID($value)
    {
        $_SESSION[$this->session_id] = $value;
    }
    
    public function getState()
    {
        return $_SESSION[$this->session_index];
    }
    
    public function setState(ISessionState $newState)
    {
        $this->sesion_state = $newState;
        $_SESSION[$this->session_index] = $this->sesion_state;
    }
    
    public function getHoraInicio()
    {
        $ts = $_SESSION[$this->hora_inicio];
        $d = new DateTime("@$ts");
 
        return $d->format($this->format);
    }
    
    public function setHoraInicio($hora_ini)
    {
        $_SESSION[$this->hora_inicio] = $hora_ini;
    }
    
    public function getHoraFin()
    {
        $ts = $_SESSION[$this->hora_fin];
        $d = new DateTime("@$ts");
 
        return $d->format($this->format);
    }
    
     public function setHoraFin($horafin)
    {
        $_SESSION[$this->hora_fin] = $horafin;
    }
    
    public function isActive()
    {
        return $_SESSION[$this->hora_fin] > time();
    }
    
    public function startSession($user)
    {
        $this->session_close();
        //genero una nueva session para el usuario logueado
        //session_id(md5($this->generateSessionID() . '-' . $user) . md5(time()));
        session_name($this->session_name);
        session_start();
        //seteo los valores de la session actual, de acuerdo al usuario autenticado
        //ToDo -> hacer procedimiento de validacion de usuario. 
        $this->setUser($user);
        $this->setSessionID(session_id());
        $this->setHoraInicio(time());
        $this->setHoraFin(strtotime('+25 minutes'));
    }
    
    private function generateSessionID()
    {
        $semilla = time();
        return md5($this->session_name . rand($semilla, $semilla + 1024));
    }
}
?>
