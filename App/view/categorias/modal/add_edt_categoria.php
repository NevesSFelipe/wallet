<div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="categoriaModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-info" id="modalTitulo">Adicionar Categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="descricaoCategoria" class="form-label">Nome Categoria</label>
          <input type="text" class="form-control" id="descricaoCategoria" placeholder="Informe o nome da categoria">
        </div>
      </div>
      <div class="modal-footer">
        <button id="modalBotaoAcao" type="button" class="btn btn-info">Adicionar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<script src="<?= URL_BASE . 'assets/js/modal/add_edt_categoria.js?' . time() ?>"></script>