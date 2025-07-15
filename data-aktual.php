
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
        require ('sidebar.php');
    ?>


      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<h4> Harga Pokok Produk Aktual</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container">
          <!-- Content Row -->
          <br>
            <div class="row">
            <div class="col-xl-12">
                <form class="col-12" style="font-size: .9rem;" action="maintance-data-mesin.php" method="get">
            <div class="row col-md-12">
            <label class="form-label col-2">Kode Pesan :</label>
            <label class="form-label col-2">Kode PHP</label>
            <br>
            <label class="form-label col-2 offset-3">Tanggal Pesan :</label>
            <input type="date" class="form-select col-3">
            </div>
            <br>
            <div class="row col-md-12">
            <label class="form-label col-2">Jatuh Tempo :</label>
            <input type="date" class="form-select col-2">
            <br>
            <label class="form-label col-2 offset-3">Tanggal Pesan :</label>
            <input type="date" class="form-select col-3">
            </div>
            <br>
            <div class="row col-md-12">
            <label class="form-label col-2">Kontak :</label>
            <input type="text" class="form-select col-3">
            </div>
            <br>
             <div class="button offset-7">
                 <a href="data-aktual.php"><input class="btn btn-success" type="button" value="Tambah Data"></a>
            <input class="btn btn-primary" type="button" value="Update Data">
            <input class="btn btn-danger" type="submit" value="Bersihkan">
            </div>
            <a href="maintance-data-pesanan.php"><button type="button" class="btn btn-danger" style="margin:5px"><i class="fa fa-step-backward"> Kembali</i></button><br></a>
            <br>
          <div class="card shadow mb-4">              
            <div class="card-header py-3">
              <!--tabs tabel-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" style="font-size: .8rem;" id="home-tab" data-toggle="tab" href="#bb" role="tab" aria-controls="bb" aria-selected="true">Biaya Bahan Baku Aktual</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="profile-tab" data-toggle="tab" href="#bk" role="tab" aria-controls="bk" aria-selected="false">Biaya Tenaga kerja Langsung Aktual</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#bopv" role="tab" aria-controls="bopv" aria-selected="false">BOP Variabel Aktual</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#bopt" role="tab" aria-controls="bopt" aria-selected="false">BOP Tetap Aktual</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#bopt" role="tab" aria-controls="bopt" aria-selected="false">Biaya Custom Aktual</a>
                    </li>
                </ul>
              <!--akhir tabs tabel-->
            </div>
            <div class="card-body tab-content" id="myTabContent">
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No transaksi</th>
                            <th>kode</th>
                            <th>Jumlah</th>
                            <th>tanggal</th>
                            <th>tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
              <!--kedua-->
              <div class="table-responsive tab-pane fade" id="bk">
               <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No transaksi</th>
                            <th>kode</th>
                            <th>Jumlah</th>
                            <th>tanggal</th>
                            <th>tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
              <!--ketiga-->
              <div class="table-responsive tab-pane fade" id="bopv">
               <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No transaksi</th>
                            <th>kode</th>
                            <th>Jumlah</th>
                            <th>tanggal</th>
                            <th>tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <tr>
                            <td>Tiger</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
              <!--keempat-->
              <div class="table-responsive tab-pane fade" id="bopt">
               <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No transaksi</th>
                            <th>kode</th>
                            <th>Jumlah</th>
                            <th>tanggal</th>
                            <th>tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <tr>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
             <!--akhir tabel-->
            </div>
          </div>
           
        </form>
            </div>
            </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
