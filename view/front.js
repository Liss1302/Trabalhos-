const descricao = document.getElementById("descricao");
const quantidade = document.getElementById("quantidade");
const preco = document.getElementById("preco");

botao.addEventListener("click", addlinhas);

function add(){
    alert('venda concluida');

    if(descricao.value != " " && quantidade.value != " " && preco.value != " "){
        const tr = document.createElement("tr");
        const bloco1 = document.createElement("td");
        const bloco2 = document.createElement("td");
        const bloco3 = document.createElement("td");
        const bloco4 = document.createElement("td");

        //valores entre colunas
        bloco1.innerText = descricao.value;
        bloco2.innerText = quantidade.value;
        bloco3.innerText = preco.value;

        bloco4.innerHTML =
        "<input type= 'button' class='Alterar' onclick = 'alterarlinhas(this)'/>";

        tr.appendChild(bloco1);
        tr.appendChild(bloco2);
        tr.appendChild(bloco3);
        tr.appendChild(bloco4);

        descricao.value = " ";
        quantidade.value = " ";
        preco.value = " ";
        }

}