    <?php
        include '_partial/head.php';
        include '_partial/sidebar.php';
        include 'koneksi1.php';
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
<h4> Data HPP Actual</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
             
          </div>
          <br><br>
            <div class="row">
            <div class="col-xl-12">
                <!-- <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Produk</i></button><br> -->
                <div class="card shadow mb-4">
                <div class="card-body tab-content" id="myTabContent">
                <div class="text-x font-weight-bold text-success text-uppercase mb-1">Daftar Pesanan</div>
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pesanan</th>
                            <th>Pelanggan</th>
                            <!-- <th>Laba(%)</th>
                            <th>Harga Jual</th> -->
                            <th>Tanggal Pesanan</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Action</th>
                    </thead>
                  
                    <tbody>
                       <?php 
                       //echo $koneksi;
                          $sql = 'SELECT pesanan.*,COALESCE(sum(hs.total),0)+((COALESCE(sum(hs.total),0)*pesanan.laba)/100) as harga_jual,pelanggan.nama_pelanggan as pelanggan 
                            FROM pesanan 
                            join pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan
                            left join hpp_actual hs on hs.id_pesanan = pesanan.id group by pesanan.id';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama'];?></td>
                                      <td><?php echo $row['pelanggan'];?></td>
                                      <!-- <td><?php // echo $row['laba'];?></td>
                                      <td><?php // echo number_format($row['harga_jual']);?></td> -->
                                      <td><?php echo $row['tgl_pesanan'];?></td>
                                      <td><?php echo $row['tgl_jatuhtempo'];?></td>
                                      <td>
                                          <a class="btn btn-warning" href="hpp_actual.php?id=<?php echo $row['id'];?>">HPP Actual</a>
                                      </td>                         
                                  </tr>
                                
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php } ?>
                       
                                       
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
            </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

                       

<?php include '_partial/footer.php'?>

  