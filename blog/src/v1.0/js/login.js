$(document).ready(() => {
    events();
    carregaCredenciais();
});

function events() {
    $('#btn_login').on('click', () => {
        $('#login_txt_email').val().trim() == '' || $('#login_txt_password').val().trim() == '' ? alert('Favor preencher email e senha.') : buscarUsuario( $('#login_txt_email').val().trim(), $('#login_txt_password').val().trim() );
    });

    $('#btn_cadastro').on('click', () => {
        $('#form_login').hide();
        $('#form_cadastro').show();
    });

    document.querySelector('#login_txt_password').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            $('#login_txt_email').val().trim() == '' || $('#login_txt_password').val().trim() == '' ? alert('Favor preencher email e senha.') : buscarUsuario( $('#login_txt_email').val().trim(), $('#login_txt_password').val().trim() );
        }
    });

    document.querySelector('#login_txt_email').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            $('#login_txt_email').val().trim() == '' || $('#login_txt_password').val().trim() == '' ? alert('Favor preencher email e senha.') : buscarUsuario( $('#login_txt_email').val().trim(), $('#login_txt_password').val().trim() );
        }
    });

    $('#btn_novo_usuario').on('click', () => {

    });
}

function carregaCredenciais() {
    let email = localStorage.getItem('email');
    let senha = localStorage.getItem('senha');

    if (email && senha) {
        $('#login_txt_email').val(email);
        $('#login_txt_password').val(senha)
    }
}

function buscarUsuario(email, senha) {
    let usuario;

    if (email == '' || senha == '') {
        console.error('Usuário ou Senha incorretos.');
        alert('Usuário ou Senha incorretos.');
    } else {
        if ($('#ckb_remember').prop("checked") == "checked") {
            localStorage.setItem('email') = email;
            localStorage.setItem('senha') = senha;
        }

        $.ajax({
            url: "php/user/login.php",
            type: "POST",
            data: {
                'usuario': email,
                'senha': senha
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

function checkCadastro() {
    if ($('#cad_txt_email').val().trim() != '') {
        if ($('#cad_txt_nome').val().trim() != '') {
            if ($('#cad_txt_sobrenome').val().trim() != '') {
                if ($('#cad_password').val().trim() != '') {
                    if ($('#cad_password_confirm').val().trim() != '') {
                        if ($('#cad_password').val().trim() == $('#cad_password_confirm').val().trim()) {
                            if ($('#ckb_termos').prop("checked") == "checked") {
                                $.ajax({
                                    url: "PHP/user/cadastro.php",
                                    type: "POST",
                                    data: {
                                        'email': $('#cad_txt_email').val().trim(),
                                        'nome': $('#cad_txt_nome').val().trim(),
                                        'sobrenome': $('#cad_txt_sobrenome').val().trim(),
                                        'senha': $('#cad_password').val().trim()
                                    },
                                    async: false,
                                    success: function (data) {
                                        console.log("Cadastrou!")
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