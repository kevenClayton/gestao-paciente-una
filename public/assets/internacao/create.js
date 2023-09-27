$(document).on('change', '[name="id_estabelecimento"]', function(){

    var idEstabelecimento = $(this).val();

    if(idEstabelecimento == 0){
        $('[name="id_setor"]').empty();
    }

    $.ajax({
        url: '/listaSetores/'+idEstabelecimento+'',
        type: 'get',

        beforeSend: function() {
            $('[name="id_setor"]').empty();
            $('[name="id_setor"]').append('<option value="">Carregando...</option>');
    }
    }).done(function(response) {

        console.log(response);
        $('[name="id_setor"]').empty();

        if(response.length > 0){

            $('[name="id_setor"]').append('<option value="">Selecione o setor</option>');

            $(response).each(function(index, setor){
                $('[name="id_setor"]').append('<option value="'+setor.id_setor+'">'+setor.nome_setor+'</option>');
            });

        }else{
            $('[name="id_setor"]').append('<option value="">Setor não encontrado</option>');
        }

    }).fail(function(erro) {

    })
});

$(document).on('change', '[name="id_setor"]', function(){

    var idSetor = $(this).val();


    $.ajax({
        url: '/listaLeitos/'+idSetor+'',
        type: 'get',

        beforeSend: function() {
            $('[name="id_leito"]').empty();
            $('[name="id_leito"]').append('<option value="">Carregando...</option>');
    }
    }).done(function(response) {

        console.log(response);
        $('[name="id_leito"]').empty();

        if(response.length > 0){

            $('[name="id_leito"]').append('<option value="">Selecione o leito</option>');

            $(response).each(function(index, leito){
                $('[name="id_leito"]').append('<option value="'+leito.id_leito+'">'+leito.nome_leito+'</option>');
            });

        }else{
            $('[name="id_leito"]').append('<option value="">Leito não encontrado</option>');
        }

    }).fail(function(erro) {

    })
});
