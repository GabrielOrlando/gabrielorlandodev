INSERT INTO tbl_usuarios (usu_email, usu_senha, usu_nome, usu_sobrenome, usu_data_cadastro, usu_email_confirmado) VALUES ('ADMIN@GABRIELORLANDO.DEV.BR', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'ADMIN', NOW(), 1);

INSERT INTO tbl_categorias_post (cat_descricao) VALUES ('SEM CATEGORIA');

INSERT INTO tbl_posts (post_status, post_categoria, post_titulo, post_descricao, post_texto, post_autor, post_data_publicacao) VALUES (3, 1, 'MODELO DE POST', 'MODELO DE POST', 'MODELO DE POST MODELO DE POST MODELO DE POST MODELO DE POST MODELO DE POST MODELO DE POST', 1, NOW());