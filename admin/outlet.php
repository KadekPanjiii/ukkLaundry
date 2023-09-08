<?php

require '../function/config.php';
require '../function/crud.php';
require '../function/flashMessage.php';

$crud = new Crud();

if(isset($_POST['tambah'])){
$crud->tambahOutlet($_POST);
}

if(isset($_POST['ubah'])){
$crud->ubahOutlet($_POST);
}

if(isset($_GET['hapusid'])){
  $hapus = $_GET['hapusid'];
  $crud->hapusOutlet($hapus);
}

?>

  <!-- /.header -->
  <?php include ('../layouts/header.php'); ?>

  <!-- /.navbar -->
  <?php include ('../layouts/navbar.php'); ?>

  <!-- /.sidebar -->
  <?php include ('../layouts/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Outlet</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <?php
    FlashMessage::flashMessage();
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-tambah">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $tampil = $crud->tampilOutlet();
                    if ($tampil->num_rows > 0) {
                    $out = $tampil->fetch_all(MYSQLI_ASSOC);
                    for ($i = 0; $i < count($out); $i++) :
                  ?>
                  <tr id='tr_<?= $out[$i]['id']; ?>'>
                    <td><?= $i + 1 ?></td>
                    <td><?= $out[$i]['nama']?></td>
                    <td><?= $out[$i]['alamat']?></td>
                    <td><?= $out[$i]['tlp']?></td>
                    <td>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-ubah<?= $out[$i]['id']; ?>"><i class="fa fa-edit"></i> Ubah</button>
                        <button class="btn btn-sm btn-danger btn-del" value="<?= $out[$i]['id']; ?>"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <!-- Modal Ubah -->
                  <div class="modal fade" id="modal-ubah<?= $out[$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Outlet</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                                <input type="text" class="form-control form-control-sm" value="Id Outlet (<?= $out[$i]['id']; ?>)" disabled>
                                <input type="hidden" name="id" value="<?= $out[$i]['id']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama" value="<?= $out[$i]['nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-sm" name="alamat" placeholder="Alamat" rows="3" required><?= $out[$i]['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="tlp" placeholder="Telepon" value="<?= $out[$i]['tlp']; ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" name="ubah" class="btn btn-sm btn-primary">Perbarui</button>
                        </div>
                        </form>
                        </div>
                    </div>
                  </div>
                  <?php endfor;             
                  } else { ?>            
                  <tr>
                      <td colspan="5" class='text-center'>Tidak ada data Outlet</td>
                  </tr>
                  <?php } ?>                                              
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.footer -->
  <?php include ('../layouts/footer.php'); ?>


  <!-- Modal Tambah -->
  <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Outlet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post">
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-sm" name="alamat" placeholder="Alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="tlp" placeholder="Telepon" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah</button>
        </div>
        </form>
        </div>
    </div>
  </div>

  <script>
	$(".btn-del").on("click", function(e) {
		e.preventDefault();
    var id = $(this).val();

    Swal.fire({
    title: 'Apa kamu yakin?',
    text: "Anda tidak akan dapat mengembalikan ini!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus sekarang!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'post',
        url: 'outlet.php?hapusid',
        data: {
          'delid': true,
          'id': id,
        },
        success: function (response){
        }
      });
      Swal.fire(
        'Terhapus!',
        'Data Anda telah dihapus.',
        'success'
      )
      $('#tr_'+id).hide();
    }   
  })
  });
</script>