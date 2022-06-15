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
                <form action="usuarios/editar" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input name="nome" type="text" class="form-control" id="formGroupExampleInput2" value="<?= $usuario->nome ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Endereço de
                            Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $usuario->email ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" id="exampleInputPassword1" value="<?= base64_decode($usuario->senha) ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto de Perfil</label>
                        <br>
                        <input name="foto" type="file" class="form-control-file" id="exampleFormControlFile1" value="<?= $usuario->foto ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <input type="hidden" name="id" , value="<?= $usuario->id ?>">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>