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