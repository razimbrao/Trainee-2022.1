<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php include 'app/views/includes/head.php' ?>

    <link rel="stylesheet" href="../../../public/css/front_admin_produtos.css">

    <title>ADM - Produtos</title>
</head>

<body>

    <?php include 'app/views/includes/sidebar.php' ?>

    <div class="content">

        <main>
            <div class="titulo title row justify-content-md-center user-select-none">
                <img class="titulo-produtos col-md-auto" src="../../../public/img/adm-produtos/titulo-produtos.svg" alt="Titulo Administração">
                <img class="titulo-monster col-md-auto" src="../../../public/img/adm-produtos/titulo-monster.svg" alt="Titulo Monster">
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
                        <tr>
                            <th scope="row">1</th>
                            <td>(nome-produto-1)</td>
                            <td>
                                <!-- Botão de vizualização -->
                                <button type="button" class="btn-custom btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-visualizar">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <!-- Modal de vizualização -->
                                <div class="modal fade" id="mod-visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Vizualização</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                                                        <input class="form-control" type="text" value="Nome do produto" aria-label="nome do produto" disabled readonly>
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
                                                        <input class="form-control" type="text" value="Categoria do produto" aria-label="Categoria" disabled readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                                        <textarea class="form-control text-justify" id="exampleFormControlTextarea1" rows="3" disabled>Diam sanctus gubergren justo sanctus erat, rebum stet magna dolore dolores magna, est aliquyam ut dolore eos et stet voluptua.</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                                                        <input class="form-control" type="text" value="R$ 99.99" aria-label="Preço do produto" disabled readonly>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botão de Edição -->
                                <button type="button" class="btn-custom btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Modal de edição -->
                                <div class="modal fade" id="mod-editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form de Edição -->
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nome">
                                                    </div>
                                                    <form>
                                                        <div class="form-group img-edicao">
                                                            <label for="exampleFormControlFile1">Imagem do produto</label>
                                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                        </div>
                                                    </form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Categoria</label>
                                                        <input type="text" class="form-control text-justify" id="formGroupExampleInput2" placeholder="Categoria">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Descrição do produto">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="R$">
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="button" class="btn btn-primary">Salvar Alterações</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Botão de exclusão -->
                                <button type="button" class="btn-custom btn btn-danger" data-bs-toggle="modal" data-bs-target="#mod-excluir">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <!-- Modal de confirmação de exclusão -->
                                <div class="modal fade" id="mod-excluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Confirmação de exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza que deseja excluir esse produto?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger">Excluir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>

                    </tbody>
                </table>
            </div>

            <?php include 'app/views/includes/footer.php' ?>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>