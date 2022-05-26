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
            <button type="button" class="btn btn-add btn-primary" data-bs-toggle="modal"
                data-bs-target="#mod-adicionar">
                Adicionar Produto
            </button>

            <!-- Modal de adicionar produto -->
            <div class="modal fade modal-add" id="mod-adicionar" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="produtos/adicionar" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="formGroupExampleInput2" placeholder="Nome do produto">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Categoria</label>
                                    <input type="text" class="form-control text-justify" name="categoria" id="formGroupExampleInput2" placeholder="Categoria">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="descricao" placeholder="Descrição do produto">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Preço</label>
                                    <input type="text" class="form-control" name="preco" id="exampleInputPassword1" placeholder="R$">
                                </div>

                                <div class="form-group img-edicao">
                                    <label for="exampleFormControlFile1">Imagem 1</label>
                                    <input type="file" accept="image/*" name="foto1" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group img-edicao">
                                    <label for="exampleFormControlFile1">Imagem 2</label>
                                    <input type="file" accept="image/*" name="foto2" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group img-edicao">
                                    <label for="exampleFormControlFile1">Imagem 3</label>
                                    <input type="file" accept="image/*" name="foto3" class="form-control-file" id="exampleFormControlFile1">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Produto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Tabela-Start -->   
        <div class="tabela">
            <table class="table table-hover table-bordered border-dark table-custom">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
                                <button type="button" class="btn-custom btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#mod-editar-<?= $produto->id ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Botão de exclusão -->
                                <button type="button" class="btn-custom btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#mod-excluir-<?= $produto->id ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <!----------------- Modais ------------------>

                                <!-- Modal de vizualização -->
                                <div class="modal fade" id="mod-visualizar-<?= $produto->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Vizualização</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                                                        <input class="form-control" type="text" value="<?= $produto->nome ?>" aria-label="<?= $produto->nome ?>" disabled readonly>
                                                    </div>
                                                    <div id="carouselExampleIndicators" class="carousel slide carousel-modal" data-bs-ride="carousel">
                                                        <label for="exampleInputPassword1" class="form-label">Imagens</label>
                                                        <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="../../../public/assets/MonsterShop-logo.png" class="d-block w-100 imagem-teste" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="../../../public/assets/MonsterShop-logo.png" class="d-block w-100 imagem-teste" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="../../../public/assets/MonsterShop-logo.png" class="d-block w-100 imagem-teste" alt="...">
                                                        </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Categoria</label>
                                                        <input class="form-control" type="text" value="<?= $produto->categoria ?>" aria-label="<?= $produto->categoria ?>" disabled readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                                        <textarea class="form-control text-justify" id="exampleFormControlTextarea1" rows="3" disabled><?= $produto->descricao ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                                                        <input class="form-control" type="text" value="R$ <?= $produto->preco ?>" aria-label="Preço do produto" disabled readonly>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de edição -->
                                <div class="modal fade" id="mod-editar-<?= $produto->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form de Edição -->
                                                <form action="produtos/editar" method="$_POST">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?= $produto->nome ?>">
                                                    </div>

                                                    <div class="form-group img-edicao">
                                                        <label for="exampleFormControlFile1">Imagem 1</label>
                                                        <input type="file" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                                                    </div>
                                                    <div class="form-group img-edicao">
                                                        <label for="exampleFormControlFile1">Imagem 2</label>
                                                        <input type="file" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                                                    </div>
                                                    <div class="form-group img-edicao">
                                                        <label for="exampleFormControlFile1">Imagem 3</label>
                                                        <input type="file" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Categoria</label>
                                                        <input type="text" class="form-control text-justify" id="formGroupExampleInput2" placeholder="<?= $produto->categoria ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                                        <textarea class="form-control text-justify" id="exampleFormControlTextarea1" rows="3"><?= $produto->descricao ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="R$<?= $produto->preco ?>">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="button" class="btn btn-primary">Salvar Alterações</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de confirmação de exclusão -->
                                <div class="modal fade" id="mod-excluir-<?= $produto->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirmação de exclusão</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="produtos/excluir" method="POST">
                                            <div class="modal-body">
                                                Tem certeza que deseja excluir esse usuário?
                                            </div>
                                            <input type="hidden" value="<?= $produto->id ?>" name="id">
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

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>