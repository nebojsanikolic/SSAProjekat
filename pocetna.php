<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login page</title>
</head>
<body class="bg-light">
  <?php $loginstatus = isset($loginstatus)?($loginstatus):true  ;
        $alert = '<div class="alert alert-warning" role="alert">
        Login Failed - Please Check your Credentials      </div>';
  ?>

    <div class="container my-5">
        <div class="card mx-auto" style="width: 25rem;">
            <img src="slika.webp" class="card-img-top" alt="...">
            <div class="card-body px-5 pb-5">
              <h2 class="card-title"><span style="font-weight: 700;">Find free parking space.</span></h2>
              <form action="controller.php" method="POST">
                <input type="text" name="username" class="form-control my-3" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                <input type="password" name="password" class="form-control my-3 " placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                <input type="submit" action="login" name="login" value="Login" class="btn my-3 text-light w-100 mx-auto d-block" style="background-color: #2145D2;font-weight: 700;">
                <?php if(!$loginstatus){
                  echo $alert;
                } ?>
                <input type="submit" name="loginguest" value="Login as guest" class="btn btn-outline-secondary w-mt-3 w-100 mx-auto d-block" style="border: 1px dashed gray;">
              </form>
            </div>
          </div>
    </div>

</body>
</html>