
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-primary card-outline">
                <a href="../transaksi/tambah.php" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Outlet</th>
                    <th>Member</th>
                    <th>Invoice</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td>5K</td>
                    <td> 4</td>
                    <td>8</td>
                    <td>6</td>
                    <td>
                      <p class="btn btn-sm btn-default">Baru</p>
                      <p class="btn btn-sm btn-warning">Proses</p>
                      <p class="btn btn-sm btn-primary">Selesai</p>
                      <p class="btn btn-sm btn-success">Diambil</p>
                      <p class="btn btn-sm btn-info">Dibayar</p>
                      <p class="btn btn-sm btn-danger">Belum Dibayar</p>
                    </td>
                    <td>7</td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-ubah" ><i class="fa fa-edit"></i> Ubah</button>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')" href=""><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
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