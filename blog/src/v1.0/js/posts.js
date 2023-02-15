var ID = window.location.href.split("/")
ID = ID[ID.length - 1].split(".")[0]

$(document).ready( () => {
    buscaInfoPagina(ID);
})

function buscaInfoPagina(id){
    let dadosPostPagina;

    $.ajax({
        url: "php/posts/buscar_pagina.php",
        type: "POST",
        data: { "id" : id },
        async: false,
        success: function (data) {
            dadosPostPagina = JSON.parse(data);
        },
        error: function (e) {
            console.log(e)
        }
    });

    return dadosPostPagina;
}

