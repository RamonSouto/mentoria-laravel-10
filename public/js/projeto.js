function deleteRegistroPaginacao(rotaUrl, idDoRegistro) {

    if(confirm('Deseja confirmar a exclusão desse registro?')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data: {
                id: idDoRegistro,
            },
            beforeSend: function(){
                $.blockUI({
                    message: 'Carregando...',
                    timeout: 2000,
                });
            },
        }).done(function(data){
            $.unblockUI();
            if(data.success){
                window.location.reload();
            } else {
                alert('Não foi possível excluir!');
            }
        }).fail(function(data){
            $.unblockUI();
            alert('Não foi possível buscar os dados!');
        })
    }
}

$('#mascara_valor').mask('#.##0,00', {reverse: true});