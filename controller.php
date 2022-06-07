<?php
require_once 'DAO.php';
$dao = new DAO();
session_start();
/*  require_once 'NekaKlasa.php';
    require_once 'NekaSimuliranaBaza.php'; 
    ...*/

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija


if ($_SERVER['REQUEST_METHOD']="POST"){
    $username = isset($_POST["username"])? test_input($_POST["username"]):"";
    $password = isset($_POST["password"])? test_input($_POST["password"]):"";
    if (isset($_POST['login'])) {
        if(!empty($username) && !empty($password)){
                $postoji = $dao->GetAdmin($username,$password);
                if($postoji == true){
                    $loginstatus = true;
                    $adminID = $postoji["id"];
                    $_SESSION["admin"]=$adminID;
                    include 'admin.php';
                }
                else{
                    $loginstatus = false;
                    include_once 'C:/xampp/htdocs/SSAProjekat/pocetna.php';
                }
            }
            else{
                $loginstatus = false;
                include_once 'C:/xampp/htdocs/SSAProjekat/pocetna.php';

            } 
    }
    elseif (isset($_POST['loginguest'])) {
        include 'guest.php';
    }
    
} elseif ($_SERVER['REQUEST_METHOD']="GET"){
    if ($action == 'up') {
        echo "uspesno";
    } elseif ($action == 'down'){
        var_dump("down");
    }elseif ($action == 'akcijaGet3'){
        //...
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