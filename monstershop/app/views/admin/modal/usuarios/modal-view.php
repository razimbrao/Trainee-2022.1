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
                        <img src="..\..\..\public\img\usuarios\<?= $usuario->foto ?>" alt="foto do usuário" class="imagem-teste">
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
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?= base64_decode($usuario->senha) ?>" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>