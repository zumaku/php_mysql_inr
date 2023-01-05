<?php
include 'function.php';
session_start();

if (!isset($_SESSION['name'])) {
    echo "
        <script>
            alert('Anda belum login!');
            window.location.href = 'login.php';
        </script>
        ";
} else if(isset($_SESSION['indexLain2']) == 'udahDiIndexLain'){
    echo "
    <script>
        alert('Anda belum login sebagai user');
        window.location.href = 'indexUser.php';
    </script>
    ";
    header('Location: index.php');
}else{
    $_SESSION['alreadyLogin'] = 'alreadyLogin';
    $_SESSION['indexLain']  = 'udahDiIndexLain';
}

if(isset($_POST['logout'])){
    session_destroy();
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
                <form action="" method="post">
                    <button type="reset" class="btn btn-danger" id="logout" name="logout">LOG OUT</button>
                </form>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h1>Selamat Datang</h1>
                <p><?= $_SESSION['name'] ?></p>
                <div class="card col-4" style="margin-top: 10px;">
                    <div class="card-header">
                        <div class="d-flex justify-center">
                            <h6>Judul</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste fugiat veniam harum officiis deleniti quia omnis earum id incidunt eaque asperiores ab, eos commodi ullam blanditiis, et hic recusandae nisi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const logout = document.getElementById('logout');
        logout.addEventListener('click', function (){
            if(confirm("Yakin keluar")){
                logout.setAttribute('type', 'submit');
            } 
            
        });
    </script>
</body>

</html>