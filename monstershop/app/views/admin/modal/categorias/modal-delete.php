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