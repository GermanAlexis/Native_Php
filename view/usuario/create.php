<?php
    $sec = new SessionesModel();
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ASSETS_URL."images/favicon.png"?>">
    <title>TC - CONSULTORIAS</title>
    <!-- Custom CSS -->
    <link href="<?php echo ASSETS_URL."dist/css/style.min.css"?>" rel="stylesheet">
    <link href="<?php echo ASSETS_URL."libs/toastr/build/toastr.min.css"?>" rel="stylesheet">
  
</head>

    <div class="container">
        <div class="row">           
                            <!-- Form -->
                            <form class="form-horizontal m-t-20" action="<?php echo ABS_PATH."user/agregar"?>" method="POST">
                                
                                    <div class="container">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" name="nombres" placeholder="Nombres" aria-label="Username" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg" name="passwd" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" name="rol" placeholder=Rol aria-label="Password" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="fab fa-product-hunt"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" name="programa" placeholder=programa aria-label="programa" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                
                                <div class="row border-top border-secondary">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="p-t-20">
                                                <button class="btn btn-block btn-lg btn-info" type="submit">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>                 
    </div>


    <!-- ============================================================== -->
    <script src="<?php echo ASSETS_URL."libs/jquery/dist/jquery.min.js"?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo ASSETS_URL."libs/popper.js/dist/umd/popper.min.js"?>"></script>
    <script src="<?php echo ASSETS_URL."libs/bootstrap/dist/js/bootstrap.min.js"?>"></script>
    <script src="<?php echo ASSETS_URL."libs/toastr/build/toastr.min.js"?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function() {

            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();

    
        <?php $sec->ShowNotification() ?>
    </script>
</body>

</html>
