CREATE VIEW view_posts_publicados AS 
	SELECT *
    FROM tbl_posts 
    WHERE post_status = 2