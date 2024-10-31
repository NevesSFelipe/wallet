function abrirModalAdicionar() {
    
    const modalTitulo = document.getElementById('modalTitulo');
    const modalBotaoAcao = document.getElementById('modalBotaoAcao');
    const descricaoCategoria = document.getElementById('descricaoCategoria');

    modalTitulo.innerText = 'Adicionar Categoria';
    modalBotaoAcao.innerText = 'Adicionar';
    modalBotaoAcao.classList.remove('btn-warning');
    modalBotaoAcao.classList.add('btn-info');
    descricaoCategoria.placeholder = 'Informe o nome da categoria';
    descricaoCategoria.value = '';

    modalBotaoAcao.onclick = function() {
        adicionarCategoria();
    };

    abrirModal('categoriaModal');

}

function abrirModalEditar(categoria_id, nome_categoria) {

    const modalTitulo = document.getElementById('modalTitulo');
    const modalBotaoAcao = document.getElementById('modalBotaoAcao');
    const descricaoCategoria = document.getElementById('descricaoCategoria');

    modalTitulo.innerText = 'Editar Categoria';
    modalBotaoAcao.innerText = 'Salvar';
    modalBotaoAcao.classList.remove('btn-info');
    modalBotaoAcao.classList.add('btn-warning');
    descricaoCategoria.placeholder = 'Altere o nome da categoria';
    descricaoCategoria.value = nome_categoria;

    modalBotaoAcao.onclick = function() {
        editarCategoria(categoria_id);
    };

    abrirModal('categoriaModal');

}