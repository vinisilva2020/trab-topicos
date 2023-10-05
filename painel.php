<?php
session_start();

if (!isset($_SESSION)) {
    header("location:index.php");
    die;
}
if (empty($_SESSION)) {
    header("location:index.php");
    die;
}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php?id=<?php  echo $_SESSION['id']?>">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class=" text-danger nav-link" href="sair.php">Sair</a>
                    </li>
                    
                </ul>
             
            </div>
            <h6 class="text-center" >Seja bem-vindo <p class="text-success"><?php echo $_SESSION['nome']; ?></p></h6>
        </div>
        <div class="row">
            <div class="col-md-8 mt-3 mx-auto">
                
            <?php
            if (isset($_SESSION['msg']) and $_SESSION['msg'] != "" and isset($_SESSION['status']) and $_SESSION['status'] != "") {
            ?>
                <div class="alert col-6 mx-auto <?php echo $_SESSION['status']  ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['msg'] ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php  }
            unset($_SESSION['msg']);
            unset($_SESSION['status']);
            ?>
                <div class="card bg-transparent shadow">
                    <div class="card-header bg-transparent">
                        <h5 class=" card-title text-center">Tabela de contatos</h5>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"> <i class="bi bi-person-plus">Cadastrar</i></button>
                        <table class="table  m-3  table-hover">
                            <thead>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th colspan="2">Ações</th>
                            </thead>
                            <tr>
                                <?php
                                while ($dados = mysqli_fetch_assoc($resultado)) {
                                    $nome = $dados['nome'];
                                    $email = $dados['email'];
                                    $telefone = $dados['telefone'];
                                    $id = $dados['id'];
                                ?>
                                    <tbody>
                                        <td> <?php echo $nome  ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $telefone   ?></td>
                                        <td><a href="editar-contato.php?id=<?php echo $id; ?>"><i class="bi bi-pencil-square text-success"></i></a></td>
                                        <td><a  href="insere.php?del_contato=<?php echo $id; ?>"><i class="bi bi-trash text-danger"></i></a></td>
                                    </tbody>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar contato</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="insere.php">
                            <div class="mb-3">
                                <input type="hidden" name="id">
                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                <input type="text" placeholder="insira seu nome" name="nome" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email:</label>
                                <input type="text" placeholder="examplo@gmail.com" name="email" class="form-control" id="recipient-name">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Telefone:</label>
                                <input type="text" placeholder="(xx) xxxx-xxxx" name="telefone" class=" telefone form-control" id="recipient-name">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" name="cadastrar-contato" class="btn btn-success">Cadastrar</button>
                            </div>
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

</html>