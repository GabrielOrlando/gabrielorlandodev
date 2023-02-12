<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KPK0TYRVCC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KPK0TYRVCC');
    </script>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Blog | Dev Gabriel Orlando" />
    <title>Blog</title>
    <!-- <link rel="shortcut icon" href="/favicon.ico"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="js/main.js"></script>
</head>

<body role="document">
    <div class="container">
        <header style="z-index: 2;">
            <div class="page-header">
                <nav class="navbar navbar-expand-lg bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#div_menu" aria-controls="div_menu" aria-expanded="false" aria-label="Alterna navegação">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="div_menu">
                        <ul class="navbar-nav mr-auto col-md-10">
                            <li class="nav-item active"><a class="btn btn-outline-dark" href="blog.gabrielorlando.dev.br/">Inicio</a></li>
                            <li class="nav-item"><a class="btn btn-outline-dark" href="blog.gabrielorlando.dev.br/index.html#section_sobre">Categorias</a></li>
                            <li class="nav-item" style="display: none;"><a class="btn btn-outline-dark" href="painel_controle/dashboard.php">Painel de Controle</a></li>
                            <li class="nav-item"></li>
                        </ul>

                        <div class="col-md-2">
                            <a href="index.html" class="btn btn-outline-success">Login</a>

                            <div class="dropdown" style="display: none;">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="menu_usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span id="span_nome_usuario">Nome Usuário</span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="menu_usuario">
                                    <a class="dropdown-item" href="#">Perfil</a>
                                    <a class="dropdown-item" href="#">Configurações da Conta</a>
                                    <a class="dropdown-item" href="php/user/sair.php">Sair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main>
            <section id="section_destaques">
                <div id="div_postDestacado_1" class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                    <div class="col-md-6 px-0">
                        <h1 class="display-4 font-italic" id="titulo_postDestacado_1">Título mais longo para um post destacado</h1>
                        <p class="lead my-3" id="descricao_postDestacado_1">Várias linhas formando uma introdução, informando novos leitores rápido e eficientemente sobre o que é mais interessante, neste post.</p>
                        <p class="lead mb-0"><a id="link_postDestacado_1" href="#" class="text-white font-weight-bold">Continue lendo...</a></p>
                    </div>
                </div>

                <br>

                <div class="row mb-2">
                    <div class="col-md-6" id="div_postDestacado_2">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary"><span id="categoria_postDestacado_2">Mundo</span></strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#" id="titulo_postDestacado_2">Post destacado</a>
                                </h3>
                                <div class="mb-1 text-muted">
                                    <p id="data_postDestacado_2">12 de Nov</p>
                                </div>
                                <p class="card-text mb-auto" id="descricao_postDestacado_2">Este é um card maior com suporte à texto, em baixo, como uma introdução mais natural ao conteúdo adicional.</p>
                                <a id="link_postDestacado_2" href="#">Continue lendo</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block" src="img/thumb_padrao.png" alt="Thumb padrão">
                        </div>
                    </div>
                    <div class="col-md-6" id="div_postDestacado_3">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-success"><span id="categoria_postDestacado_3">Design</span></strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#" id="titulo_postDestacado_3">Título do post</a>
                                </h3>
                                <div class="mb-1 text-muted">
                                    <p id="data_postDestacado_3">11 de Nov</p>
                                </div>
                                <p class="card-text mb-auto" id="descricao_postDestacado_3">Este é um card maior com suporte à texto em baixo, como uma introdução mais natural ao conteúdo adicional.</p>
                                <a id="link_postDestacado_3" href="#">Continue lendo</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block" src="img/thumb_padrao.png" alt="Thumb padrão">
                        </div>
                    </div>
                </div>
            </section>
            <br>
            <section id="section_ultimosPosts">
                <h2>Últimos Posts</h2>

                <hr>

                <!-- <div class="blog-post">
                    <h2 class="blog-post-title">Novo Post</h2>
                    <p class="blog-post-meta">Escrito por <a href="#" id="link_autor_post">Autor</a>, em <span id="span_data_post">[data]</span>.</p>

                    <p id="descricao_post_id">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

                </div> -->

                <div id="div_ultimosPosts" class="list-group">

                </div>

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary disabled" href="#">Mais antigos</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Mais novos</a>
                </nav>
            </section>
        </main>

        <footer>
            Desenvolvido por <a href="https://gabrielorlando.dev.br" target="_blank">Gabriel Orlando</a> &copy; 2023
        </footer>
    </div>
</body>

</html>