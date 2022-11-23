pergutnasqtd = document.querySelectorAll(`[id^=perguntas-n]`)
pergutnasqtd.forEach(function (pergunta, num, chaves) {
  num++
  perguntaUncica = pergunta.id



  funcheck = $(`.blocopergunta${num}`).on('change', function () {

    check = $(`.blocopergunta${num}`);

    Check_perguntas = check.not(this).prop('checked', false)
    check.attr('checked', true)

    if (Check_perguntas) {
      check.not(this).attr('checked', false)
    }

    // let checkedSelecionado = $("[id^='Nunca']").attr('checked', true)

    allChecked = document.querySelectorAll('[checked="checked"]')
    console.log(num);
    looppergunta = document.querySelectorAll(`[id^=perguntas-n]`)
    looppergunta.forEach(function (pergunta, num, chaves) {
      resposta = allChecked[num].id
      respostaReferente = allChecked[num].name
      selectresp = []
      selectresp[num] = resposta

      console.log(pergunta);
      Cookies.set(respostaReferente, resposta, { expires: 1 })
    });



  });
})
