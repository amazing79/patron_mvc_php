<?php
  require_once 'lib/SessionManager.php';
  
  $session = SessionManager::getInstance();
  $acceso_valido = false;
  
  $user = filter_input(INPUT_POST, 'hdn_user');
  if(isset($user))
  {
      if( $user != "")
      {
          $es_admin = (filter_input(INPUT_POST, 'txtUser') == 'admin')? true : false;
          $contrasenia_correcta = (filter_input(INPUT_POST, 'txtPassword') == '123456') ? true : false;
          if($es_admin && $contrasenia_correcta)
          {
              $acceso_valido = true;
          }
      }
      if($acceso_valido)
      {
        $session->startSession($user);
        $session->setState(new SessionStarted());
      }
      else {
        $session->session_close();
        $session->init_session();
      }
  }
  else {
    $session->session_close();
    $session->init_session();
  }
  header('location: index.php');
?>
