<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include 'app/views/includes/head.php' ?>

    <link rel="stylesheet" href="../../../public/css/tabelas.css">

    <title>Admin Monster - Categorias</title>


</head>

<body>

    <?php include 'app/views/includes/sidebar.php' ?>

    <div class="container-fluid">

        <div class="main">

            <div class="container cont-custom">

                <div class="title row justify-content-md-center">
                    <img class="logo col-md-auto" src="../../../public/img/Tabelas-Admin/categoriasMonsterTitle.png" alt="Logo de Categorias">
                </div>

                <?php if (isset($_SESSION['faltaCampos']) && !empty($_SESSION['faltaCampos'])) : ?>
                    <center>
                        <div class="alert alert-danger edit-msg" role="alert">
                            <?= $_SESSION['faltaCampos']; ?>
                        </div>
                    </center>
                    <?php unset($_SESSION['faltaCampos']); ?>
                <?php endif; ?>

                <!-- Botão de adicionar categoria -->
                <div class="d-flex justify-content-end">
                    <!-- Adicionar usuarios -->
                    <button type="button" class="btn btn-add btn-primary" data-bs-toggle="modal" data-bs-target="#mod-adicionar">
                        Adicionar Categoria
                    </button>

                    <?php require 'modal/categorias/modal-add.php' ?>

                </div>



                <!-- Tabela-Start -->

                <table class="table table-hover table-bordered border-dark table-custom">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">
                                <form action="/admin/categorias" class="d-flex" method="POST">
                                    <input name="categoria" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

                                    <button class="btn-search btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

                                </form>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($categorias as $categoria) : ?>

                            <tr>
                                <th scope="row"><?= $categoria->id ?></th>
                                <td><?= $categoria->nome ?></td>

                                <td>
                                    <!-- Botão de vizualização -->
                                    <button type="button " class="btn btn-primary btn-custom btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-visualizar-<?= $categoria->id ?>">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <!-- Botão de Edição -->
                                    <button type="button" class="btn btn-primary btn-custom btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-editar-<?= $categoria->id ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Botão de exclusão -->
                                    <button type="button" class="btn btn-danger btn-custom btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-excluir-<?= $categoria->id ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>


                                    <!----------------- Modais ------------------>

                                    <?php require 'modal/categorias/modal-view.php' ?>
                                    <?php require 'modal/categorias/modal-edit.php' ?>
                                    <?php require 'modal/categorias/modal-delete.php' ?>
                                </td>
                            </tr>



                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include 'app/views/includes/footer.php' ?>


        <!-- Fim Lista de Categorias -->
    </div>


</body>


</html>