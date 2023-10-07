<?php

require '../function/config.php';
require '../function/crud.php';
require '../function/flashMessage.php';

$crud = new Crud();

if(isset($_POST['ubahstatus'])){
$crud->ubahStatus($_POST);
}

?>
<style>
  .hide {
    display: none!important;
}
.div {
    display: block;
}
</style>
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
            <h1>Data User</h1>
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
                <a href="tambah.php" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-striped table-sm"  style="font-size: 13px;">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Outlet</th>
                    <th>Status</th>
                    <th>Invoice</th>
                    <th>Member</th>
                    <th style="width: 8%;">Tanggal</th>
                    <th style="width: 8%;">Batas Waktu</th>
                    <th style="width: 8%;">Tanggal Dibayar</th>
                    <th>Dibayar</th>
                    <th>Total</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $tampil = $crud->tampilTransaksi();
                    if ($tampil->num_rows > 0) {
                    $out = $tampil->fetch_all(MYSQLI_ASSOC);
                    for ($i = 0; $i < count($out); $i++) :
                  ?>
                  <tr id='tr_<?= $out[$i]['id']; ?>'>
                    <td><?= $i + 1 ?></td>
                    <td><?= $out[$i]['outlet']?></td>
                    <td>
                      <?php 
                      if ($out[$i]['status'] == 'baru') { ?>
                        <p class="btn btn-xs btn-default">Baru</p>
                      <?php } else if ($out[$i]['status'] == 'proses'){ ?>
                        <p class="btn btn-xs btn-warning">Proses</p>
                      <?php } else if ($out[$i]['status'] == 'selesai'){ ?>
                        <p class="btn btn-xs btn-primary">Selesai</p>
                      <?php } else { ?>
                        <p class="btn btn-xs btn-success">Diambil</p>
                      <?php } ?>
                    </td>
                    <td><?= $out[$i]['kode_invoice']?></td>
                    <td><?= $out[$i]['member']?></td>
                    <td><?= $out[$i]['tgl']?></td>
                    <td><?= $out[$i]['batas_waktu']?></td>
                    <td><?= $out[$i]['tgl_bayar']?></td>
                    <td>
                      <?php
                        if ($out[$i]['dibayar'] == 'dibayar'){ ?>
                          <p class="btn btn-xs btn-success">Sudah Dibayar</p>
                      <?php } else { ?>
                          <p class="btn btn-xs btn-danger">Belum Dibayar</p>
                      <?php  } ?>
                    </td>
                    <td> 
                    <?php
                    $a = $out[$i]['harga'];
                    $b = $out[$i]['qty'];
                    $c = $out[$i]['biaya_tambahan'];
                    $total = ($a*$b)+$c;
                    echo "Rp. $total";
                    ?>  
                    </td>
                    <td>
                        <button class="btn btn-xs btn-warning btn-process-sales_transaction" data-toggle="modal" data-target="#modal-ubah-status<?= $out[$i]['id']?>" ><i class="fa fa-refresh"></i> Proses</button>
                        <a class="btn btn-xs btn-primary" href=""><i class="fa fa-edit"></i> Ubah</a>
                        <a class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?')" href=""><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                    <!-- Modal Ubah -->
                  <div class="modal fade" id="modal-ubah-status<?= $out[$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input type="text" name="id" value="<?= $out[$i]['id']; ?>" hidden>
                              <select name="dibayar" class="form-control form-control-sm" id="pay">
                                <option value="dibayar"<?php if('dibayar' == $out[$i]['dibayar']){ echo 'selected';}?>>Dibayar</option>
                                <option value="belum_dibayar"<?php if('belum_dibayar' == $out[$i]['dibayar']){ echo 'selected';}?>>Belum Dibayar</option>
                              </select>
                            </div>

                            <div class="form-group container-pay-date hide">
                                <input type="text" class="form-control" name="tgl_bayar" value />
                            </div>

                            <div class="form-group">
                                <select name="status" class="form-control form-control-sm">
                                    <option style="background: #dddddd;" disabled>Pilih Status</option>
                                    <option value="baru"<?php if('baru' == $out[$i]['status']){ echo 'selected';}?>>Baru</option>
                                    <option value="proses"<?php if('proses' == $out[$i]['status']){ echo 'selected';}?>>Proses</option>
                                    <option value="selesai"<?php if('selesai' == $out[$i]['status']){ echo 'selected';}?>>Selesai</option>
                                    <option value="diambil"<?php if('diambil' == $out[$i]['status']){ echo 'selected';}?>>Diambil</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" name="ubahstatus" class="btn btn-sm btn-primary">Perbarui</button>
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

  <script>
    jQuery('body').on('change', '#pay', function() {
        check_pay()
    });
    check_pay();
        function check_pay() {
        var pay = jQuery('#pay').val();
        if (pay == 'dibayar') {
            jQuery('.container-pay-date').removeClass('hide')
        } else  {
            jQuery('.container-pay-date').addClass('hide')
        }
    }
  </script>