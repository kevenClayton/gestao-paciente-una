$(document).on('change', '[name="estabelecimentoFilter"]', function(){
    var idEstabelecimento = $(this).val();

    cardsInternacao('estabelecimento', idEstabelecimento);
});

$(document).on('change', '[name="setorFilter"]', function(){
    var idSetor = $(this).val();

    cardsInternacao('setor', idSetor);
});

function cardsInternacao(filtro, id){

    $('.internacao').each(function(){
        codigoSetor = $(this).attr('data-codigosetor');
        codigoEstabelecimento = $(this).attr('data-codigoestabelecimento');

        if(filtro == 'setor'){
            if(id == codigoSetor || id == 0){
                $(this).show();
            }else {
                $(this).hide();
            }
        }else if(filtro == 'estabelecimento'){
            if(id == codigoEstabelecimento || id == 0){
                $(this).show();
            }else{
                $(this).hide();
            }
        }
    });
}
