<?php 
    // OBJEKTI I KLASE
    
    class lot{
        public $id;
        public $MaxCap;
        public $Occupied;
    }
    // KARTICE

    $card = '';


    // SESIJA
    if(!isset($_SESSION)) session_start();
    if($_SESSION["admin"] != "")
    {        
        $dao = new DAO();
        $admin = $dao-> GetAdminByID($_SESSION["admin"]);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="test.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body class="bg-light">

<?php $loginstatus = isset($loginstatus)?($loginstatus):true  ;
        $alert = '<div class="alert alert-warning" role="alert">
        Insert Failed - Please Check your input details.      </div>';
  ?>


<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black;">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand mr-1" href="#"><?= $admin["ImePrezime"] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
        <ul class="navbar-nav">
            <a class="nav-link" href="pocetna.php" style="white-space: nowrap">Back to main page</a>
        </ul>
    </div>
    <span class="navbar-text small text-truncate mt-1 w-50 text-right order-1 order-md-last">Smart parking App</span>
</nav>
<!-- INSERT -->
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="slika.webp" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title font-weight-bold">Insert new parking</h5>
                <p class="card-text">Insert details for new parking lot.</p>
                <form action="controlleradmin.php" method="POST">
                    <input type="text" name="parkingname" class="form-control my-3" placeholder="Parking Name" aria-label="Parking Name" aria-describedby="basic-addon1">
                    
                    <input type="number" name="parkingmaxcap" class="form-control my-3 " placeholder="Cappacity" aria-label="Password" aria-describedby="basic-addon1">
                    <input type="number" name="occupied" class="form-control my-3 " placeholder="Occupied" aria-label="Occupied" aria-describedby="basic-addon1">
                    <input type="number" step="any" name="parkinglat" class="form-control my-3 " placeholder="Latitude" aria-label="Password" aria-describedby="basic-addon1">
                    <input type="number" step="any" name="parkinglng" class="form-control my-3 " placeholder="Longitude" aria-label="Password" aria-describedby="basic-addon1">
                    <input type="submit" action="insert" name="insert" value="Insert" class="btn my-3 text-light w-100 mx-auto d-block" style="background-color: #2145D2;font-weight: 700;">
                    <?php if(!$loginstatus){
                    echo $alert;
                    } ?>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">    <!-- PODACI -->

                <div class="row mx-2">
            <?php 
                    $parkingLot = new lot();
                    $id1='1';
                    while($dao->GetParkingById($id1)){
                        $parkingLot = $dao->GetParkingById($id1);
                        $id1=$id1+1;
                        
                        $procenat = ($parkingLot["Occupied"]/$parkingLot["MaxCap"])*100;

                        $card = '
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="c'.$id1.'" class="card bg-dark mt-5">
                        <div class="card-header" style="font-weight: bold; color:white">
                        '.$parkingLot["id"]. ' - '.$parkingLot["name"]. '
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="font-weight: bold;">Max capacity : '.$parkingLot["MaxCap"].'</li>
                            <li class="list-group-item" style="font-weight: bold;">Occupied : '.$parkingLot["Occupied"].'</li>
                            <div class="progress" style="border-radius:0rem; height:15px">
                            <div class="progress-bar" id="'.$id1.'" role="progressbar" style="border-radius: 0;width:'.$procenat.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <li class="list-group-item">
                            
                            </li>
                            <li class="list-group-item" style="font-weight: bold;"><button type="button" class=" w-100 btn btn-outline-danger"> Delete</button>      </li>                   
                       
                                   
                            
                        </ul>
                                               

                        </div>
                        </div>
                    
                        ';

                        echo $card;
                    }
                ?></div>
            </div>
        </div>
        <div class="row mt-5">
            
                
            
        </div>
    </div>
    <script type="text/javascript" src="test.js"></script>

</body>
</html> 

<?php } else{
        header('location:pocetna.php');
    }?>