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
<h4> Laporan Evaluasi</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
             <!--  <form class="col-12" role="form" action="inserthppstandart.php" method="post" enctype="multipart/form-data">
                  <label class="form-label col-2 offset-3">Kategori:</label>
                    <select id="kategori" name="kategori" class="form-select col-5" onchange="cekdata(this.value)">
                       <option value="0" >Pilih kategori</option> 
                       <option value="1" >Bahan Baku</option>
                       <option value="2" >Pekerja</option>
                       <option value="3" >Overhead Variable</option>
                       <option value="4" >Biaya Overhead Variable</option>
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
              </form> -->
          </div>
          <br><br>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!--tabs tabel-->
                <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                </ul> -->
              <!--akhir tabs tabel-->
            </div>
             <div class="card-body tab-content" id="myTabContent">
                 
                 <a href="design-evaluasi.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success" >print</a>
        
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>HPP Standart</th>
                            <th>HPP Actual</th>
                            <!-- <th>Action</th> -->
                    </thead>
                  
                    <tbody>
                       <?php 
                       $standart=0;
                       $actual=0;
                          $sql = 'select nama_bb_standar,standart,actual from ( SELECT p.nama_bb_standar,p.satuan_bb_standar,p.harga_bb_standar,"Bahan Baku" as kategori,hs.qty,hs.total as standart,ha.total as actual,hs.kategori as urut FROM hpp_standart hs 
                                join biaya_bahan_baku_standar p on p.id_bb_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                join hpp_actual ha on p.id_bb_standar = ha.id_rincian and hs.id_pesanan = ha.id_pesanan 
                                where ha.kategori = 1 and hs.kategori = 1 and ps.id = '.$_GET['id'].'

                                union

                                SELECT p.nama_btkl_standar,p.type_btkl_standar,p.upah_btkl_standar,"Pekerja" as kategori,hs.qty,hs.total as standart,ha.total as actual,hs.kategori as urut FROM hpp_standart hs 
                                join biaya_tenaga_kerja_langsung_standar p on p.id_btkl_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                join hpp_actual ha on p.id_btkl_standar = ha.id_rincian and hs.id_pesanan = ha.id_pesanan 
                                where ha.kategori = 2 and hs.kategori = 2 and ps.id = '.$_GET['id'].'

                                union
                                SELECT p.nama_tetap_standar,"",p.harga_tetap_standar,"Overhead Variable" as kategori,hs.qty,hs.total as standart,ha.total as actual,hs.kategori as urut FROM hpp_standart hs 
                                join bop_tetap_standar p on p.id_tetap_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                join hpp_actual ha on p.id_tetap_standar = ha.id_rincian and hs.id_pesanan = ha.id_pesanan 
                                where ha.kategori = 3 and hs.kategori = 3 and ps.id = '.$_GET['id'].'

                                union
                                
                                SELECT p.nama_variabel_standar,p.satuan_variabel_standar,p.harga_variabel_standar,"Biaya Overhead Variable" as kategori,hs.qty,hs.total as standart,ha.total as actual,hs.kategori as urut FROM hpp_standart hs 
                                join bop_variabel_standar p on p.id_variabel_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                join hpp_actual ha on p.id_variabel_standar = ha.id_rincian and hs.id_pesanan = ha.id_pesanan 
                                where ha.kategori = 4 and hs.kategori = 4 and ps.id ='.$_GET['id'].'

                                union
                                
                                SELECT p.nama_custom_standar,p.satuan_custom_standar,p.harga_custom_standar,"Custom" as kategori,hs.qty,hs.total as standart,ha.total as actual,hs.kategori as urut FROM hpp_standart hs 
                                join custom_standar p on p.id_custom_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                join hpp_actual ha on p.id_custom_standar = ha.id_rincian and hs.id_pesanan = ha.id_pesanan 
                                where ha.kategori = 5 and hs.kategori = 5 and ps.id = '.$_GET['id'].'
                              ) hasil order by urut asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_bb_standar'];?></td>
                                      <td align="right"><?php echo number_format($row['standart']);?></td>
                                      <td align="right"><?php echo number_format($row['actual']);?></td>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
                                  </tr>
                                
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php } ?>
                            <tr>
                                <?php $sql = 'select sum(total) as standar FROM hpp_standart WHERE id_pesanan ='.$_GET['id'].';';
                                $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                  $standart = $standart+$row['standar'];
                                }
                                
                                $sql = 'select sum(total) as actual FROM hpp_actual WHERE id_pesanan ='.$_GET['id'].';';
                                $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                  $actual = $actual+$row['actual'];
                                }
                                ?>
                                      <td>Total</td>
                                      <td align="right"><?php echo number_format($standart);?></td>
                                      <td align="right"><?php echo number_format($actual);?></td>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
                                  </tr>
                             <tr>
                                      <td>Hasil Evaluasi</td>
                                      <td colspan="2" align="center"><?php echo number_format($standart-$actual);?></td>
                                      <!-- <td>
                                          <a class="btn btn-warning" href="#">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="#">Hapus
                                      </td>    -->                      
                                  </tr>
                                       
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

  