const descricao = document.getElementById("descricao");
const quantidade = document.getElementById("quantidade");
const quantidade = document.getElementById("preco");
const tableBody = document.getElementById("tableBody");

botao.addEventListener("click", adicionarLinhas);

function adicionarLinhas() {
  alert('cliente adicionado!');

  if (descricao.value != " " && quantidade.value != " " && preco.value != " ") { //se for diferente de campo vazio, entao ele executa
    const tr = document.createElement("tr");
    const bloco1 = document.createElement("td");
    const bloco2 = document.createElement("td");
    const bloco3 = document.createElement("td");
    const bloco4 = document.createElement("td");
    //Atribui valores entre as colunas TD
    bloco1.innerText = descricao.value;
    bloco2.innerText = quantidade.value;
    bloco3.innerText = preco.value;

    bloco4.innerHTML =
    "<input type = 'button' class='button' value='Alterar' onclick = 'alterarLinhas(this)' />";
    bloco4.innerHTML +=
      "<input type='button' class='button' value='Deletar' onclick = 'excluirLinhas(this)' />";

    tr.appendChild(bloco1);
    tr.appendChild(bloco2);
    tr.appendChild(bloco3);
    tr.appendChild(bloco4);

    tableBody.appendChild(tr);

    descricao.value = "";
    quantidade.value = "";
    preco.value = "";
   
  }
}
function excluirLinhas(e) {
  e.parentNode.parentNode.remove();
}
function alterarLinhas(e) {
  e.parentNode.parentNode.cells[0].setAttribute("contenteditable", "true");
  e.parentNode.parentNode.cells[1].setAttribute("contenteditable", "true");
  e.parentNode.parentNode.cells[2].setAttribute("contenteditable", "true");
  e.parentNode.parentNode.cells[3].innerHTML = "<input type='button' class='button' value='concluir' onclick='concluirLinhas(this)'/>";
}
function concluirLinhas(e) {
  e.parentNode.parentNode.cells[0].setAttribute("contenteditable", "false");
  e.parentNode.parentNode.cells[1].setAttribute("contenteditable", "false");
  e.parentNode.parentNode.cells[2].setAttribute("contenteditable", "false");
  e.parentNode.parentNode.cells[3].innerHTML =
   "<input type = 'button' class='button' value='Alterar' onclick = 'alterarLinhas(this)' />" +
    "<input type='button' class='button' value='Deletar' onclick = 'excluirLinhas(this)' />";
}
function recarga(){
  let trs = draw.split("*");
  for (let i = 0; i < trs.legth - 1; i++){
    let colunas = trs[i].split("-");
    const tr = document.createElement("tr");
    const bloco1 = document.createElement("td");
    const bloco2 = document.createElement("td");
    const bloco3 = document.createElement("td");
    const bloco4 = document.createElement("td");
    bloco1.innerText = colunas[0];
    bloco2.innerText = colunas[1];
    bloco3.innerText = colunas[2];
    bloco4.innerHTML =
    "<input type = 'button' class='button' value='Alterar' onclick = 'alterarLinhas(this)' />";
    bloco4.innerHTML +=
      "<input type='button' class='button' value='Deletar' onclick = 'excluirLinhas(this)' />";
      tr.appendChild(bloco1);
      tr.appendChild(bloco2);
      tr.appendChild(bloco3);
      tr.appendChild(bloco4);

      tableBody.appendChild(tr);
  }
}




