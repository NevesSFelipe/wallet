var url_base = "http://localhost/github/wallet/";

document.addEventListener("DOMContentLoaded", function() {
    carregarCategorias();
    ouvintes();
});

function ouvintes() {

}

async function carregarCategorias() {

    const endPointChamado = `${url_base}categoria/carregarCategorias`;

    fetch(endPointChamado)
        
        .then((response) => {
            if (!response.ok) {
                throw new Error("Erro na requisição: " + response.statusText);
            }
            return response.json();
        })
        
        .then((categorias) => {
            montarTabelaCategorias(categorias);
        })
       
        .catch((error) => {
            console.error("Erro:", error);
    });

}

function montarTabelaCategorias(categorias) {

    
    categorias.forEach(categoria => {

        const tr = document.createElement('tr');

        const tdID = document.createElement('td');
        tdID.textContent = categoria.id_categoria;
        tdID.classList.add('linha-id');
        
        const tdNome = document.createElement('td');
        tdNome.textContent = categoria.nome;
        tdNome.classList.add('linha-nome');
        
        const tdRateio = document.createElement('td');
        tdRateio.textContent = categoria.rateio;
        tdRateio.classList.add('linha-rateio');
    
        const tdAcoes = document.createElement('td');
        tdAcoes.innerHTML = `
            <i onclick='abrirModalEditar(${categoria.id_categoria}, "${categoria.nome}")' class='btnAcoes text-info fa-solid fa-pen-to-square'></i>
            <i onclick='removerCategoria(${categoria.id_categoria})' id='btnRemoverCategoria' title='Remover Categoria' class='btnAcoes text-danger fa-solid fa-trash'></i>
        `;

        tr.appendChild(tdID);
        tr.appendChild(tdNome);
        tr.appendChild(tdRateio);
        tr.appendChild(tdAcoes);

        const tbody = document.getElementById("tbody_categorias");
        tbody.appendChild(tr);

    });

}

async function adicionarCategoria() {

    const descricaoCategoriaInput = document.getElementById("descricaoCategoria").value;
    const nomeCategoria = descricaoCategoriaInput.trim();

    if (!nomeCategoria) {
        abrirAlerta("Erro", "O nome da categoria não pode estar vazio.", "error");
        return;
    }

    const endPointChamado = `${url_base}categoria/adicionarCategoria`;
    const dados = { nomeCategoria }

    try {

        const resposta = await fetch(endPointChamado, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        });

        if (!resposta.ok) {
            throw new Error(`Erro na requisição: ${resposta.statusText}`);
        }

        const resultado = await resposta.json();
        
        abrirAlerta("Sucesso.", resultado.msg, "success");

        setTimeout(() => {
            location.reload();
        }, 2000);


    } catch (erro) {
        abrirAlerta("Erro", erro.message, "error");
    }
}

async function editarCategoria(id_categoria) {

    const endPointChamado = `${url_base}categoria/editarCategoria/${id_categoria}`;

    const descricaoCategoriaInput = document.getElementById("descricaoCategoria").value;
    const nomeCategoria = descricaoCategoriaInput.trim();

    const dados = { nomeCategoria }

    try {

        const resposta = await fetch(endPointChamado, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },

            body: JSON.stringify(dados)

        });

        if (!resposta.ok) {
            throw new Error(`Erro na requisição: ${resposta.statusText}`);
        }

        const resultado = await resposta.json();
        
        abrirAlerta("Sucesso.", resultado.msg, "success");

        setTimeout(() => {
            location.reload();
        }, 2000);


    } catch (erro) {
        abrirAlerta("Erro", erro.message, "error");
    }
    
}

async function removerCategoria(id_categoria) {

    const desejarRemoverCategoria = window.confirm("Tem certeza que deseja remover a categoria?");

    if( desejarRemoverCategoria ) {{
        
            const endPointChamado = `${url_base}categoria/removerCategoria/${id_categoria}`;
        
            try {
        
                const resposta = await fetch(endPointChamado, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                });
        
                if (!resposta.ok) {
                    throw new Error(`Erro na requisição: ${resposta.statusText}`);
                }
        
                const resultado = await resposta.json();
                
                abrirAlerta("Sucesso.", resultado.msg, "success");
        
                setTimeout(() => {
                    location.reload();
                }, 2000);
        
        
            } catch (erro) {
                abrirAlerta("Erro", erro.message, "error");
            }

    }}

}

function abrirAlerta(titulo, msg, icone) {
    Swal.fire({
        title: titulo,
        text: msg,
        icon: icone
    });
}