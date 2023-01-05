<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM buku WHERE id = '$id'";
    } 
?>