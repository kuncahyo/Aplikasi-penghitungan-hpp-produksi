    <?php
        include '_partial/head.php';
        include '_partial/sidebar.php';
        include 'koneksi1.php';
    ?>
  <script>
      function cekdata($id){
          //alert($id);
           const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("items").innerHTML =
            this.responseText;
          }
          xhttp.open("GET", "get_data_kategori.php?id_kategori="+$id);
          xhttp.send();
      }
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
<h4> Daftar HPP Actual</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
              <p class="col-12  offset-4">Tambahkan jika ada yang tidak ada di HPP Standart</p>
              <form class="col-12" role="form" action="inserthppactual.php" method="post" enctype="multipart/form-data">
                  <label class="form-label col-2 offset-3">Kategori:</label>
                    <select id="kategori" name="kategori" class="form-select col-5" onchange="cekdata(this.value)">
                       <option value="0" >Pilih kategori</option> 
                       <option value="1" >Bahan Baku</option>
                       <option value="2" >Pekerja</option>
                       <option value="3" >Overhead Variable</option>
                       <option value="4" >Biaya Overhead Variable</option>
                       <option value="5" >Custom</option>
                    </select>
                    <label class="form-label col-2 offset-3">Input Item :</label>
                    <input type="hidden" id="id_pesanan" name="id_pesanan" value="<?php echo $_GET['id']?>" class="form-select col-5">
                    <select id="items" name="items" class="form-select col-5">
                      <option></option>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">QTY / Hari:</label>
                    <input type="number" id="qty" name="qty" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" type="submit">Tambah Data</button>
                    <br>
                  </div>
              </form>
          </div>
          <br><br>
          <div class="samping" ">
    <form action="design_pembelian.php" method="post">
        <input type="hidden" id="id_p" name="id_p" class="form-select" min=0  value="<?php echo $_GET['id'];?>">
        <button class="btn btn-warning" type="submit" name="simpanact">Pembelian</button>
    </form>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!--tabs tabel-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" style="font-size: .8rem;" id="home-tab" data-toggle="tab" href="#bb" role="tab" aria-controls="bb" aria-selected="true">Biaya Bahan Baku Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="profile-tab" data-toggle="tab" href="#bk" role="tab" aria-controls="bk" aria-selected="false">Biaya Tenaga kerja Langsung Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#bopv" role="tab" aria-controls="bopv" aria-selected="false">BOP Variabel Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#bopt" role="tab" aria-controls="bopt" aria-selected="false">BOP Tetap Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#custom" role="tab" aria-controls="custom" aria-selected="false">Biaya Custom</a>
                    </li>
                </ul>
              <!--akhir tabs tabel-->
            </div>
             <div class="card-body tab-content" id="myTabContent">
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                            <th>Action</th>
                            <!-- <th>Action</th> -->
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'select * from ( SELECT hs.id,p.nama_bb_standar,p.satuan_bb_standar,p.harga_bb_standar,"Bahan Baku" as kategori,
                                hs.qty,hs.total FROM hpp_actual hs 
                                join biaya_bahan_baku_standar p on p.id_bb_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 1 and ps.id =   '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                    <form class="col-12" role="form" action="updatehppactual.php" method="post" enctype="multipart/form-data">
                                      <td><?php echo $row['nama_bb_standar'];?></td>
                                      <td><?php echo $row['satuan_bb_standar'];?></td>
                                      <td>
                                        <input type="hidden" id="id_hpp" name="id_hpp" class="form-select" min=0  value="<?php echo $row['id'];?>">
                                        <input type="number" id="harga" name="harga" class="form-select" min=0  value="<?php echo $row['harga_bb_standar'];?>"></td>
                                      <td><input type="number" id="qty" name="qty" class="form-select" value="<?php echo $row['qty'];?>"></td>
                                       <input type="hidden" id="id_p" name="id_p" class="form-select" min=0  value="<?php echo $_GET['id'];?>">
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td><button class="btn btn-success" name="simpanact" type="submit">Update Data</button></td>
                                    </form>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
                                  </tr>
                                
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php } ?>
                       
                                       
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
              <div class="table-responsive tab-pane fade" id="bk">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                            <th>Action</th>
                            <!-- <th>Action</th> -->
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'select * from ( 
                                SELECT hs.id,p.nama_btkl_standar,p.type_btkl_standar,hs.harga,"Pekerja" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join biaya_tenaga_kerja_langsung_standar p on p.id_btkl_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 2 and ps.id =   '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                     <form class="col-12" role="form" action="updatehppactual.php" method="post" enctype="multipart/form-data">
                                      <td><?php echo $row['nama_btkl_standar'];?></td>
                                      <td><?php echo $row['type_btkl_standar'];?></td>
                                      <td>
                                        <input type="hidden" id="id_hpp" name="id_hpp" class="form-select" min=0  value="<?php echo $row['id'];?>">
                                        <input type="number" id="harga" name="harga" class="form-select" min=0  value="<?php echo $row['harga'];?>"></td>
                                      <td><input type="number" id="qty" name="qty" class="form-select" value="<?php echo $row['qty'];?>"></td>
                                        <input type="hidden" id="id_p" name="id_p" class="form-select" min=0  value="<?php echo $_GET['id'];?>">
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td><button class="btn btn-success" name="simpanact" type="submit">Update Data</button></td>
                                    </form>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
                                  </tr>
                                
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php } ?>
                       
                                       
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
              <div class="table-responsive tab-pane fade" id="bopv">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                            <th>Action</th>
                            <!-- <th>Action</th> -->
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'select * from ( 

                                SELECT hs.id,p.nama_tetap_standar,hs.harga,"Overhead Tetap" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join bop_tetap_standar p on p.id_tetap_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 3 and ps.id =  '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                       <form class="col-12" role="form" action="updatehppactual.php" method="post" enctype="multipart/form-data">
                                      <td><?php echo $row['nama_tetap_standar'];?></td>
                                      <td></td>
                                      <td>
                                        <input type="hidden" id="id_hpp" name="id_hpp" class="form-select" min=0  value="<?php echo $row['id'];?>">
                                        <input type="number" id="harga" name="harga" class="form-select" min=0  value="<?php echo $row['harga'];?>"></td>
                                      <td><input type="number" id="qty" name="qty" class="form-select" value="<?php echo $row['qty'];?>"></td>
                                       <input type="hidden" id="id_p" name="id_p" class="form-select" min=0  value="<?php echo $_GET['id'];?>">
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td><button class="btn btn-success" name="simpanact" type="submit">Update Data</button></td>
                                    </form>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
                                  </tr>
                                
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php } ?>
                       
                                       
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
              <div class="table-responsive tab-pane fade" id="bopt">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                            <th>Action</th>
                            <!-- <th>Action</th> -->
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'select * from ( 
                                SELECT hs.id,p.nama_variabel_standar,p.satuan_variabel_standar,hs.harga,"Biaya Overhead Variable" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join bop_variabel_standar p on p.id_variabel_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 4 and ps.id = '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                       <form class="col-12" role="form" action="updatehppactual.php" method="post" enctype="multipart/form-data">
                                      <td><?php echo $row['nama_variabel_standar'];?></td>
                                      <td><?php echo $row['satuan_variabel_standar'];?></td>
                                      <td>
                                        <input type="hidden" id="id_hpp" name="id_hpp" class="form-select" min=0  value="<?php echo $row['id'];?>">
                                        <input type="number" id="harga" name="harga" class="form-select" min=0  value="<?php echo $row['harga'];?>"></td>
                                      <td><input type="number" id="qty" name="qty" class="form-select" value="<?php echo $row['qty'];?>"></td>
                                      <input type="hidden" id="id_p" name="id_p" class="form-select" min=0  value="<?php echo $_GET['id'];?>">
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td><button class="btn btn-success" name="simpanact" type="submit">Update Data</button></td>
                                    </form>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
                                  </tr>
                                
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php } ?>
                       
                                       
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
              <div class="table-responsive tab-pane fade" id="custom">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                            <th>Action</th>
                            <!-- <th>Action</th> -->
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'select * from ( 
                                SELECT hs.id,p.nama_custom_standar,p.satuan_custom_standar,hs.harga,"custom" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join custom_standar p on p.id_custom_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 5 and ps.id = '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                       <form class="col-12" role="form" action="updatehppactual.php" method="post" enctype="multipart/form-data">
                                      <td><?php echo $row['nama_custom_standar'];?></td>
                                      <td><?php echo $row['satuan_custom_standar'];?></td>
                                      <td>
                                        <input type="hidden" id="id_hpp" name="id_hpp" class="form-select" min=0  value="<?php echo $row['id'];?>">
                                        <input type="number" id="harga" name="harga" class="form-select" min=0  value="<?php echo $row['harga'];?>"></td>
                                      <td><input type="number" id="qty" name="qty" class="form-select" value="<?php echo $row['qty'];?>"></td>
                                      <input type="hidden" id="id_p" name="id_p" class="form-select" min=0  value="<?php echo $_GET['id'];?>">
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td><button class="btn btn-success" name="simpanact" type="submit">Update Data</button></td>
                                    </form>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include '_partial/footer.php'?>

  