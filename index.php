<?php
session_start();
include_once 'config.php';
$sql = "SELECT * FROM contato";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="usuario.png" alt="logo" width="100">
                    </div>
                    <?php
            if (isset($_SESSION['msg']) and $_SESSION['msg'] != "" and isset($_SESSION['status']) and $_SESSION['status'] != "") {

            ?>
                <div class="alert <?php echo $_SESSION['status'] ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['msg'] ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php  }
            unset($_SESSION['msg']);
            unset($_SESSION['status']);
            ?>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4"> Fazer Login</h1>
                            <form method="POST" action="login.php" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Nome de usuário</label>
                                    <input id="email" type="text" class="form-control" name="nome" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Senha</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="senha" required>
                                </div>

                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Entrar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Não tem conta? <a href="cadastre.php" class="text-dark">Crie uma</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Trabalho de Tópicos
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>