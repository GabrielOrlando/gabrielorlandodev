$(document).ready( () => {
    events();
    carregaCredenciais();
});

function events(){
    $('#btn_login').on('click', () => {
        buscarUsuario(checkLogin()) == 'Usuário ou senha incorreta.' ? alert('Usuário ou senha incorreta.') : true;        
    });

    $('#btn_cadastro').on('click', () => {
        $('#form_login').hide();
        $('#form_cadastro').show();
    });

    $('#btn_novo_usuario').on('click', () => {

    });
}

function carregaCredenciais(){
    let email = localStorage.getItem('login');
    let pass = localStorage.getItem('pass');

    if(email && pass){
        $('#login_txt_email').val(email);
        $('#login_txt_password').val(pass)
    }
}

function buscarUsuario(login){
    let usuario;

    if(!login){
        console.error('Usuário ou Senha incorretos.');
        alert('Usuário ou Senha incorretos.');
    } else {
        // alert('Ok')
        $.ajax({
            url: "php/user/login.php",
            type: "POST",
            data: {
                'usuario': $('#login_txt_email').val().trim(),
                'senha' : $('#login_txt_password').val().trim()
            },
            async: false,
            success: function (data) {
                console.log(data);
                usuario = data;
            },
            error: function (e) {
                console.log(e)
            }
        });
    }

    return usuario;
}

function checkLogin(){
    if($('#login_txt_email').val().trim() != '' && $('#login_txt_password').val().trim() != ''){

        if($('#ckb_remember').prop("checked") == "checked"){
            localStorage.setItem('login') = $('#login_txt_email').val().trim();
            localStorage.setItem('pass') = $('#login_txt_password').val().trim();
        }

        return true;
    } else {
        return false;
    }
}

function checkCadastro(){
    if($('#cad_txt_email').val().trim() != ''){
        if($('#cad_txt_nome').val().trim() != ''){
            if($('#cad_txt_sobrenome').val().trim() != ''){
                if($('#cad_password').val().trim() != ''){
                    if($('#cad_password_confirm').val().trim() != ''){
                        if($('#cad_password').val().trim() == $('#cad_password_confirm').val().trim()){
                            if($('#ckb_termos').prop("checked") == "checked"){
                                $.ajax({
                                    url: "PHP/user/cadastro.php",
                                    type: "POST",
                                    data: {
                                        'email': $('#cad_txt_email').val().trim(),
                                        'nome' :  $('#cad_txt_nome').val().trim(),
                                        'sobrenome' : $('#cad_txt_sobrenome').val().trim(),
                                        'senha' : $('#cad_password').val().trim()
                                    },
                                    async: false,
                                    success: function (data) {
                                        console.log("Login!")
                                    },
                                    error: function (e) {
                                        console.log(e)
                                    }
                                });
                            } else {
                                $('#ckb_termos').focus();
                            }
                        } else {
                            alert("Erro senhas incompativeis")
                        }
                    } else {
                        $('#cad_password_confirm').focus();
                    }
                } else {
                    $('#cad_password').focus();
                }
            } else {
                $('#cad_txt_sobrenome').focus();
            }
        } else {
            $('#cad_txt_nome').focus();
        }
    } else {
        $('#cad_txt_email').focus();
    }
}