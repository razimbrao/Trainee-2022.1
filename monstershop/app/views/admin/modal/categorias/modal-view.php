 <!-- Modal de vizualização -->
 <div class="modal fade" id="mod-visualizar-<?= $categoria->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h2 class="modal-title" id="exampleModalLabel">Vizualização</h2>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <h5>Nome da categoria:</h5>
                 <p><?= $categoria->nome ?></p>
             </div>

             <div class="modal-body">
                 <h5>Descrição da categoria:</h5>
                 <p><?= $categoria->descricao ?></p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
             </div>
         </div>
     </div>
 </div>