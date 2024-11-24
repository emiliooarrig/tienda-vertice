<?php require 'validar_user.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="fondo.css"> -->
    <title>Login</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tiendita honesta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../index.php">Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../php/compras/compras.php">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../html/contacto/contacto.html">Contacto</a>
                    </li>
                    <li class="nav-item-">
                        <a href="../../html/faq/faq.html" class="nav-link"> FAQ </a>
                    </li>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../config/logout.php"><i class="bi bi-box-arrow-right"></i> <?php echo $_SESSION['username']; ?> </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="../login/login.php"><i class="bi bi-person-circle"></i></a>
                        </li>
                    <?php } ?>

                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                <div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                <div class="alert alert-success" role="alert">
                    Usuario creado exitosamente :)
                </div>            
            <?php endif; ?>

            <form action="validar_user.php" method="POST">
                <!-- Username Field -->
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-people"></i></span>
                    <input type="text" name="user" class="form-control" placeholder="Username" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="passwd" class="form-control" placeholder="Password" required>
                </div>

                <div class="input-group">
                    <a class="link" href="../../html/agregar_user/agregar_user.html"> ¿Eres nuevo? Crea una cuenta aquí </a>
                </div>
                <!-- Login Button -->
                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- CDN de Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>