<div class="modal fade" id="rateioModal" tabindex="-1" aria-labelledby="rateioModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-info" id="modalTitulo">Editar Rateio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <h6 class="text-center">Você tem <span id='limiteDisponivel'></span> de Rateio Disponível</h6>
            <div class="modal-body">
                <form id="formRateio"></form>
            </div>
            <div class="modal-footer">
                <button onclick="editarRateio()" id="modalBotaoAcaoRateio" type="button" class="btn btn-info w-25">Editar</button>
                <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= URL_BASE . 'assets/js/modal/add_edt_categoria.js?' . time() ?>"></script>