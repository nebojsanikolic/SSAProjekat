<?php
require_once 'DAO.php';
$dao = new DAO();
session_start();
/*  require_once 'NekaKlasa.php';
    require_once 'NekaSimuliranaBaza.php'; 
    ...*/

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija


if ($_SERVER['REQUEST_METHOD']=="POST"){

    $parkname = isset($_POST["parkingname"])? test_input($_POST["parkingname"]):"";
    $parklat = isset($_POST["parkinglat"])? test_input($_POST["parkinglat"]):"";
    $parklng = isset($_POST["parkinglng"])? test_input($_POST["parkinglng"]):"";
    $occupied = isset($_POST["occupied"])? test_input($_POST["occupied"]):"";
    $parkmaxcap = isset($_POST["parkingmaxcap"])? test_input($_POST["parkingmaxcap"]):"";
    if (isset($_POST['insert'])) {
        if(!empty($parkname) && !empty($parklat) && !empty($parklng) && !empty($parkmaxcap) && !empty($occupied)){
                $insert = $dao->insertParking($parkname, $parkmaxcap, $occupied,$parklat, $parklng);
                if($insert == true){
                    $loginstatus = false;
                    include_once 'admin.php';
                }
                else{
                    include_once 'C:/xampp/htdocs/SSAProjekat/pocetna.php';
                }
            }
            else{
                $loginstatus = false;
                include_once 'C:/xampp/htdocs/SSAProjekat/pocetna.php';

            } 
    }
    
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