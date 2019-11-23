<?php
//todas las rutas disponibles en nuestra aplicación
$ruta = new Ruta();
$ruta->controladores(array(
    "/" => "WelcomeController",
    "/login"    => "AuthController",
    "/user"  => "UserController",
    "/admin"    => "AdminController",
    "/home"     => "HomeController"
));
