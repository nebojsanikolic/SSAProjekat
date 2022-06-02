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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black;">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand mr-1" href="#"><?= $admin["ImePrezime"] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Link <span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="//codeply.com">Codeply</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
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

                        $card = '<div class="col-md-3  m-2">
                        <div class="card bg-primary style="width: 18rem;">
                        <div class="card-header" style="text-weigth: 900; color:white">
                        '.$parkingLot["id"]. '
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Max capacity : '.$parkingLot["MaxCap"].'</li>
                            <li class="list-group-item">Occupied : '.$parkingLot["Occupied"].'</li>
                        </ul>
                        </div></div>
                        ';

                        echo $card;
                    }
                ?>
            
        </div>
    </div>
</body>
</html> 

<?php } else{
        header('location:pocetna.php');
    }?>