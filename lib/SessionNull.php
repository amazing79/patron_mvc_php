<?php

/**
 * Description of SinIniciar
 *
 * @author Ignacio
 */
require_once 'lib/ISessionState.php';

class SessionNull implements ISessionState{
    //put your code here
    
    private $p_user = "Ignacio Jauregui";
    
    public function showPage() {
         ?>
         <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Novedades APP 2.0</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!--meta tags necesarios -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- agregado para que el footer quede en el fondo
            <link rel="stylesheet" href="assets/css/styles.css">
             -->
            <!-- materialize CSS -->
            <link rel="stylesheet" href="materialize/css/materialize.min.css">
            <style>
                body{
                    background-image: url('assets/img/new_york.jpeg');
                    background-size: cover;
                }
                .center-main{
                    margin: 5% auto;
                    width:450px;
                    height:auto;
                }

                .login{
                    background: rgba(0,0,0,0.3);
                }
            </style>
        </head>
        <body>
            <main>

                <div class="center-main">
                    <div class="col s12 m6">
                    <form class="col s12 m6" id="frmLogin" name="frmLogin" method="post" action="validator.php">
                    <input type="hidden" name="hdn_user" value="<?php echo $this->p_user; ?>"/>
                    <!-- muestro form de loggin -->
                    <div class="card login" >
                        <div class="card-action blue-grey darken-3 white-text">
                            <span class="card-title">Login - App</span>
                        </div>

                        <div class="card-content login">
                            
                            <div class="form-field">
                            <input type="text" id="user" name="txtUser" class="validate" required="true" placeholder="Usuario"/>
                            <label for="user">Usuario:</label>
                            </div>

                            <div class="form-field"> 
                            <input type="password" id="pwd" name="txtPassword" class="validate" required="true" placeholder="Clave"/>
                            <label for="pwd">Clave(*):</label>
                            </div>

                            <div class="form-field center-align"> 
                            <input type="submit"  class="waves-effect waves-light btn" name="btnIngresar" value="Ingresar" />
                            </div>
                           
                            </div>

                        </div>
                        
                    </div>
                    <!-- Fin form de loggin -->
                    </form>
                    </div>
                </div>

            </main>
        </body>
        </html>
        <?php
    }

    public function exitApp() {
         echo '<h1>Ya arrancamos</h1>';
    }

    public function initApp() {
       return new SessionStarted();
    }

}
?>
