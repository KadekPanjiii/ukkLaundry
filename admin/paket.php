<?php

require '../function/config.php';
require '../function/crud.php';
require '../function/flashMessage.php';

$crud = new Crud();

if(isset($_POST['tambah'])){
$crud->tambahPaket($_POST);
}

if(isset($_POST['ubah'])){
$crud->ubahPaket($_POST);
}

if(isset($_GET['hapusid'])){
  $hapus = $_GET['hapusid'];
  $crud->hapusPaket($hapus);
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
            <h1>Data Paket</h1>
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
                    <th>Outlet</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $tampil = $crud->tampilPaket();
                    if ($tampil->num_rows > 0) {
                    $out = $tampil->fetch_all(MYSQLI_ASSOC);
                    for ($i = 0; $i < count($out); $i++) :
                  ?>
                  <tr id='tr_<?= $out[$i]['id']; ?>'>
                    <td><?= $i + 1 ?></td>
                    <td><?= $out[$i]['nama_paket']?></td>
                    <td><?= $out[$i]['nama']?></td>
                    <td><?= $out[$i]['jenis']?></td>
                    <td>Rp. <?=number_format($out[$i]['harga'])?></td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Paket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" value="Id Paket (<?= $out[$i]['id']; ?>)" disabled>
                                <input type="hidden" name="id" value="<?= $out[$i]['id']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="outlet" class="form-control form-control-sm" required>
                                    <option style="background: #dddddd;" disabled>Pilihh Outlet</option>
                                    <?php
                                    $result = $crud->tampilOutlet();
    
                                        while($row = mysqli_fetch_array(($result))) { ?>
                                            <option value="<?= $row['id']; ?>" <?php if($row['id'] == $out[$i]['id_outlet']){ echo 'selected'; }?>>
                                            <?= $row['nama']; ?>
                                            </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama Paket" value="<?= $out[$i]['nama_paket']; ?>" required>
                            </div>
                            <div class="form-group">
                                <select name="jenis" class="form-control form-control-sm">
                                    <option style="background: #dddddd;" disabled>Pilih Jenis</option>
                                    <option value="kiloan"<?php if('kiloan' == $out[$i]['jenis']){ echo 'selected';}?>>kiloan</option>
                                    <option value="selimut"<?php if('selimut' == $out[$i]['jenis']){ echo 'selected';}?>>selimut</option>
                                    <option value="bed_cover"<?php if('bed_cover' == $out[$i]['jenis']){ echo 'selected';}?>>bed_cover</option>
                                    <option value="kaos"<?php if('kaos' == $out[$i]['jenis']){ echo 'selected';}?>>kaos</option>
                                    <option value="lain"<?php if('lain' == $out[$i]['jenis']){ echo 'selected';}?>>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-sm" name="harga" placeholder="Harga" value="<?= $out[$i]['harga']; ?>" required>
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
                      <td colspan="6" class='text-center'>Tidak ada data Paket</td>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Paket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post">
        <div class="modal-body">
            <div class="form-group">
                <select name="outlet" class="form-control form-control-sm" required>
                    <option value="-1">Pilih Outlet</option>
                    <?php
                      $result = $crud->tampilOutlet();
                      if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              echo "<option value='" . $row["id"] . "'> " . $row["nama"] . "</option>";
                          }
                      } else {
                          echo "<option valuee='-1'> Tidak ada Outlet </option>";
                      }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama Paket">
            </div>
            <div class="form-group">
                <select name="jenis" class="form-control form-control-sm" required>
                    <option value="">Pilih Jenis</option>
                    <option value="kiloan">kiloan</option>
                    <option value="selimut">selimut</option>
                    <option value="bed_cover">bed_cover</option>
                    <option value="kaos">kaos</option>
                    <option value="lain">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control form-control-sm" name="harga" placeholder="Harga" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" name="tambah" class="btn btn-sm btn-primary">Tambah</button>
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
        url: 'paket.php?hapusid',
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