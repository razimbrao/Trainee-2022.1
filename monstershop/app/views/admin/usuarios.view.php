<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'app/views/includes/head.php' ?>

    <link rel="stylesheet" href="../../../public/css/tabelas.css">

    <title>Admin Monster - Usuários</title>

</head>

<body>

    <?php include 'app/views/includes/sidebar.php' ?>

    <div class="container-fluid cont-custom">
        
        <div class="title row justify-content-md-center">
            <img class="logo col-md-auto" src="../../../public/img/Tabelas-Admin/usuariosMonsterTitle.png" alt="Logo de Categorias">
        </div>

        <?php if(isset($_SESSION['emailCadastrado']) && !empty($_SESSION['emailCadastrado'])): ?>
            <center>
                <div class="alert alert-danger edit-msg" role="alert">
                    <?= $_SESSION['emailCadastrado']; ?>
                </div>
            </center>
            <?php unset($_SESSION['emailCadastrado']); ?>
        <?php endif;?>

        
        <?php if(isset($_SESSION['faltaCampos']) && !empty($_SESSION['faltaCampos'])): ?>
            <center>
                <div class="alert alert-danger edit-msg" role="alert">
                    <?= $_SESSION['faltaCampos']; ?>
                </div>
            </center>
            <?php unset($_SESSION['faltaCampos']); ?>
        <?php endif;?>
        
        <div class="d-flex justify-content-end">
            <!-- Adicionar usuarios -->
            <button type="button" class="btn btn-add btn-primary" data-bs-toggle="modal" data-bs-target="#mod-adicionar">
                Adicionar Usuário
            </button>

            <?php require 'modal/usuarios/modal-add.php' ?>

        </div>

        <!-- Tabela-Start -->

        <table class="table table-hover table-bordered border-dark table-custom">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">
                        <form action="/admin/usuarios" class="d-flex" method="POST">
                            <input name="usuario" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn-search btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php  /*if(isset($_SESSION['logado']) && !empty($_SESSION['logado'])):*/ ?>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <th scope="row"><?= $usuario->id ?></th>
                        <td><?= $usuario->nome ?></td>

                        <td>
                            <!-- Botão de vizualização -->
                            <button type="button" class="btn-custom btn btn-primary btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-visualizar-<?= $usuario->id ?>">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                            <!-- Botão de Edição -->
                            <button type="button" class="btn-custom btn btn-primary btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-editar-<?= $usuario->id ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- Botão de exclusão -->
                            <button type="button" class="btn-custom btn btn-danger btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-excluir-<?= $usuario->id ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>


                            <!----------------- Modais ------------------>

                            <?php require 'modal/usuarios/modal-view.php' ?>              
                            <?php require 'modal/usuarios/modal-edit.php' ?>
                            <?php require 'modal/usuarios/modal-delete.php' ?>

                        </td>

                    </tr>
                <?php endforeach; ?>

            <?/*hp  endif; */?>
            </tbody>
        </table>
    </div>

    <?php include 'app/views/includes/footer.php' ?>

</body>

</html>