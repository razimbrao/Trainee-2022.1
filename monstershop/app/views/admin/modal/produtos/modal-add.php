<div class="modal fade modal-add" id="mod-adicionar" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="produtos/adicionar" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="formGroupExampleInput2" placeholder="Nome do produto">
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
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="descricao" placeholder="Descrição do produto">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                        <input type="number"  step="0.01" class="form-control" name="preco" id="exampleInputPassword1" placeholder="R$ ">
                    </div>

                    <div class="form-group img-edicao">
                        <label for="exampleFormControlFile1">Imagem</label>
                        <input type="file" accept="image/*" multiple name="txtimagem[]" class="form-control-file" id="exampleFormControlFile1">
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