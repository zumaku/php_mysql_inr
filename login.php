<?php
    include 'function.php';

    session_start();

    function login(){
        global $koneksi;

        $username = $_POST['userName'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM user WHERE email = '$email'";
        $output = mysqli_query($koneksi, $query);
        $hua = mysqli_fetch_assoc($output);
        
        $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user WHERE email = 'admin@gmail.com'");
        $huaAdmin = mysqli_fetch_assoc($queryAdmin);

        if(
            $huaAdmin['username'] == $username &&
            $huaAdmin['email'] == $email &&
            password_verify($pass, $huaAdmin['password']) == 1
        ){
            $_SESSION['name'] = $huaAdmin['username'];
            header('Location: index.php');
        }else if(
            $hua['username'] == $username &&
            $hua['email'] == $email &&
            password_verify($pass, $hua['password']) == 1
        ){
            echo"
                <script>
                    alert('Login Berhasil!');
                </script>
            ";
            $_SESSION['name'] = $hua['username'];
            header('Location: indexUser.php');
        } else{
            echo"
                <script>
                    alert('Login Gagal!');
                </script>
            ";
        }
    }

    if(isset($_POST['login'])){
        login();
    }

    if(isset($_SESSION['alreadyLogin']) == 'alreadyLogin'){
        echo "
        <script>
            alert('Anda telah login!');
            window.location.href = 'indexUser.php';
        </script>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .bigCard{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .cardKu{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card-body{
            width: 70%;
        }
        .form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .form input{
            width: 100%;
            margin: 10px 0;
        }
    </style>

</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 bigCard">
                <div class="card col-8 d-flex cardKu" style="margin-top: 10px;">
                    <div class="card-head">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="form">
                            <input type="text" name="userName" placeholder="User Name">
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" name="login">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>