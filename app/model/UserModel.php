<?php
    class UserModel {
        private $nombres;
        private $email;
        private $passwd;
        private $rol;
        private $programa;
        private $DataBase;

        public function __construct() {
			$connection = new Conexion();
            $this->DataBase = $connection->get_conexion();
        }

        public function setNombres ($nombres) {
            $this->nombres = $nombres;
        }

        public function setEmail ($email) {
            $this->email = $email;
        }

        
        public function setPasswd ($passwd) {
            $this->passwd = $passwd;
        }

        public function setRol ($rol) {
            $this->rol = $rol;
        }

        public function setPrograma ($programa) {
            $this->programa = $programa;
        }
        /* ---------------------------------GET----------------------------------- */

        public function getNombres () {
            return $this->nombres;
        }

        public function getEmail () {
            return $this->email;
        }

        public function getPasswd () {
            return $this->passwd;
        }

        public function getRol () {
            return $this->rol;
        }
        public function getPrograma () {
            return $this->programa;
        }

        public function login()
        {
          
            try {
                $sql = "SELECT * FROM user WHERE email = ?";
                $query = $this->DataBase->prepare($sql);
                $data = [$this->getEmail()];
                $query->execute($data);
                $infousuario = $query->fetch();
                $response = ['status' => 1, 'user' => $infousuario];
            } catch (Exception $e) {
                $response = ['status' => 0, 'Error'=>$e];
            }

            return $response;
        }
        public function RegistroUser () {
            
            try {
                $sql = "INSERT INTO user (nombres,email,contrasena,rol,programa) VALUES (?,?,?,?,?)";
                $query = $this->DataBase->prepare($sql);
                $data = [$this->getNombres(),
                         $this->getEmail(),
                         $this->getPasswd(),
                         $this->getRol(),
                         $this->getprograma()];
                $query->execute($data);
                $response = ['status' => 1, 'msg' => "Usuario guardado exitosamente"];
            } catch (Exception $e) {
                $response = ['status' => 0, 'error' => $e];
            }
            return $response;
        }

        public function CambiarContrasena($email) {
            try {
                
                $sql = "UPDATE user SET contrasena = ? WHERE email = ?";
                $query = $this->DataBase->prepare($sql);
                $data = [$this->getPasswd(), $email];
                $query->execute($data);
                $response = ['status' => 1, 'msg' => "Se ha actualizado la contraseña correctamente"];
            } catch (Exception $e) {
                $response = ['status' => 0, 'Error'=>$e];
            }
           
           
            return $response;
        }

        public function userall()
        {
          
            try {
                $sql = "SELECT * FROM user";
                $query = $this->DataBase->prepare($sql);
                $query->execute();
                $infousuario = $query->fetchAll();
                $response = ['status' => 1, 'users' => $infousuario];
            } catch (Exception $e) {
                $response = ['status' => 0, 'Error'=>$e];
            }

            return $response;
        }

        public function info($id)
        {
          
            try {
                $sql = "SELECT * FROM user where id_user = ?";
                $query = $this->DataBase->prepare($sql);
                $data = [$id];
                $query->execute($data);
                $infousuario = $query->fetch();
                $response = ['status' => 1, 'users' => $infousuario];
            } catch (Exception $e) {
                $response = ['status' => 0, 'Error'=>$e];
            }

            return $response;
        }

        public function deleteuser($id)
        {
          
            try {
                $sql = "DELETE  FROM user WHERE id_user  = ? ";
                $query = $this->DataBase->prepare($sql);
                $data = [$id];
                $query->execute($data);
                $response = ['status' => 1, 'msg'=>" dato eliminado exitosamente"];
            } catch (Exception $e) {
                $response = ['status' => 0, 'Error'=>$e];
            }

            return $response;
        }

        
    }
?>