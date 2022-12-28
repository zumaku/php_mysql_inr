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




    // fungsi tambah data
    function tambahData($data){
        global $koneksi;

        $judul = $data['judul'];
        $deskripsi = $data['deskrip'];
        $tahunTerbit = $data['tahun'];
        $penulis = $data['penulis'];

        $sql = "INSERT INTO buku
                VALUES ('', '$judul', '$deskripsi', '$tahunTerbit', '$penulis')";
        
        return mysqli_query($koneksi, $sql);
    }

    if (isset($_POST['tambah'])) {

        if (tambahData($_POST) > 0) {
            echo "
                    <script>
                        alert('Input Data Berhasil!');
                        window.location.href = 'index.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Input Data Gagal!');
                        window.location.href = 'index.php';
                    </script>
                ";
        }
    }


?>