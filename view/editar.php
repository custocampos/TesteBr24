<?php
// Conexão
require_once ("../model/db_connect.php");
// Header
include_once __DIR__ ."/header.php";
// Select
include_once __DIR__ . "/message.php";

function funSomaVetor($v)     { 
    $soma = 0;
    for ($i=0; $i < sizeof($v); $i++) { 
        $soma = $soma + $v[$i]; 
    } 
    return $soma; 
 }

if(isset($_GET['id'])){
	$flag=0;
	$id = $_GET['id'];
	$resultado=getCompany($id);
	$dado=(array)json_decode($resultado);
	$dados=(array)$dado["result"];

	$resultado2=getContact($id);
	$dado2=(array)json_decode($resultado2);
	$dados2=(array)$dado2["result"];
		if(isset($dados2[0]->NAME)){
			$nome=$dados2[0]->NAME;
			$sobrenome=$dados2[0]->LAST_NAME;
			
		}else{
			$nome="";
			$sobrenome="";
			
		}
	
	$resultado3=getDeal($id);
	$dado3=(array)json_decode($resultado3);
	$dados3=(array)$dado3["result"];

	$valorSum=[];
		if(isset($dados3[0]->OPPORTUNITY)){
			foreach($dados3 as $dado){
				$dado = (array) $dado;
				$valorSum[]=(float)$dado["OPPORTUNITY"];;
			}
			$valorUSD=funSomaVetor($valorSum);
			
		}else{
			$valorUSD="0.00";
			
		}
}

include __DIR__."/form_update.php";



// Footer
include_once __DIR__ ."/footer.php";

