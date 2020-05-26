<?php
// Sessão
session_start();
// Conexão
require_once ("../model/db_connect.php");

if(isset($_POST['btn-deletar'])){
	

	if (deleteCompany($_POST['id']) == true) {
		$_SESSION['mensagem2'] = "Deletado com sucesso!";
		header('Location: ./../index.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ./../index.php');
	}

}