<?php
session_start();
require_once ("../model/db_connect.php");

if(isset($_POST['btn-negocios'])){
    $postArray=filter_input_array(INPUT_POST,FILTER_DEFAULT);
    if(!filter_var($postArray['valor'],FILTER_VALIDATE_FLOAT)) {
        $_SESSION['mensagem'] ="valor informado não é válido, utilize somente números (use ponto ao invés de vírgula)!";
        header('location: ./../index.php');}

    $nome = $_POST['nomeDeal'];
    $valor = $_POST['valor'];
    $id = $_POST['id'];
    $valorAr=$_POST["valorUSD"];
    
    $data=[
        "nome" => $nome,
        "valor" => $valor,
        "id" => $id
    ];
    
    $valorTotalA=(float)$valor +(float)$valorAr; 
    $valorTotal=(string)$valorTotalA;
    $result = createDeal($data);
    if($result){
        $data=[
            "total" => $valorTotal,
            "id" => $id
        ];
        $result2 = updateCompanyDeal($data);
            if($result2){
                $_SESSION['mensagem2'] = "Negócio adicionado!";
                header('location:./../index.php');
            }else{ 
                $_SESSION['mensagem'] = "Erro ao adicionar valor!";
                header('location:./../index.php');

            }
        }else{
        $_SESSION['mensagem'] = "Erro ao adicionar valor!";
        header('location:./../index.php');
        }
    
    }