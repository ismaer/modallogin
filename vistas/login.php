<?php
require 'header.php';
?>
<!------ Include the above in your HEAD tag ---------->

<!-- BEGIN # BOOTSNIP INFO -->
<div class="container">
	<div class="row">
		<h1 class="text-center">Calculadora IMC (Indice de masa corporal)</h1>
        <p class="text-center"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Iniciar sesión</a></p>
	</div>
</div>
<!-- END # BOOTSNIP INFO -->

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				
                <div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="../public/images/blood-pressure-3312513_1280.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" action="">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Ingrese su nombre de usuario y contraseña.</span>
                            </div>
				    		<input id="login_username" name="login_username" class="form-control" type="text" placeholder="Username" required>

				    		<input id="login_password" name="login_password" class="form-control" type="password" placeholder="Password" required autocomplete="new-password">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Recordarme
                                </label>
                            </div>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar sesion</button>
                            </div>
				    	    <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link" >Olvidé mi contraseña?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link" >Registrarme</button>
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
    	    		    <div class="modal-body">
		    				<div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Ingrese su email.</span>
                            </div>
		    				<input id="lost_email" name="lost_email" class="form-control" type="email" placeholder="E-Mail" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link" >Iniciar sesión</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link" >Registrarme</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;">
            		    <div class="modal-body">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Registrar una cuenta.</span>
                            </div>
		    				<input id="register_username" name="register_username" class="form-control" type="text" placeholder="Username" required >
                            <input id="register_lastname" name="register_lastname" class="form-control" type="text" placeholder="Lastname" required>
                            <input id="register_email" name="register_email" class="form-control" type="email" placeholder="E-Mail" required>
                            <input id="register_password" name="register_password" class="form-control" type="password" placeholder="Password" autocomplete="new-password">
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Registrarme</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link" >Iniciar sesión</button>
                                <button id="register_lost_btn" type="button" class="btn btn-link" >Olvidé mi contraseña?</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
		    </div>
	    </div>
</div>
    <!-- END # MODAL LOGIN -->

<?php
require 'footer.php';
?>

<script type="text/javascript" src="scripts/login.js"> </script>