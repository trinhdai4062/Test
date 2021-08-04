<?php
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['success']);
        unset($_SESSION['error']);
    }
    require_once __DIR__."/../libraries/Database.php";
    require_once __DIR__."/../libraries/Function.php"; 
     $db=new Database();

    

    
    //  define("ROOT",$_SERVER['DOCUMENT_ROOT']."/WEB_BANHANG/public/uploads/")


     
?>