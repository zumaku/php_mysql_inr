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
    } else if(isset($_SESSION['indexLain']) == 'udahDiIndexLain'){
        echo "
        <script>
            alert('Anda belum login sebagai admin');
            window.location.href = 'index.php';
        </script>
        ";
    } else{
        $_SESSION['alreadyLogin'] = 'alreadyLogin';
        $_SESSION['indexLain2']  = 'udahDiIndexLain';
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
                <div class="card col-12" style="margin-top: 10px;">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h6>Data Buku</h6>
                            <p href="#" class="btn btn-primary" id="btnEdData">Edit Data</p>
                            <p href="#" class="btn btn-success" id="btnTbData">Tambah Data</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Judul Buku</td>
                                    <td>Deskripsi</td>
                                    <td>Tahun Terbit</td>
                                    <td>Penulis</td>
                                    <td class="aksiEdit" hidden>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i = 1;
                                    foreach($dataBuku as $buku):
                                ?>

                                <tr>
                                    <td class="tdBuku"><?= $i ?></td>
                                    <td class="tdBuku"><?= $buku['judul'] ?></td>
                                    <td class="tdBuku"><?= $buku['deskripsi'] ?></td>
                                    <td class="tdBuku"><?= $buku['tahun_terbit'] ?></td>
                                    <td class="tdBuku"><?= $buku['penulis'] ?></td>
                                    <td class="aksiEdit" hidden>
                                        <input name="id" value="<?= $buku['id']; ?>">
                                        <p href="#" class="btn btn-primary" id="btnTbData">Edit</p>
                                    </td>
                                </tr>

                                
                                <?php
                                    $i++;
                                    endforeach;
                                ?>
    
                                <!-- form menambah data baru -->
                                <form action="" method="POST">
                                    <tr hidden="hidden" id="formData">
                                            <td><?= $i ?></td>
                                            <td><input type="text" name="judul"></td>
                                            <td><textarea name="deskrip" id="" cols="30" rows="1" style="resize: row;"></textarea></td>
                                            <td><input type="date" name="tahun"></td>
                                            <td><input type="text" name="penulis"></td>
                                    </tr>
                                    <tr hidden="hidden" id="BtnPushData">
                                        <td colspan="5">
                                            <button type="submit" id="pushData" class="btn btn-success" name="tambah">Tambahkan</button>
                                            <button id="cancelData" class="btn btn-danger">Batal</button>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
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