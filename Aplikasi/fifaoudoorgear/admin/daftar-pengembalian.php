<?php include 'assets/php/koneksi.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pengembalian</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- DataTables -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable examples -->
  <link href="assets/vendor/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'assets/layout/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include 'assets/layout/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pengembalian</h1>
          </div>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="datatable-buttons" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nomor Penyewaan</th>
                          <th>Nama Pelanggan</th>
                          <th>No Telp</th>
                          <th>Lama Sewa</th>
                          <th>Tanggal Sewa</th>
                          <th>Tanggal Kembali</th>
                          <th>Status</th>
                          <th width="98">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql=mysql_query("SELECT * FROM tb_transaksi ") or die(mysql_error());
                        $i=1;
                        while ($res=mysql_fetch_array($sql)) {
                        $status=rand(0,1);
                          if ($status=='1') {
                            $st='<span class="badge badge-success">Aman</span>';
                          }else{
                            $st='<span class="badge badge-danger">Rusak</span>';
                          }
                        ?>
                        <tr>
                          <td><?=$i;?></td>
                          <td><?=$res['no_transaksi'];?></td>
                          <td><?=$res['nama_pemesan'];?></td>
                          <td><?=$res['no_telp'];?></td>
                          <td><?=$res['lama_sewa'];?></td>
                          <td><?=$res['tgl_pesan'];?></td>
                          <td><?=$res['tgl_kembali'];?></td>
                          <td><?=rupiah($res['total_bayar']);?></td>
                          <td><a href="notaPengembalian?menu=pengembalian&id=<?=$res['no_transaksi'];?>"> <button type="button" class="btn btn-sm btn-primary">Proses</button></a></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Proses Pengembalian</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <form>
                <div class="row mb-2">
                  <div class="col-lg-5">
                    <table width="100%">
                      <tr>
                        <td>Nomor Penyewaan</td>
                        <td style="text-align: center;">:</td>
                        <td>NomorPenyewaan</td>
                      </tr>
                      <tr>
                        <td>Tanggal Sewa</td>
                        <td width="15" style="text-align: center;">:</td>
                        <td>17 Mei 2019</td>
                      </tr>
                      <tr>
                        <td>Tanggal Kembali</td>
                        <td width="15" style="text-align: center;">:</td>
                        <td>20 Mei 2019</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-7">
                    <table width="100%">
                      <tr>
                        <td>Nama Penyewa</td>
                        <td style="text-align: center;">:</td>
                        <td>Udin Siudin</td>
                      </tr>
                      <tr>
                        <td>No Teelpon</td>
                        <td width="15" style="text-align: center;">:</td>
                        <td>087548154365</td>
                      </tr>
                      <tr>
                        <td>Jaminan</td>
                        <td width="15" style="text-align: center;">:</td>
                        <td>Kartu Pelajar - 14546987845124</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <h4 class="h5 mb-1 text-center">Barang di pinjam 3 Barang</h4>
                <table class="table table-bordered table-hover">
                  <tr>
                    <td>No</td>
                    <td>Id Barang</td>
                    <td>Nama Barang</td>
                  </tr>
                </table>
                <center>
                  <button class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
            </div>
            
          </div>
        </div>
      </div>

      </div>  
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include'assets/layout/footer.php';?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
  <!-- Page level vendor -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="assets/vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/datatables/buttons.bootstrap4.min.js"></script>
  <script src="assets/vendor/datatables/jszip.min.js"></script>
  <script src="assets/vendor/datatables/pdfmake.min.js"></script>
  <script src="assets/vendor/datatables/vfs_fonts.js"></script>
  <script src="assets/vendor/datatables/buttons.html5.min.js"></script>
  <script src="assets/vendor/datatables/buttons.print.min.js"></script>
  <script src="assets/vendor/datatables/buttons.colVis.min.js"></script>
  <!-- Responsive examples -->
  <script src="assets/vendor/datatables/dataTables.responsive.min.js"></script>
  <script src="assets/vendor/datatables/responsive.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>

  <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: true,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>
</body>

</html>
