<?php
session_start();
include 'config.php';
if (!isset($_SESSION)) {
    header("location:index.php");
    die;
}
if (empty($_SESSION)) {
    header("location:index.php");
    die;
}
if (isset($_GET['id'])) {
    $id = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM usuario WHERE id = '$id' ";
    $execute = mysqli_query($conexao, $sql);
    if ($execute == TRUE) {
        $banco = mysqli_fetch_assoc($execute);
    } else {
        header("location:painel.php");
        die;
    }
} else {
    header("location:painel.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
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
            <div class="col-12 mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php?id=<?php echo $_SESSION['id'] ?>">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link" href="painel.php">Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class=" text-danger nav-link" href="sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-3 mx-auto">
                <div class="card bg-transparent shadow">
                    <div class="card-header bg-transparent">
                        <h5 class=" card-title text-center">Editar Perfil</h5>
                    </div>
                    <div class="card-body">
                    <form method="post" action="insere.php" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome</label>
    <input type="hidden" name="id" value="<?php echo $banco['id'] ?>" >
    <input type="text" name="nome" class="form-control" value="<?php echo $banco['nome']; ?>"  aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="text" name="senha" class="form-control" value="<?php echo $_SESSION['senha'] ?>">
  </div>
  <button type="submit" name="cadastrar-usuario" class="btn btn-outline-success">Salvar alteração</button>
  <a class="btn btn-danger" href="insere.php?del_usuario=<?php echo $_SESSION['id']; ?>">Excluir perfil</a>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    $('.telefone').mask('(00) 0000-0000');
</script>