<?php
session_start();
require_once ("../model/db_connect.php");




if(isset($_POST['btn-editar'])){
    $empresa = $_POST['company'];
    $nome = $_POST['name'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $id=$_POST["id"];

    $data=[
        "empresa" => $empresa,
        "nome" => $nome,
        "cpf" => $cpf,
        "cnpj" => $cnpj,
        "email" => $email,
        "telefone" => $telefone,
        "id"=> $id
    ];

    

    $postArray=filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $counts = array_count_values($postArray);
    if($postArray){
        
        if($counts[""]>=2 ){
            
            $_SESSION['mensagem'] ="Preencha todos os campos";
            header('location: ../view/editar.php?id='.$id);
            
            }elseif(!filter_var($postArray['cpf'],FILTER_VALIDATE_INT)) {
                $_SESSION['mensagem'] ="CPF informado não é válido, utilize somente números!";
                header('location: ../view/editar.php?id='.$id);
            }elseif(!filter_var($postArray['cnpj'],FILTER_VALIDATE_INT)) {
                $_SESSION['mensagem'] ="Cnpj informado não é válido, utilize somente números!";
                header('location: ../view/editar.php?id='.$id);
            }else{
                $result = updateCompany($data);
                if ($result){
                    $_SESSION['mensagem2'] = "Atualizado com sucesso!";
                    header('location: ./../index.php');
                }else{
                    
                $_SESSION['mensagem'] = "Erro ao editar!";
                header('location: ./../index.php');
                } 
        }
    }
}

if(isset($_POST['btn-editar2'])){
    $empresa = $_POST['company'];
    $nome = $_POST['name'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $id=$_POST["id"];

    $data=[
        "empresa" => $empresa,
        "nome" => $nome,
        "cpf" => $cpf,
        "cnpj" => $cnpj,
        "email" => $email,
        "telefone" => $telefone,
        "id"=> $id
    ];
   
    $counts = array_count_values($_SESSION['dados']);
    if($_SESSION['dados']){
        
        if($counts[""]>=2 ){
            
            $_SESSION['mensagem'] ="Preencha todos os campos";
            header('location: editar.php?id='.$id);
            
        }elseif(!filter_var($_SESSION['dados'][2],FILTER_VALIDATE_INT)) {
            $_SESSION['mensagem'] ="CPF informado não é válido, utilize somente números!";
            header('location: editar.php?id='.$id);
        }elseif(!filter_var($_SESSION['dados'][3],FILTER_VALIDATE_INT)) {
            $_SESSION['mensagem'] ="Cnpj informado não é válido, utilize somente números!";
            header('location: editar.php?id='.$id);
        }
        else{
            $result = updateCompany($data);
            if($result){
                $_SESSION['mensagem2'] = "Atualizado com sucesso!";
                header('location:./../index.php');
            }else{
                
            $_SESSION['mensagem'] = "Erro ao editar!";
            header('location:./../index.php');
            
            } 




        }
    }
}