<?php
require_once 'DAO.php';
$dao = new DAO();
session_start();
/*  require_once 'NekaKlasa.php';
    require_once 'NekaSimuliranaBaza.php'; 
    ...*/

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija


if ($_SERVER['REQUEST_METHOD']=="POST"){

    var_dump("33");
    
} elseif ($_SERVER['REQUEST_METHOD']=="GET"){
    $action = isset($_GET['action']) ? $_GET['action'] : NULL;  
    var_dump($action);
    switch ($action) {
        case 'up': 
            echo 'You laughed!';
            break;
        case 'down':
            echo 'You cried!';
            break;
    }
    
} else {
    //...
    header("Location: index.php"); //opciono
    die();
}

//funkcija za preradu unetih podataka
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>