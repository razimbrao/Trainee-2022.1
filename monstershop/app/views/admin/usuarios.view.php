<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../../../public/css/usuarios.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2b94009ee2.js" crossorigin="anonymous"></script>
    <title>Usuarios-MonsterShop</title>

</head>

<body>

    <div class="container-fluid cont-custom">

        <div class="title row justify-content-md-center">
            <img class="usuarios-logo col-md-auto" src="../../../public/img/Usuários Logo.png" alt="Logo de usuários">
            <img class="monster-logo col-md-auto" src="../../../public/img/Monster Logo.png" alt="Logo de usuários">
        </div>

        <div class="d-flex justify-content-end">
            <!-- Adicionar usuarios -->
            <button type="button" class="btn btn-add btn-primary" data-bs-toggle="modal" data-bs-target="#mod-adicionar">
                Adicionar Usuário
            </button>

            <!-- Modal de adicionar usuarios -->
            <div class="modal fade" id="mod-adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuráio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="usuarios/adicionar" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                                    <input name="nome" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nome do Usuário">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Endereço de
                                        Email</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemplo@email.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                                    <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto de Perfil</label>
                                    <br>
                                    <input name="foto" type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela-Start -->

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
                    <?php foreach ($usuarios as $usuario) : ?>
                        <th scope="row"><?= $usuario->id ?></th>
                        <td><?= $usuario->nome ?></td>

                        <td>
                            <!-- Botão de vizualização -->
                            <button type="button" class="btn-custom btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-visualizar-<?= $usuario->id ?>">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                            <!-- Botão de Edição -->
                            <button type="button" class="btn-custom btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-editar-<?= $usuario->id ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- Botão de exclusão -->
                            <button type="button" class="btn-custom btn btn-danger" data-bs-toggle="modal" data-bs-target="#mod-excluir-<?= $usuario->id ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>


                            <!----------------- Modais ------------------>


                            <!-- Modal de vizualização -->
                            <div class="modal fade" id="mod-visualizar-<?= $usuario->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Vizualização</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3 imagem-modal">
                                                    <label for="exampleInputPassword1" class="form-label">Foto de Perfil</label>
                                                    <img src="../../../public/assets/MonsterShop-logo.png" alt="imagem de teste" class="imagem-teste">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputText" class="form-label">Nome</label>
                                                    <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" placeholder="<?= $usuario->nome ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Endereço de
                                                        Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $usuario->email ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?= $usuario->senha ?>" readonly>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod-editar">Editar Usuário</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal de edição -->
                            <div class="modal fade" id="mod-editar-<?= $usuario->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form de Edição -->
                                            <form>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?= $usuario->nome ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Endereço de
                                                        Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $usuario->email ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                                </div>
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Foto de Perfil</label>
                                                        <br>
                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                    </div>
                                                </form>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="button" class="btn btn-primary">Salvar Alterações</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal de confirmação de exclusão -->
                            <div class="modal fade" id="mod-excluir-<?= $usuario->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirmação de exclusão</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza que deseja excluir esse usuário?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-danger">Excluir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <tr>



            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>