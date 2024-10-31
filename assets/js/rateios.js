function abrirModalRateio() {

    abrirModal('rateioModal');

    const objNomes = document.getElementsByClassName('linha-nome');    
    const arrayNomes = Array.from(objNomes).map(td => td.textContent.trim());

    const objRateio = document.getElementsByClassName('linha-rateio');    
    const arrayRateios = Array.from(objRateio).map(span => span.textContent.trim());

    const formRateio = document.getElementById("formRateio");
    formRateio.innerHTML = "";

    for(let i = 0; i < arrayNomes.length; i++) {

        const div = document.createElement('div');
        div.classList.add('row');
     
        const divNome = document.createElement('div'); 
        divNome.classList.add('col-sm-6');
        
        const pNome = document.createElement('p');
        pNome.textContent = arrayNomes[i];
        pNome.classList.add('text-end');
        pNome.setAttribute('name', `nome[${i}]`);
        divNome.append(pNome);

        const divRateio = document.createElement('div'); 
        divRateio.classList.add('col-sm-1');

        const inputRateio = document.createElement('input');
        inputRateio.value = arrayRateios[i];
        inputRateio.setAttribute('type', 'number');
        inputRateio.classList.add('inputRateio');
        inputRateio.setAttribute('name', `rateio[${i}]`);
        inputRateio.setAttribute('min', 0);
        inputRateio.setAttribute('max', 100);
        inputRateio.onkeyup = calcularRateio;
        divRateio.append(inputRateio);
        
        div.append(divNome);
        div.append(divRateio);
        formRateio.append(div);

    }

    calcularRateio();
    
}

function calcularRateio() {

    const limite = 100;
    const inputRateio = document.getElementsByClassName('inputRateio');
    let valorRateio = 0;

    Array.from(inputRateio).forEach((rateio, index) => {
        valorInputLido = rateio.value == "" ? 0 : parseInt(rateio.value);
        valorRateio += valorInputLido;
    });

    const spanLimiteDisponivel = document.getElementById('limiteDisponivel');
    spanLimiteDisponivel.textContent = (limite - valorRateio) + "%";

    if(valorRateio > limite) {
        document.getElementById('modalBotaoAcaoRateio').setAttribute('disabled', true);
        spanLimiteDisponivel.classList.add('text-danger');
    } else {
        document.getElementById('modalBotaoAcaoRateio').removeAttribute('disabled');
        spanLimiteDisponivel.classList.remove('text-danger');
    }

}

async function editarRateio() {

    let form = document.getElementById("formRateio");
    form = new FormData(form);
    
    const formRateio = [];

    const objID = document.getElementsByClassName('linha-id');    
    const arrayID = Array.from(objID).map(td => td.textContent.trim());

    arrayID.forEach((id_categoria, index) => {
        formRateio.push({
            id_categoria: id_categoria,
            valor: form.get(`rateio[${index}]`)
        });
    });

    const endPointChamado = `${url_base}categoria/editarRateio`;

    const dados = { formRateio }

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

