CREATE TABLE IF NOT EXISTS tbl_usuarios(
	usu_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usu_email VARCHAR(50) NOT NULL UNIQUE,
	usu_senha VARCHAR(32) NOT NULL,
	usu_nome VARCHAR(50) NOT NULL,
	usu_sobrenome VARCHAR(30) NOT NULL,
	usu_data_nascimento DATE,
	usu_data_cadastro DATETIME NOT NULL DEFAULT(NOW()),
	usu_alterar_senha BOOLEAN DEFAULT(0),
    usu_email_confirmado BOOLEAN DEFAULT(0),
    usu_email_key INT(5),
    usu_email_key_expiration DATETIME
);

CREATE TABLE IF NOT EXISTS tbl_categorias_post(
	cat_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cat_descricao VARCHAR(20) NOT NULL,
    cat_status_ativo BOOLEAN DEFAULT(1)
);

CREATE TABLE IF NOT EXISTS tbl_posts (
	post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    post_status INT NOT NULL DEFAULT(0),
    post_categoria INT NOT NULL DEFAULT(0),
    post_titulo VARCHAR(50) NOT NULL,
    post_descricao VARCHAR(100),
    post_texto LONGTEXT NOT NULL,
	post_autor INT NOT NULL,
    post_data_publicacao DATETIME DEFAULT(NULL),
    post_autor_alteracao INT DEFAULT(NULL),
    post_data_alteracao DATETIME DEFAULT(NULL),
    post_url VARCHAR(45) DEFAULT(NULL),
    FOREIGN KEY (post_autor) REFERENCES tbl_usuarios(usu_id),
    FOREIGN KEY (post_autor_alteracao) REFERENCES tbl_usuarios(usu_id),
    FOREIGN KEY (post_categoria) REFERENCES tbl_categorias_post(cat_id)
);

CREATE TABLE IF NOT EXISTS tbl_permissoes (
	perm_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    perm_descricao VARCHAR(50) NOT NULL,
    perm_status_ativo BOOLEAN DEFAULT(1)
);

CREATE TABLE IF NOT EXISTS tbl_permissoes_usuarios (
	permusu_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    permusu_usu_id INT NOT NULL,
    permusu_perm_id INT NOT NULL,
    permusu_status_ativo BOOLEAN DEFAULT(1),
    FOREIGN KEY (permusu_usu_id) REFERENCES tbl_usuarios(usu_id),
    FOREIGN KEY (permusu_perm_id) REFERENCES tbl_permissoes(perm_id)
);

CREATE TABLE IF NOT EXISTS tbl_logs (
	log_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    log_date DATETIME NOT NULL DEFAULT(NOW()),
    log_user_logado INT NOT NULL,
    log_text LONGTEXT NOT NULL DEFAULT('LOG'),
    log_type VARCHAR(1),
    FOREIGN KEY (log_user_logado) REFERENCES tbl_usuarios(usu_id)
)