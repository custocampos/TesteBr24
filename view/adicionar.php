<?php
include_once __DIR__ ."/header.php"; 
include_once __DIR__ . "/message.php";
    


$form = new StdClass();
$form->company ="";
$form->name ="";
$form->cpf="";
$form->cnpj ="";
$form->mail="";
$form->phone="";
$form->method = "post";

if(isset($_SESSION['flag'])){
    unset($_SESSION['flag']);
    ?>


<script>
    $(document).ready(function () {

        $('.modal').modal();
        $('#modalb').modal('open');
        $('#cls').click(function () {
            $('#modalb').modal('close');
        });
    });
</script>

<?php
        
    };

if(isset($_GET['pg'])){
    session_unset();
}

include __DIR__."/form.php"; 


// Footer
include_once __DIR__ ."/footer.php";


 