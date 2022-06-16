<div class="modal fade" id="mod-editar-<?= $produto->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form de Edição -->

            <div class="modal-body">
                <form action="produtos/editar" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="formGroupExampleInput2" value="<?= $produto->nome ?>">
                    </div>
                    <div class="mb-3">
                        <label>Categoria</label>
                        <select class="form-select" aria-label="Default select example" name="categoriaID">
                            <?php foreach ($categorias as $cat) : ?>
                                <option value="<?= $cat->id ?>"><?= $cat->nome ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Descrição</label>
                        <textarea class="form-control text-justify" name="descricao" id="exampleFormControlTextarea1" rows="3"><?= $produto->descricao ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                        <input type="number"  step="0.01" class="form-control" name="preco" id="exampleInputPassword1" value="<?= $produto->preco ?>">
                    </div>

                    <div class="form-group img-edicao">
                        <label for="exampleFormControlFile1">Imagem</label>
                        <input type="file" accept="image/*" multiple name="txtimagem[]" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <input type="hidden" name="id" value="<?= $produto->id ?>">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>