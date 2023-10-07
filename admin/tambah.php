<?php
require '../function/config.php';
require '../function/crud.php';
require '../function/flashMessage.php';

$crud = new Crud();


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
            <h1>General Form</h1>

          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card">

              <!-- form start -->
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kode Invoice</label>
                                <input type="text" name="kd_invoice" id="kd_invoice" class="form-control" value="KP-<?= date('dmYHis');?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="datetime-local" name="tgl" id="tgl" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Batas Waktu</label>
                                <input type="datetime-local" name="batas_waktu" id="batas_waktu" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Bayar</label>
                                <input type="datetime-local" name="tgl_bayar" id="tgl_bayar" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Member</label>
                                    <select name="member" id="member" class="form-control member">
                                    <?php
                                        $member = $crud->tampilMember();
                                        foreach ($member as $row) : ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="baru">Baru</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="diambil">Diambil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Di Bayar</label>
                                <select name="dibayar" id="dibayar" class="form-control">
                                    <option value="dibayar">Dibayar</option>
                                    <option value="belum_dibayar">Belum DiBayar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="paket" id="paket" class="form-control paket">
                                <?php
                                        $paket = $crud->tampilPaket();
                                        foreach($paket as $row) : ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['nama_paket']; ?></option>
                                <?php endforeach;    ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control qty" name="qty" placeholder="Qty" autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block btn-tambah-det"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Paket</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Total Harga</th>
                                        <th>Keterangan</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody class="det-transaksi">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>Biaya Tambahan</th>
                                    <td><input autocomplete="off" type="text" class="form-control biaya_tambahan" name="biaya_tambahan" placeholder="Biaya Tambahan"></td>
                                </tr>
                                <tr>
                                    <th>Pajak</th>
                                    <td><input autocomplete="off" type="text" class="form-control pajak" name="pajak" placeholder="Pajak"></td>
                                </tr>
                                <tr>
                                    <th>Diskon(%)</th>
                                    <td><input autocomplete="off" type="text" class="form-control diskon" name="diskon" placeholder="Diskon"></td>
                                </tr>
                                <tr>
                                    <th>Total Bayar</th>
                                    <td><input autocomplete="off" type="text" class="form-control total_bayar" name="total_bayar" readonly=""></td>
                                </tr>
                                <tr>
                                    <th>Cash</th>
                                    <td><input autocomplete="off" type="text" class="form-control cash" name="cash" placeholder="Cash"></td>
                                </tr>
                                <tr>
                                    <th>Kembalian</th>
                                    <td><input autocomplete="off" type="text" class="form-control kembalian" name="kembalian" readonly=""></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-block btn-primary">Submit</button>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.footer -->
  <?php include ('../layouts/footer.php'); ?>

  <script>
 
$(function () {

    function getSubtotal() {
        let total_bayar = 0;
        $(document).find('.total_harga').each(function (index, element) {
            total_bayar += Number($(element).val());
        });

        return total_bayar;

    };

    $('.btn-tambah-det').click(function (e) {
        e.preventDefault();
        paket = $('.paket').val();
        qty = $('.qty').val();

        $.get('../function/crud.php/get_paket/' + paket, function (response) {
            const data = JSON.parse(JSON.stringify(response));

            const find = $(document).find('tr[id="' + data.id + '"]');



            if (find.length == 0) {

                $('.det-transaksi').append(`
                <tr id="${data.id}">
                <input type="hidden" name="id_paket[]" value="${data.id}">
                <td>${paket}</td>
                <td>${data.harga}</td>
                <td><input readonly=""  class="form-control" name="qty[]" value="${qty}"</td>
                <td><input readonly="" class="form-control total_harga" name="total_harga[]" value="${Number(qty) * Number(data.harga)}"</td>
                <td><textarea class="form-control" placeholder="Keterangan" name="keterangan[]"></textarea></td>
                <td><a class="btn btn-hapus btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
                `);
            }
            $('.total_bayar').val(getSubtotal());
        });

    });
});

 $(document).on('click', '.btn-hapus', function () {
        $(this).closest('tr').remove();

    });
  </script>