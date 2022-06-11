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