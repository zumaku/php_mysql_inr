<?php

    // Fungsi ini untuk mengoneksikan web kita ke database menggunakan mysqli_connect
    $koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');


    // cek koneksi ke database berhasi atau tidak
    // if($koneksi) echo "Koneksi Berhasil!";
    // else echo "Koneksi Gagal!"


    $query = "SELECT * FROM buku";      // Variable untuk menampung perintah query

    $hasil = mysqli_query($koneksi, $query);      // Fungsi untuk mengeksekusi query. Berisi dua argumen untuk di eksekusi. Argumen pertama berisi koneksinya ke database dan argumen kedua berisi query yang akan dieksekusi. Nah.. fungsi ini disimpan ke dalam variable hasil.



    $dataBuku = array();
    while($baris = mysqli_fetch_assoc($hasil)){     // Selama melakukan pengambilan data dari tabel
        array_push($dataBuku, $baris);      // Memasukkan sebaris data dari tabel
    }
    // var_dump($data);

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
    

    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h6>Data Buku</h6>
                            <a href="#" class="btn btn-success">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table
                        -hover">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>