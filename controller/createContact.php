<?php
session_start();
require_once ("../model/db_connect.php");

if(isset($_POST['btn-contatos'])){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $id = $_POST['id'];


    $data=[
        "nome" => $nome,
        "sobrenome" => $sobrenome,
        "id" => $id,
        "cnpj" => $cnpj,
        "email" => $email,
        "telefone" => $telefone,
    
    ];

    $result = createContact($data);
    if($result){
        $_SESSION['mensagem2'] = "Contato adicionado!";
        header('location:./../index.php');

        }else{
        
        $_SESSION['mensagem'] = "Erro ao adicionar contato!";
        header('location:./../index.php');
        }
    

}