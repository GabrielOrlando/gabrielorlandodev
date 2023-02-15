CREATE VIEW view_posts_publicados AS 
SELECT 
		p.post_id AS id, 
		p.post_categoria AS categoria, 
		p.post_titulo AS titulo, 
		p.post_descricao AS descricao, 
		p.post_texto AS texto, 
		CONCAT(p.post_autor, ' - ', u.usu_nome, ' ', u.usu_sobrenome) AS autor, 
		CONCAT(p.post_autor_alteracao, ' - ', u.usu_nome, ' ', u.usu_sobrenome) AS autor_alteracao, 
		p.post_data_publicacao AS data_publicacao, 
		p.post_data_alteracao AS data_alteracao,
        p.post_url AS url
    FROM tbl_posts AS p 
    INNER JOIN
		tbl_usuarios AS u
        ON p.post_autor = u.usu_id OR p.post_autor_alteracao = u.usu_id
    WHERE p.post_status = 2;