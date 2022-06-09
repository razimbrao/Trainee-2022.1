<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include 'app/views/includes/head.php' ?>

    <link rel="stylesheet" href="../../../public/css/frontend_adm_categorias.css">

    <title>Frontend Administrador Categorias</title>


</head>

<body>

    <?php include 'app/views/includes/sidebar.php' ?>

    <div class="content">

        <div class="main">

            <div class="container cont-custom">

                <div class="imgCat">
                    <img src="../../../public/img/img_adm_categorias/Categorias.png" alt="a" width="55%">
                    <img src="../../../public/img/img_adm_categorias/carMonsterShop.png" alt="a" width="55%">
                </div>



                <!-- Botão de adicionar categoria -->
                <div class="botoes1">


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-adicionar">
                        Adicionar categoria
                    </button>

                    <!-- Modal de adicionar -->
                    <div class="modal fade" id="mod-adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Adicionando categoria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="categorias/create" method="POST">
                                        <div class="form-group">
                                            <label for="">Nome da categoria</label>
                                            <input name="nome" class="form-control" type="text" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Descrição</label>
                                            <input name="descricao" class="form-control" type="text" placeholder="">
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Categoria</button>
                                </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>





                <!-- Inicio Lista de Categorias -->


                <!-- Tabela-Start -->

                <table class="table table-hover table-bordered border-dark table-custom">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">
                                <form action="/admin/categorias" class="d-flex" method="POST">
                                    <input name="categoria" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

                                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

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
                                    <button type="button " class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#mod-visualizar-<?= $categoria->id ?>">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>


                                    <!-- Modal de vizualização -->
                                    <div class="modal fade" id="mod-visualizar-<?= $categoria->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="exampleModalLabel">Vizualização</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Nome da categoria:</h5>
                                                    <p><?= $categoria->nome ?></p>
                                                </div>

                                                <div class="modal-body">
                                                    <h5>Descrição da categoria:</h5>
                                                    <p><?= $categoria->descricao ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Botão de Edição -->
                                    <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#mod-editar-<?= $categoria->id ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Modal de edição -->
                                    <div class="modal fade" id="mod-editar-<?= $categoria->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="exampleModalLabel">Editar Categoria</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form de Edição -->
                                                    <form action="categorias/edit" method="POST">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nome da categoria</label>
                                                            <input name="nome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $categoria->nome ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Descrição da categoria</label>
                                                            <input name="descricao" type="text" class="form-control" id="exampleInputEmail1" value="<?= $categoria->descricao ?>" aria-describedby="emailHelp">
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                            <input type="hidden" name="id" , value="<?= $categoria->id ?>">
                                                            <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <!-- Botão de exclusão -->
                                    <button type="button" class="btn btn-danger btn-custom" data-bs-toggle="modal" data-bs-target="#mod-excluir-<?= $categoria->id ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    <!-- Modal de confirmação de exclusão -->
                                    <div class="modal fade" id="mod-excluir-<?= $categoria->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="staticBackdropLabel">Confirmação de exclusão</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="categorias/delete" method="POST">
                                                    <div>
                                                        <h5> Tem certeza que deseja excluir essa categoria?</h5>
                                                    </div>
                                                    <input type="hidden" value="<?= $categoria->id ?>" name="id">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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