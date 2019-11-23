<?php
    use \vista\Vista;

    class UserController {
     
        public function index() {
            return Vista::crear("inicio.index");
        }

        public function nuevo() {
            return Vista::crear("usuario.create");
        }
      
        public function registrarnuevo(){
            return Vista::crear("usuario.register");
        }
        
        public function editaruser(){
            return Vista::crear("usuario.index");
        }

        public function agregar() {
           
            $usuario = new UserModel();
            $usuario->setEmail($_POST['email']);
            $usuario->setNombres($_POST['nombres']);
            $passHash = password_hash($_POST['passwd'], PASSWORD_BCRYPT);
            $usuario->setPasswd($passHash);
            $usuario->setRol($_POST['rol']);
            $usuario->setPrograma($_POST['programa']);
            $data = $usuario->RegistroUser();
        
            if ($data['status'] == 1) {
                Redirecciona::LetsGoTo('home');
                echo $data['msg']; 
            } else {
                echo $data['error'];
            }
        }

        public function editar($id) {
            $modeluser = new UserModel();
            $mande = $modeluser->info($id);
            return Vista::crear("usuario.update",$mande['users']);
        }

        public function eliminar($id) {
            $modeluser = new UserModel();
            $modeluser->deleteuser($id);
            Vista::crear("usuario.update");
            
        }

        public function signin(){
            $usuario = new UserModel();
            $session = new SessionesModel();
            $usuario->setEmail($_POST['email']);
            $usuario->setPasswd($_POST['pass']);
            $data = $usuario->login();
            
                 if ($data['user']['email'] == $usuario->getEmail()) {
                if (password_verify($usuario->getPasswd(), $data['user']['contrasena'])) {
                    @session_start();
                    $session->CreateSession('usuario', $data['user']['nombres']);
                    Redirecciona::LetsGoTo('home');
                } else {
                    $notification = 'toastr.error("Datos erroneos", "Contraseña incorrecta")';
                    $session->CreateNotification($notification);
                    Redirecciona::LetsGoTo('');
                }
            } else {
                echo "Usuario incorrecto";
            }
        }

        public function logout() {
            $session = new SessionModel();
            $session->DestroySession();
        }

        public function recoverypass() {
            $usuario = new UserModel();
            $session = new SessionesModel();

            $email = $_POST['email'];
            $newpass = $_POST['newpass'];
            $retrynewpass = $_POST['retrynewpass'];
            

            if ($newpass == $retrynewpass) {
                $usuario->setPasswd(password_hash($newpass, PASSWORD_BCRYPT));
                $data = $usuario->CambiarContrasena($email);

                if($data['status'] == 1) {
                    $notification = 'toastr.success("Accion exitosa", "'. $data['msg'] .'")';
                    $session->CreateNotification($notification);
                    Redirecciona::LetsGoTo('');
                } else {
                    //echo "Email incorrecto";
                    $notification = 'toastr.error("Datos erroneos", "Email incorrecto, no existe")';
                    $session->CreateNotification($notification);
                    Redirecciona::LetsGoTo('');    
                }
            } else {
                $notification = 'toastr.error("Datos erroneos", "Las contraseñas no coinciden")';
                $session->CreateNotification($notification);
                Redirecciona::LetsGoTo('');
            }
        }
    }
