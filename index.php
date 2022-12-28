<?php include 'function.php' ?>

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
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card col-12" style="margin-top: 10px;">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h6>Data Buku</h6>
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
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i = 1;
                                    foreach($dataBuku as $buku):
                                ?>

                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $buku['judul'] ?></td>
                                    <td><?= $buku['deskripsi'] ?></td>
                                    <td><?= $buku['tahun_terbit'] ?></td>
                                    <td><?= $buku['penulis'] ?></td>
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
</body>
</html>