<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/front_admin_produtos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2b94009ee2.js" crossorigin="anonymous"></script>
    <title>ADM - Produtos</title>
</head>

<body>
    <main>

        <div class="titulo title row justify-content-md-center user-select-none">
            <img class="titulo-produtos col-md-auto" src="../../../public/img/adm-produtos/titulo-produtos.svg" alt="Titulo Administração">
            <img class="titulo-monster col-md-auto" src="../../../public/img/adm-produtos/titulo-monster.svg" alt="Titulo Monster">
        </div>

        <div class="add-produto">
            <!-- Adicionar produto -->
            <button type="button" class="btn btn-add btn-primary" data-bs-toggle="modal" data-bs-target="#mod-adicionar">
                Adicionar Produto
            </button>
            <!-- Modal de adicionar produto -->
            <?php require 'modal/produtos/modal-add.php' ?>
        </div>

        <!-- Tabela-Start -->
        <div class="tabela">
            <table class="table table-hover table-bordered border-dark table-custom">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">
                            <form class="d-flex" action="produtos" method="POST">
                                <input class="form-control me-2" type="search" placeholder="Search" name="pesquisa" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
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
                                <button type="button" class="btn-custom btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-visualizar-<?= $produto->id ?>">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <!-- Botão de Edição -->
                                <button type="button" class="btn-custom btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-editar-<?= $produto->id ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Botão de exclusão -->
                                <button type="button" class="btn-custom btn btn-danger" data-bs-toggle="modal" data-bs-target="#mod-excluir-<?= $produto->id ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <!----------------- Modais ------------------>
                                <?php require 'modal/produtos/modal-view.php' ?>
                                <?php require 'modal/produtos/modal-edit.php' ?>
                                <?php require 'modal/produtos/modal-delete.php' ?>   
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>