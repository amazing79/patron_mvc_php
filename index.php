
<?php
    require_once 'lib/SessionManager.php';
    $session = SessionManager::getInstance();
    
    $session->getState()->showPage();
?>

