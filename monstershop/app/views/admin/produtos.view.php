<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'app/views/includes/head.php' ?>

    <link rel="stylesheet" href="../../../public/css/tabelas.css">
    <title>Admin Monster - Produtos</title>
</head>

<body>
    <?php include 'app/views/includes/sidebar.php' ?>

    <div class="container-fluid cont-custom">

        <div class="title row justify-content-md-center">
            <img class="logo col-md-auto" src="../../../public/img/Tabelas-Admin/produtosMonsterTitle.png" alt="Logo de Categorias">
        </div>

        <?php if(isset($_SESSION['faltaCampos']) && !empty($_SESSION['faltaCampos'])): ?>
            <center>
                <div class="alert alert-danger edit-msg" role="alert">
                    <?= $_SESSION['faltaCampos']; ?>
                </div>
            </center>
            <?php unset($_SESSION['faltaCampos']); ?>
        <?php endif;?>

        <div class="d-flex justify-content-end">
            <!-- Adicionar produtos -->
            <button type="button" class="btn btn-add btn-primary" data-bs-toggle="modal" data-bs-target="#mod-adicionar">
                Adicionar Produto
            </button>
        </div>

        <!-- Tabela-Start -->
        <div class="tabela">
            <table class="table table-hover table-bordered border-dark table-custom">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">
                            <form action="/admin/produtos" class="d-flex" method="POST">
                                <input name="produto" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

                                <button class="btn-search btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) : ?>
                        <tr>
                            <th scope="row"><?= $produto->id ?></th>
                            <td><?= $produto->nome ?></td>
                            <td>
                                <!----------------- Botões ------------------>

                                <!-- Botão de vizualização -->
                                <button type="button" class="btn-custom btn btn-primary btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-visualizar-<?= $produto->id ?>">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <!-- Botão de Edição -->
                                <button type="button" class="btn-custom btn btn-primary btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-editar-<?= $produto->id ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Botão de exclusão -->
                                <button type="button" class="btn-custom btn btn-danger btn-outline-light" data-bs-toggle="modal" data-bs-target="#mod-excluir-<?= $produto->id ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <!----------------- Modais ------------------>
                                <?php require 'modal/produtos/modal-view.php' ?>
                                <?php require 'modal/produtos/modal-edit.php' ?>
                                <?php require 'modal/produtos/modal-delete.php' ?>
                                <?php require 'modal/produtos/modal-add.php' ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <?php include 'app/views/includes/footer.php' ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>