<?php 
    $koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan'); 

    function insert($data){
        $judul = $data['judul'];
        $penulis = $data['penulis'];
        $tahun = $data['tahun_terbit'];
        $deskripsi = $data['deskripsi'];

        global $koneksi;
        $query = "INSERT INTO buku (judul, deskripsi, tahun_terbit, penulis) VALUES ('$judul', '$deskripsi', '$tahun', '$penulis')";

        mysqli_query($koneksi, $query);

        if(mysqli_affected_rows($koneksi)){
            header("location:index.php?insert_success");
        }
    }

    function update_data($data){
        $id = $data['id'];
        $judul = $data['judul'];
        $penulis = $data['penulis'];
        $tahun = $data['tahun_terbit'];
        $deskripsi = $data['deskripsi'];

        global $koneksi;
        $query = "UPDATE buku SET judul = '$judul', deskripsi = '$deskripsi', tahun_terbit = '$tahun', penulis = '$penulis' WHERE id = '$id'";
        mysqli_query($koneksi, $query);

        if(mysqli_affected_rows($koneksi)){
            header("location:index.php?update_success");
        }
    }

    function delete_data($id){
        $query = "DELETE FROM buku WHERE id = '$id'";
        global $koneksi;
        mysqli_query($koneksi, $query);

        if(mysqli_affected_rows($koneksi) > 0){
            header("location: index.php?delete_success");
        }
    }
?>