const inputBusca= document.getElementById('inputBusca');
const tabelaBebida= document.getElementById('tabelaRemedio');

inputBusca.addEventListener('keyup' , ()=>{
    let expressao = inputBusca.value.toLowerCase();

    let linhas = tabelaBebida.getElementsByTagName('tr');

    console.log(linhas);
    for (let i = 0; i < linhas.length; i++) {

        let conteudoDaLinha = linhas[i].innerText.toLowerCase();

        if (conteudoDaLinha.includes(expressao)){
            linhas[i].style.display='';
        }
        else{
            linhas[i].style.display= 'none';
        }
    }
})
