function constructorPosts(){
    let dataPosts = buscarPosts();
    carregaPosts(dataPosts);
}

// Buscar posts no banco de dados
function buscarPosts(){
    // Buscar view de posts publicados
    let dadosPostsPublicados;

    $.ajax({
        url: "PHP/posts/buscar_publicados.php",
        type: "POST",
        //data: { usuario: user, senha: pass },
        async: false,
        success: function (data) {
            dadosPostsPublicados = JSON.parse(data);
        },
        error: function (e) {
            console.log(e)
        }
    });

    return dadosPostsPublicados;
}

// Criar HTML de posts buscados
function carregaPosts(posts){
    for(let index = 0; index < posts.length; index++){
        let div_post = document.createElement('div');
        let meta_post = document.createElement('p');
        let descricao_post = document.createElement('p');
        let link_post = document.createElement('a');

        div_post.id = 'div_blog_post_' + posts[index].post_id;
        meta_post.id = 'blog_post_meta_' + posts[index].post_id;
        descricao_post.id = 'blog_post_descricao_' + posts[index].post_id;
        link_post.id = 'link_post_' + posts[index].post_id;

        if(posts[index].post_data_publicacao != null){
            meta_post.innerHTML = 'Escrito por ' + posts[index].post_autor + ' em ' + posts[index].post_data_publicacao + ' / Editado por ' + posts[index].post_autor_alteracao + ' em ' + posts[index].post_data_alteracao;
        } else {
            meta_post.innerHTML = 'Escrito por ' + posts[index].post_autor + ' em ' + posts[index].post_data_publicacao
        }
        
        descricao_post.innerText = posts[index].post_texto;

        link_post.href = posts[index].post_url;

        div_post.appendChild(meta_post);
        div_post.appendChild(descricao_post);
        div_post.appendChild(link_post);
    }
}