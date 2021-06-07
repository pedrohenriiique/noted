// scrollspy
$(document).ready(function(){
    $('.scrollspy').scrollSpy({
        scrollOffset: 15
    });
});

// date picker data de nascimento
$(document).ready(function(){
    $('.datepicker_nasc').datepicker({
        i18n: {
            clear: 'Fechar',
            cancel: 'Cancelar',
            done: 'Ok',
            nextMonth: 'Próximo mês',
            previousMonth: 'Mês anterior',
            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
            weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
        },
        yearRange: [1960,2010],
        format: "dd/mm/yyyy",
        showClearBtn: true,
    });
});

// date picker timeline
var data = new Date();
var ano = data.getFullYear();
var mes = data.getMonth();
var dia = data.getDate();
var data = new Date(ano, mes, dia);
$(document).ready(function(){
    $('.datepicker_timeline').datepicker({
        format: "dd/mm/yyyy",
        showClearBtn: true,
        yearRange: [ano, ano + 10],
        minDate: data,
        i18n: {
            clear: 'Fechar',
            cancel: 'Cancelar',
            done: 'Ok',
            nextMonth: 'Próximo mês',
            previousMonth: 'Mês anterior',
            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
            weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
        }
    });
});

// sidenav
$(document).ready(function(){
    $('.sidenav').sidenav();
});

// select
$(document).ready(function(){
    $('select').formSelect();
})

// Função para gerar a tabela do cronograma semanal
$(document).ready(function(){
    $(document).on('click', '.gerarTabela', function(){

        // Deleta as linhas da tabela
        var tabelaSemana = document.getElementById('tabelaSemana');
        var linhas = tabelaSemana.rows.length;
        for (var k = 1; k < linhas; k++){
          tabelaSemana.deleteRow(1);
        }

        // Pega o valor do select escolhido pelo usuário
        var select = document.getElementById('numHorarios');
        var valor = select.options[select.selectedIndex].value;

        // Criando linhas e colunas da tabela
        for (var i = 0; i < valor; i++){
          var numeroLinhas = tabelaSemana.rows.length;
          var numeroColunas = tabelaSemana.rows[numeroLinhas-1].cells.length;
          var novaLinha = tabelaSemana.insertRow(numeroLinhas);
          var novaCelula = novaLinha.insertCell(0);
          novaCelula.innerHTML = '<input type="time" name="horaIni_' + (i+1) + '">';
          novaCelula = novaLinha.insertCell(1);
          novaCelula.innerHTML = '<input type="time" name="horaFim_' + (i+1) + '">';
          for (var j = 2; j < numeroColunas; j++) {
            novaCelula = novaLinha.insertCell(j);
            novaCelula.innerHTML = '<input type="text" name="tarefa_' + (i+1) + (j-1) + '">';
          }
        }           
    });
});                         

// Modal
$(document).ready(function(){
    $('.modal').modal();
});