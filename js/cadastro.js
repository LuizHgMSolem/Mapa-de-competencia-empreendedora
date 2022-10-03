function removermask(mask){
    if (mask)  {
        $("#txtplaca").unmask("SSS-9999");
        $("#txtcpf").unmask("999.999.999-99");
    }else{      
    $("#txtplaca").mask("SSS-9999");
    $("#txtcpf").mask("999.999.999-99");
    $("#txtrenavam").mask("99999999999");
    $("#txtportas").mask("9");
    $("#txtfanoabricante").mask("9999");
    $("#txtanomodelo").mask("9999");
    }
}
function removervalidacao(){
$("input").removeClass("is-valid");
$("input").removeClass("is-invalid");
}


$(document).ready(function(){


$("form").submit(function(cad){        
    removermask(false)
    removermask(true);
    removervalidacao();
let fabricante, modelo, placa, renavam, quantidadeportas,
email, cpf, anofabricacao, anomodelo, termos ;

fabricante = $("#txtfabricante").val();
modelo = $("#txtmodelo").val();
placa = $("#txtplaca").val();
renavam = $("#txtrenavam").val();
quantidadeportas = $("#txtportas").val();
email = $("#txtemail").val();
cpf = $("#txtcpf").val();
anofabricacao = $("#txtanofabricacao").val();
anomodelo = $("#txtanomodelo").val();
termos = $("#check").prop("checked");
removermask(false)


if (!verificarfabricante(fabricante, 1)) {
    $("#txtfabricante").addClass("is-invalid");
        }else{ $("#txtfabricante").addClass("is-valid");}

if (!verificarmodelo(modelo, 1)) {
$("#txtmodelo").addClass("is-invalid");
    }else{ $("#txtmodelo").addClass("is-valid");}

if (!verificarplaca(placa, 7)) {
$("#txtplaca").addClass("is-invalid");
    }else{ $("#txtplaca").addClass("is-valid");}
    
if (!verificarrenavam(renavam, 11)) {
$("#txtrenavam").addClass("is-invalid");
    }else{ $("#txtrenavam").addClass("is-valid");}

if (!verificarportas(quantidadeportas, 0)) {
$("#txtportas").addClass("is-invalid");
    }else{ $("#txtportas").addClass("is-valid");}

if (!verificarcpf(cpf, 11)) {
$("#txtcpf").addClass("is-invalid");
    }else{ $("#txtcpf").addClass("is-valid");}

if (!verificaranofabricacao(anofabricacao, 4)) {
$("#txtanofabricacao").addClass("is-invalid");
    }else{ $("#txtanofabricacao").addClass("is-valid");}

if (!verificaranomodelo(anomodelo, 4)) {
$("#txtanomodelo").addClass("is-invalid");
    }else{ $("#txtanomodelo").addClass("is-valid");}

if (!verificaremail(email)) {
$("#txtemail").addClass("is-invalid");
    }else{ $("#txtemail").addClass("is-valid");}
    
if(!termos){
    $("#check").addClass("is-invalid");
}
else{
    $("#check").addClass("is-valid");
} 
  
let qtdinvalido = $(".is-invalid").length;

        if(qtdinvalido > 0 ){
            cad.preventDefault(); 
     
        }

    });
});