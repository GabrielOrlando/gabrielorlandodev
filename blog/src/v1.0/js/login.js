function buscarUsuario(login){
    if(!login){
        console.error('Usuário ou Senha incorretos.');
        alert('Usuário ou Senha incorretos.');
    } else {
        alert('Ok')
    }
}

function checkLogin(){
    return $('#txt_email').val().trim() != '' && $('#txt_pass').val().trim() != '' ? true : false;
}