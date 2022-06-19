<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/e16f74cfa0.js" crossorigin="anonymous"></script>
    <title>SCC</title>
    <link rel="icon" type="image/x-icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/common-1.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="demo">
    <div class="demo form-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="white">Telebachillerato</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
                    <div class="form-container">
                        <div class="form-icon">
                            <i class="fa fa-user-circle"></i>
                            <span class="signup"><a href="">Don't have account? Signup</a></span>
                        </div>
                        <form class="form-horizontal" method="POST" action="controllers/loginController.php">
                            <h3 class="title">Credenciales</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                                <input class="form-control" type="text" placeholder="Usuario" />
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" placeholder="Contraseña" />
                            </div>
                            <button class="btn signin">Ingresar</button>
                            <span class="forgot-pass"><a href="#">Olvido Usuario/Contraseña?</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>