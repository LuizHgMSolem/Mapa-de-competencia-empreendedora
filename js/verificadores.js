//DevMedia
function verificarcpf(strCPF) {
  var Soma;
  var Resto;
  Soma = 0;
if (strCPF == "00000000000") return false;
   
for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
Resto = (Soma * 10) % 11;
 
  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
 
Soma = 0;
  for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  Resto = (Soma * 10) % 11;
 
  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
  return true;
}




function verificaremail(email){
if(email.split(" ").length>1)
  return false;
let partes = email.split("@");
if(partes.length == 2){
  return partes[1].split(".").length>1;
}
else{
  return false;
}
}

function verificaremail(email){
if(email.split(" ").length>1)
  return false;
let partes = email.split("@");
if(partes.length == 2){
  return partes[1].split(".").length>1;
}
else{
  return false;
}
}

function verificarfabricante(fabricante, qtdf){
return (fabricante.length > qtdf);
}


function verificarmodelo(modelo, qtdm){
return (modelo.length > qtdm);
}

function verificarplaca(placa,qtdpl){
return (placa.length == qtdpl);
}


function verificarrenavam(renavam, qtd){
return (renavam.length == qtd);
}
function verificarportas(quantidadeportas, qtdp){
return (quantidadeportas.length > qtdp);
}
function verificaranofabricacao(anofabri, qtdaf) {
return (anofabri.length == qtdaf)
}
function verificaranomodelo(anomodelo, qtdam) {
return (anomodelo.length == qtdam)
}