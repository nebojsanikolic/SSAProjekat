<?php 
    // OBJEKTI I KLASE
    
    class lot{
        public $id;
        public $name;
        public $MaxCap;
        public $Occupied;
    }
    // KARTICE

    $card = '';


    // SESIJA
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="test.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black;">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand mr-1" href="#">GUEST</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="pocetna.php" style="white-space: nowrap">Back to main page</a>
            </li>
            
        </ul>
    </div>
    <span class="navbar-text small text-truncate mt-1 w-50 text-right order-1 order-md-last">Smart parking App</span>
</nav>
    <!-- PODACI -->
    <div class="container">
        <div class="row mt-5">
            
                <?php 
                    $parkingLot = new lot();
                    $id1='1';
                    while($dao->GetParkingById($id1)){
                        $parkingLot = $dao->GetParkingById($id1);
                        $id1=$id1+1;

                        //
                        $procenat = ($parkingLot["Occupied"]/$parkingLot["MaxCap"])*100;
                        $slobodna = $parkingLot["MaxCap"]-$parkingLot["Occupied"];
                        //
                        $card = '<div class="col-md-4 mt-5">
                        <div class="card p-3 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"><i class="bx bxs-parking"></i></i> </div>
                                    <div class="ms-2 c-details">
                                        <h6 class="mb-0 mx-3 text-muted">Parking ID - '.$parkingLot["id"].'</h6> 
                                    </div>
                                </div>
                                <div class="badge my-auto d-block"> <span> '.$slobodna.'</span> </div>
                            </div>
                            <div class="mt-5">
                                <h3 class="heading">'.$parkingLot["name"].'</h3>
                                <div class="mt-5">
                                    <div class="progress">
                                        <div class="progress-bar" id="'.$id1.'"  role="progressbar" style="width:'.$procenat.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="mt-3"> <span class="text1">'.$parkingLot["Occupied"].' Occupied <span class="text2">of '.$parkingLot["MaxCap"].' capacity</span></span> </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                        ';

                        echo $card;
                    }
                ?>
            
        </div>
        <div class="row mt-5">
                <div class="col text-center mt-5" >
                    <img src="ftn.png" class="img-fluid mx-auto d-block" width="75px" alt="" style="opacity: 0.7; filter: grayscale(100);"> <br>
                    <p style="opacity:0.5; font-size:14px">@FTN Čačak</p>
                    <p style="opacity:0.3">Savremene softverske arhitekture <br> Milica Stevanić 32/2018 <br> Nebojša Nikolić 68/2018</p>
                </div>
        </div>
    </div>
    <!-- JAVA -->
    <script type="text/javascript" src="test.js"></script>
</body>
</html> 

