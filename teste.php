<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="post">
<input type="checkbox" name="pergunta1" value="01" />
<input type="checkbox" name="Mouse" value="02" />
<input type="checkbox" name="Fone" value="03" />
<input type="checkbox" name="Monitor" value="04" />

<div id="resultado">
  <input type="text" name="total" value="seria a soma dos valores">
  <input type="text" name="nomes" value="seria os nomes[] marcados(A,B,C..)">
</div>
</form>
</body>
</html>
<script type='text/javascript'> 

const inputs = [...document.querySelectorAll("input[type='checkbox']")];
const res = document.getElementById("resultado");
const total = res.querySelector('[name="total"]');
const nomes = res.querySelector('[name="nomes"]');


const calcular = () => {
  total.value = inputs.filter(el => el.checked).reduce((sum, el) => sum + Number(el.value), 0);
  nomes.value = inputs.filter(el => el.checked).map(el => el.name).join(',');
};

inputs.forEach(x => x.addEventListener("change", calcular));

</script>