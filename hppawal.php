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
<h4> Data Pekerja</h4>
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
                            <th>Produk</th>
                            <th>Laba(%)</th>
                            <th>Harga Jual</th>
                            <th>Tanggal Pesanan</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Action</th>
                    </thead>
                  
                    <tbody>
                       <?php 
                       //echo $koneksi;
                          $sql = 'SELECT pesanan.*,b.nama_produk,COALESCE(sum(hs.total),0)+((COALESCE(sum(hs.total),0)*pesanan.laba)/100) as harga_jual,pelanggan.nama_pelanggan as pelanggan FROM pesanan 
                            join pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan
                            join produk b on b.id_produk=pesanan.id_kategoriproduk
                            left join hpp_standart hs on hs.id_pesanan = pesanan.id group by pesanan.id;';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama'];?></td>
                                      <td><?php echo $row['pelanggan'];?></td>
                                      <td><?php echo $row['nama_produk'];?></td>
                                      <td><?php echo $row['laba'];?></td>
                                      <td><?php echo number_format($row['harga_jual']);?></td>
                                      <td><?php echo $row['tgl_pesanan'];?></td>
                                      <td><?php echo $row['tgl_jatuhtempo'];?></td>	
                                      <td>
                                          <a class="btn btn-warning" href="hpp_standart.php?id=<?php echo $row['id'];?>&id_pro=<?php echo $row['id_kategoriproduk'];?>">HPP Standart</a>
                                          <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $row['id'];?>">Laba Jual</a>
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

      <?php 
                       //echo $koneksi;
        $sql = 'SELECT pesanan.*,pelanggan.nama_pelanggan as pelanggan FROM pesanan join pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan';
        $query = mysqli_query($koneksi, $sql);
           while ($row = mysqli_fetch_array($query))
              {
               ?>
                
              <div class="modal fade" id="exampleModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Laba Jual</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="col-12" role="form" action="updatelaba.php" method="post" enctype="multipart/form-data">
                        <label class="form-label">Laba Jual (%) :</label>
                        <input type="hidden" id="id_pesanan" name="id_pesanan" value="<?php echo $row['id']?>" class="form-select col-5">
                        <input type="number" value="<?php echo $row['laba']?>" id="laba" name="laba" class="form-select col-3">
                        <br>
                     
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
      <!-- Modal -->
        <!--akhir modal-->
        <?php } ?>
                       

<?php include '_partial/footer.php'?>

  