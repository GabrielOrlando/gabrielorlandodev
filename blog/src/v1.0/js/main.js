$(document).ready( () => {
    constructorPosts();
});

function constructorPosts(){
    let dataPosts = buscarPosts();
    carregaPosts(dataPosts);
}

// Buscar posts no banco de dados
function buscarPosts(){
    let dadosPostsPublicados;

    $.ajax({
        url: "php/posts/buscar_publicados.php",
        type: "POST",
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
        let texto_post = document.createElement('p');
        let link_post = document.createElement('a');

        div_post.id = 'div_blog_post_' + posts[index].id;
        meta_post.id = 'blog_post_meta_' + posts[index].id;
        descricao_post.id = 'blog_post_descricao_' + posts[index].id;
        texto_post.id = 'blog_post_texto_' + posts[index].id;
        link_post.id = 'link_post_' + posts[index].id;

        if(posts[index].data_alteracao != null){
            let autor = posts[index].autor_alteracao
            autor = autor.split(' - ')[1]

            let autor2 = posts[index].autor_alteracao
            autor2 = autor2.split(' - ')[1]

            meta_post.innerHTML = 'Escrito por ' + autor + ' em ' + posts[index].data_publicacao + ' / Editado por ' + autor2 + ' em ' + posts[index].data_alteracao;
        } else {
            let autor = posts[index].autor
            autor = autor.split(' - ')[1]

            meta_post.innerHTML = 'Escrito por ' + autor + ' em ' + posts[index].data_publicacao
        }
        meta_post.classList.add("blog-post-title");

        descricao_post.innerText = posts[index].descricao;

        texto_post.innerText = posts[index].texto.substring(0, 300) + "...";

        link_post.href = posts[index].url != null ? posts[index].url : '#';
        link_post.classList.add("btn")
        link_post.classList.add("btn-outline-dark")
        link_post.text = "Continue lendo..."

        div_post.classList.add("list-group-item");
        div_post.classList.add("list-group-item-action");

        div_post.appendChild(meta_post);
        div_post.appendChild(descricao_post);
        div_post.appendChild(texto_post);
        div_post.appendChild(link_post);

        document.getElementById('div_ultimosPosts').appendChild(div_post)
        document.getElementById('div_ultimosPosts').appendChild(document.createElement('br'))
    }
}