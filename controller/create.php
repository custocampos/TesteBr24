
<?php
session_start();
require_once ("../model/db_connect.php");
 


$postArray=filter_input_array(INPUT_POST,FILTER_DEFAULT);


$counts = array_count_values($postArray);


if($postArray){
    if($counts[""] >= 2){
        $_SESSION['mensagem'] ="Preencha todos os campos";
        header('location: ../view/adicionar.php');
        
    }elseif(!filter_var($postArray['cpf'],FILTER_VALIDATE_INT)) {
        $_SESSION['mensagem'] ="CPF informado não é válido, utilize somente números!";
        header('location: ../view/adicionar.php');
    }elseif(!filter_var($postArray['cnpj'],FILTER_VALIDATE_INT)) {
        $_SESSION['mensagem'] ="Cnpj informado não é válido, utilize somente números!";
        header('location: ../view/adicionar.php');
    }else{
        if(isset($_POST['btn-cadastrar'])){
            $empresa = $_POST['company'];
            $nome = $_POST['name'];
            $cpf = $_POST['cpf'];
            $cnpj = $_POST['cnpj'];
            $email = $_POST['email'];
            $telefone = $_POST['phone'];

            $data=[
                "empresa" => $empresa,
                "nome" => $nome,
                "cpf" => $cpf,
                "cnpj" => $cnpj,
                "email" => $email,
                "telefone" => $telefone,
            
            ];


            $searchCpf = checkCpf($data["cpf"]);
            $transformCpf = json_decode($searchCpf);
            $cpfResult = $transformCpf->total;
            $testeA= test_duplicateCPF($cpfResult);

            $searchCnpj = checkCnpj($data["cnpj"]);
            $transformCnpj = json_decode($searchCnpj);
            $cnpjResult = $transformCnpj->total;
            $testeB= test_duplicateCNPJ($cnpjResult, $transformCnpj);

            var_dump($testeA,$testeB);
            if ($testeA || $testeB) {
                $data["id"] = $testeB;
                $result = updateCompany($data);
                if ($result) {
                    $id=(int)$data["id"]; 
                    $_SESSION['flag'] = "atualizar";
                    $_SESSION['id']=$id;
                    $_SESSION['dados']=[$_POST['company'],$_POST['name'],$_POST['cpf'],$_POST['cnpj'],$_POST['email'],$_POST['phone']];
                
                    header('location: ../view/adicionar.php');

                } else {
                    $_SESSION['mensagem'] = "Erro ao cadastrar!";
                    header('location: ../view/index.php');
                }
            } else {
                $result = createCompany($data);
                if ($result) {
                    $_SESSION['mensagem2'] = "Cadastrado com sucesso!";
                    header('location: ../view/index.php');
                } else {
                    $_SESSION['mensagem'] = "Erro ao cadastrar!";
                    header('location: ../view/index.php');
                }
    
            }
    
        }
    
    }

} 
    











