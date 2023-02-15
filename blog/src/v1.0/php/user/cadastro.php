<?php
	require_once('conn.php');

	session_start();
	
	$conn = mysqli_connect($servername, $username, $password, $database);
			
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$email_existe = false;
			
	$nome = strtoupper(utf8_decode($_POST['cad_txt_nome']));
	$sobrenome = strtoupper(utf8_decode($_POST['cad_txt_sobrenome']));
	$email = strtoupper(utf8_decode($_POST['cad_txt_email']));
	$senha = md5(utf8_decode($_POST['cad_password']));
	$data_registro = date("Y-m-d H:i:s");
			
	$sql_insert = "INSERT INTO tbl_usuarios (usu_nome, usu_sobrenome, usu_email, usu_senha, usu_data_registro, usu_ultimo_login) VALUES('$nome', '$sobrenome', '$email', '$senha', '$data_registro', '$data_registro')";

	$sql_email = "SELECT * FROM tbl_usuarios WHERE usu_email = '$email'";
			
	//Executa SQL			
	if($resultado_usuario = mysqli_query($conn, $sql_email)){ // Verifica Email já existente
		$verifica_usuario = mysqli_fetch_array($resultado_usuario);
		if(isset($verifica_usuario['usu_email'])){
			$email_existe = true;
		}
	}
	
	if($email_existe){ // Alerta de ERRO --> email ja cadastrado
		header('location:../index.php?code=6');
		die(); // Faz o script parar de ser executado neste ponto
	}
			
	if (mysqli_query($conn, $sql_insert)) { // usuario cadastrado com sucesso
		  header('location:../index.php?code=1');
	} else {
		  echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
	}
			
	// Encerra conexão
	mysqli_close($conn);
?>

<!-- SCRIPT DE CADASTRO DE USUARIO -->