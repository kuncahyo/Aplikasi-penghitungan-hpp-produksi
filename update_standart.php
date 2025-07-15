    <?php
        include '_partial/head.php';
        include '_partial/sidebar.php';
        include 'koneksi1.php';
        
        
//  mulai update
    ?>
  </script>

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<h4> Edit HPP Standart</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
               
               <?php 
                   if ($_GET['kat']==1){
                       
//                       akhir bahan baku
               ?>
              <form class="col-12" role="form" action="proses-update-standar.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="pesan" name="pesan" class="form-select col-3" value="<?php echo $_GET['id']?>">
                  <input type="hidden" id="rincian" name="rincian" class="form-select col-3" value="<?php echo $_GET['idbk']?>">
                  <input type="hidden" id="kategori" name="kategori" class="form-select col-3" value="<?php echo $_GET['kat']?>">
                  <input type="hidden" id="qtyawal" name="qtyawal" class="form-select col-3" value="<?php echo $_GET['qty']?>">
                    <br>
                    <label class="form-label col-2 offset-3">Bahan Baku:</label><br>
                  <label class="form-label col-2 offset-3">Nama:</label>
                    <select id="nama" name="nama" class="form-select col-5">
                        
                        <?php $sql = 'select * from biaya_bahan_baku_standar where id_bb_standar='.$_GET['idbk'].'';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<b><option value="'.$row['id_bb_standar'].'">'.$row['nama_bb_standar'].'&nbsp;---update data '.'</option></b>';
                                }?>
                        <?php $sql = 'select * from biaya_bahan_baku_standar';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<option value="'.$row['id_bb_standar'].'">'.$row['nama_bb_standar'].'</option>';
                                }?>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">QTY / Hari:</label>
                    <input type="number" id="qty" name="qty" value="<?php echo $_GET['qty'];?>" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" name='update_standar' type="submit">Simpan Data</button>
                    <br>
                  </div>
              </form>
               <?php
                   }
                   elseif ($_GET['kat']==2) {
               ?>
               <form class="col-12" role="form" action="proses-update-standar.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="pesan" name="pesan" class="form-select col-3" value="<?php echo $_GET['id']?>">
                  <input type="hidden" id="rincian" name="rincian" class="form-select col-3" value="<?php echo $_GET['idbk']?>">
                  <input type="hidden" id="kategori" name="kategori" class="form-select col-3" value="<?php echo $_GET['kat']?>">
                  <input type="hidden" id="qtyawal" name="qtyawal" class="form-select col-3" value="<?php echo $_GET['qty']?>">  
                  <br>
                    <label class="form-label col-2 offset-3">Tenaga Kerja:</label><br>
                  <label class="form-label col-2 offset-3">Nama:</label>
                    <select id="kategori" name="nama" class="form-select col-5">
                        
                        <?php $sql = 'select * from biaya_tenaga_kerja_langsung_standar where id_btkl_standar ='.$_GET['idbk'].'';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<b><option value="'.$row['id_btkl_standar'].'">'.$row['nama_btkl_standar'].'---'.$row['type_btkl_standar'].'&nbsp;---update data '.'</option></b>';
                                }?>
                        <?php $sql = 'select * from biaya_tenaga_kerja_langsung_standar';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<option value="'.$row['id_btkl_standar'].'">'.$row['nama_btkl_standar'].'-'.$row['type_btkl_standar'].'</option>';
                                }?>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">QTY / Hari:</label>
                    <input type="number" id="qty" name="qty" value="<?php echo $_GET['qty'];?>" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" name='update_standar' type="submit">Simpan Data</button>
                    <br>
                  </div>
              </form>
               
               <!--akhir pekerja-->
               <?php
                   }elseif ($_GET['kat']==3) {
                       ?>
               <form class="col-12" role="form" action="proses-update-standar.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="pesan" name="pesan" class="form-select col-3" value="<?php echo $_GET['id']?>">
                  <input type="hidden" id="rincian" name="rincian" class="form-select col-3" value="<?php echo $_GET['idbk']?>">
                  <input type="hidden" id="kategori" name="kategori" class="form-select col-3" value="<?php echo $_GET['kat']?>">
                  <input type="hidden" id="qtyawal" name="qtyawal" class="form-select col-3" value="<?php echo $_GET['qty']?>"> 
                  <br>
                    <label class="form-label col-2 offset-3">BOP Tetap:</label><br>
                  <label class="form-label col-2 offset-3">Nama:</label>
                    <select id="kategori" name="nama" class="form-select col-5">
                        
                        <?php $sql = 'select * from bop_tetap_standar where id_tetap_standar ='.$_GET['idbk'].'';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<b><option value="'.$row['id_tetap_standar'].'">'.$row['nama_tetap_standar'].'---'.$row['satuan_tetap_standar'].'&nbsp;---update data '.'</option></b>';
                                }?>
                        <?php $sql = 'select * from bop_tetap_standar';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<option value="'.$row['id_tetap_standar'].'">'.$row['nama_tetap_standar'].'--'.$row['satuan_tetap_standar'].'</option>';
                                }?>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">QTY / Hari:</label>
                    <input type="number" id="qty" name="qty" value="<?php echo $_GET['qty'];?>" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" name='update_standar' type="submit">Simpan Data</button>
                    <br>
                  </div>
              </form>
               <!--akhir bop tetap-->
               <?php    
               }elseif ($_GET['kat']==4) {
                   ?>
               <form class="col-12" role="form" action="proses-update-standar.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="pesan" name="pesan" class="form-select col-3" value="<?php echo $_GET['id']?>">
                  <input type="hidden" id="rincian" name="rincian" class="form-select col-3" value="<?php echo $_GET['idbk']?>">
                  <input type="hidden" id="kategori" name="kategori" class="form-select col-3" value="<?php echo $_GET['kat']?>">
                  <input type="hidden" id="qtyawal" name="qtyawal" class="form-select col-3" value="<?php echo $_GET['qty']?>">  
                  <br>
                    <label class="form-label col-2 offset-3">BOP Variabel:</label><br>
                  <label class="form-label col-2 offset-3">Nama:</label>
                    <select id="kategori" name="nama" class="form-select col-5">
                        
                        <?php $sql = 'select * from bop_variabel_standar where id_variabel_standar ='.$_GET['idbk'].'';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<b><option value="'.$row['id_variabel_standar'].'">'.$row['nama_variabel_standar'].'---'.$row['satuan_variabel_standar'].'&nbsp;---update data '.'</option></b>';
                                }?>
                        <?php $sql = 'select * from bop_variabel_standar';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<option value="'.$row['id_variabel_standar'].'">'.$row['nama_variabel_standar'].'--'.$row['satuan_variabel_standar'].'</option>';
                                }?>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">QTY / Hari:</label>
                    <input type="number" id="qty" name="qty" value="<?php echo $_GET['qty'];?>" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" name='update_standar' type="submit">Simpan Data</button>
                    <br>
                  </div>
              </form>
               <!--akhir bop variabel-->
               <?php
               }elseif ($_GET['kat']==5) {
               ?>    
               <form class="col-12" role="form" action="proses-update-standar.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="pesan" name="pesan" class="form-select col-3" value="<?php echo $_GET['id']?>">
                  <input type="hidden" id="rincian" name="rincian" class="form-select col-3" value="<?php echo $_GET['idbk']?>">
                  <input type="hidden" id="kategori" name="kategori" class="form-select col-3" value="<?php echo $_GET['kat']?>">
                  <input type="hidden" id="qtyawal" name="qtyawal" class="form-select col-3" value="<?php echo $_GET['qty']?>"> 
                  <br>
                    <label class="form-label col-2 offset-3">Custom:</label><br>
                  <label class="form-label col-2 offset-3">Nama:</label>
                    <select id="kategori" name="nama" class="form-select col-5">
                        
                        <?php $sql = 'select * from custom_standar where id_custom_standar ='.$_GET['idbk'].'';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<b><option value="'.$row['id_custom_standar'].'">'.$row['nama_custom_standar'].'---'.$row['satuan_custom_standar'].'&nbsp;---update data '.'</option></b>';
                                }?>
                        <?php $sql = 'select * from custom_standar';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                       echo '<option value="'.$row['id_custom_standar'].'">'.$row['nama_custom_standar'].'--'.$row['satuan_custom_standar'].'</option>';
                                }?>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">QTY / Hari:</label>
                    <input type="number" id="qty" name="qty" value="<?php echo $_GET['qty'];?>" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" name='update_standar' type="submit">Simpan Data</button>
                    <br>
                  </div>
              </form>
               
               <?php
               }
               ?>
               
               
          </div>

      </div>
      <!-- End of Main Content -->


<?php include '_partial/footer.php'?>

  