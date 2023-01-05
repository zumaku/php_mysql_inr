<?php 

    include "function.php";

    if(isset($_POST['kirim'])){
        insert($_POST);
    }

    if(isset($_POST['update'])){
        update_data($_POST);
    }

    if(isset($_POST['id'])){
      delete_data($_POST['id']);
    }



    // koneksi database
    $koneksi = mysqli_connect('localhost', 'root', 'Tenin@123', 'perpustakaan');

    // query untuk mengambil data
    $query = "SELECT * FROM buku";

    // eksekusi query
    $hasil = mysqli_query($koneksi, $query);

    // buat array kosong untuk menampung data buku
    $books = array();
    
    // proses pengambilan data
    while($baris = mysqli_fetch_assoc($hasil)){
        array_push($books, $baris);
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php 
        if(isset($_GET['insert_success'])){
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Buku berhasil ditambahkan'
                    }).then((e) => {
                        if(e.isConfirmed){
                            window.location.href = 'index.php';
                        }
                    });
                </script>
            ";
        } 
        if(isset($_GET['update_success'])){
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Buku berhasil diupdate'
                    }).then((e) => {
                        if(e.isConfirmed){
                            window.location.href = 'index.php';
                        }
                    });
                </script>
            ";
        } 
        if(isset($_GET['delete_success'])){
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Buku berhasil dhapus'
                    }).then((e) => {
                        if(e.isConfirmed){
                            window.location.href = 'index.php';
                        }
                    });
                </script>
            ";
        } 
    ?>
  <div class="container">
    <div class="mt-5 row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h6>Data Buku</h6>
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Buku</th>
                  <th>Deskripsi</th>
                  <th>Penulis</th>
                  <th>Tahun Terbit</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                    // perulangan data
                    foreach($books as $i => $book) :
                ?>
                <tr>
                  <td><?= $i+1 ?></td>
                  <td><?= $book['judul']  ?></td>
                  <td><?= $book['deskripsi'] ?></td>
                  <td><?= $book['penulis'] ?></td>
                  <td><?= $book['tahun_terbit'] ?></td>
                  <td>
                    <div class="d-flex gap-3">
                      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_edit"
                      onclick='updateForm(JSON.stringify(<?php echo json_encode($book); ?>))'>Edit</button>
                        <button onclick="deleteData('<?= $book['id'] ?>')" class="btn btn-sm btn-danger">Hapus</button>
                    </div>
                  </td>
                </tr>
                <?php 
                                 endforeach;
                            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<form id="form_delete" action="" method="post">
  <input type="hidden" name="id">
</form>

  <!-- modal input -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form_insert" action="" method="POST">
            <input type="hidden" name="kirim">
            <div class="mb-3">
              <label for="judul" class="form-label">Judul Buku</label>
              <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul buku">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="mb-3">
                  <label for="penulis" class="form-label">Penulis</label>
                  <input type="text" name="penulis" class="form-control" id="penulis"
                    placeholder="Masukkan nama penulis buku">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                  <input type="year" name="tahun_terbit" class="form-control" id="tahun_terbit"
                    placeholder="Masukkan tahun terbit buku">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi Buku</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button id="submit_form" type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal edit -->
   <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Buku</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form_update" action="" method="POST">
            <input type="hidden" name="update">
            <input type="hidden" id="id" name="id">
            <div class="mb-3">
              <label for="judul" class="form-label">Judul Buku</label>
              <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul buku">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="mb-3">
                  <label for="penulis" class="form-label">Penulis</label>
                  <input type="text" name="penulis" class="form-control" id="penulis"
                    placeholder="Masukkan nama penulis buku">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                  <input type="year" name="tahun_terbit" class="form-control" id="tahun_terbit"
                    placeholder="Masukkan tahun terbit buku">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi Buku</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button id="submit_form_update" type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const form = $('#form_insert');
    $('#submit_form').click(()=>{
        form.submit();
    })

    $('#submit_form_update').click(function(){
        $('#form_update').submit();
    })

    function updateForm(data){
        const book = JSON.parse(data);
        const form = '#form_update';
        $(form +' #id').val(book.id);
        $(form +' #judul').val(book.judul);
        $(form +' #penulis').val(book.penulis);
        $(form +' #tahun_terbit').val(book.tahun_terbit);
        $(form +' #deskripsi').val(book.deskripsi);
    }

    function deleteData(id){
      $('#form_delete input').val(id);
      Swal.fire({
        title: 'Yakin Hapus?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.isConfirmed) {
          $('#form_delete').submit()
        }
      })
    }
</script>

</body>

</html>
