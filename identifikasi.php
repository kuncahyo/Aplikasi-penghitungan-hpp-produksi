    <?php
        include '_partial/head.php';
        include '_partial/sidebar.php';
        include 'koneksi1.php';
    ?>
  <script>
      function cekdata($id){
         // alert($id);
          //  const xhttp = new XMLHttpRequest();
          // xhttp.onload = function() {
          //   document.getElementById("items").innerHTML =
          //   this.responseText;
          // }
          // xhttp.open("GET", "get_data_kategori.php?id_kategori="+$id);
          // xhttp.send();

          if($id == "1"){
            document.getElementById("show_asuransi_kerusakan").style.display = "inline";
            document.getElementById("show_biaya_depresi").style.display = "none";
            document.getElementById("show_biaya_listrik").style.display = "none";
            document.getElementById("show_piso_potong").style.display = "none";
            document.getElementById("show_packing").style.display = "none";
          }else if($id == "2"){
            document.getElementById("show_asuransi_kerusakan").style.display = "none";
            document.getElementById("show_biaya_depresi").style.display = "inline";
            document.getElementById("show_biaya_listrik").style.display = "none";
            document.getElementById("show_piso_potong").style.display = "none";
            document.getElementById("show_packing").style.display = "none";
          }else if($id == "3"){
            document.getElementById("show_asuransi_kerusakan").style.display = "none";
            document.getElementById("show_biaya_depresi").style.display = "none";
            document.getElementById("show_biaya_listrik").style.display = "inline";
            document.getElementById("show_piso_potong").style.display = "none";
            document.getElementById("show_packing").style.display = "none";
          }else if($id == "4"){
            document.getElementById("show_asuransi_kerusakan").style.display = "none";
            document.getElementById("show_biaya_depresi").style.display = "none";
            document.getElementById("show_biaya_listrik").style.display = "none";
            document.getElementById("show_piso_potong").style.display = "inline";
            document.getElementById("show_packing").style.display = "none";
          }else if($id == "5"){
            document.getElementById("show_asuransi_kerusakan").style.display = "none";
            document.getElementById("show_biaya_depresi").style.display = "none";
            document.getElementById("show_biaya_listrik").style.display = "none";
            document.getElementById("show_piso_potong").style.display = "none";
            document.getElementById("show_packing").style.display = "inline";
          }
      }

      function hitung($jenis){
        //alert($jenis);
        if($jenis == "hitasuransi_kerusakan"){
          var hasil = parseFloat(document.getElementById("modal").value) / 10;
          document.getElementById("hasil_show_asuransi_kerusakan").value = hasil;
        }else if($jenis == "hitbiaya_depresi"){
          
          var biaya_aset = parseFloat(document.getElementById("biaya_aset").value);
          var nilai_buku = parseFloat(document.getElementById("nilai_buku").value);
          var masa_manfaat = parseFloat(document.getElementById("masa_manfaat").value);
          var hasil = (biaya_aset - nilai_buku)/masa_manfaat;
          alert(hasil);
          document.getElementById("hasil_show_biaya_depresi").value = hasil;
        }else if($jenis == "hitbiaya_listrik"){
          var unit =parseFloat(document.getElementById("unit").value);
          var watt =parseFloat(document.getElementById("watt").value);
          var lama =parseFloat(document.getElementById("lama").value);
          var tarif = parseFloat(document.getElementById("tarif").value);
          var hasil = (unit*watt*lama)/1000 * tarif;
          document.getElementById("hasil_show_biaya_listrik").value = hasil;
        }else if($jenis == "hitpiso_potong"){
          var biaya_perolehan =parseFloat(document.getElementById("biaya_perolehan").value);
          var daya_tahan =parseFloat(document.getElementById("daya_tahan").value);
          var hasil = biaya_perolehan/daya_tahan;
          document.getElementById("hasil_show_piso_potong").value = hasil;
        }else if($jenis == "hitpacking"){
          var biaya_pembelian =parseFloat(document.getElementById("biaya_pembelian").value);
          var jumlah =parseFloat(document.getElementById("jumlah").value);
          var hasil = biaya_pembelian/jumlah;
          document.getElementById("hasil_show_packing").value = hasil;
        } 
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
<h4> Identifikasi</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
              <p class="col-12  offset-4">Kalkulasi Identifikasi</p>
              <form class="col-12" role="form" action="inserthppactual.php" method="post" enctype="multipart/form-data">
                  <label class="form-label col-2 offset-3">Kategori:</label>
                    <select id="kategori" name="kategori" class="form-select col-5" onchange="cekdata(this.value)">
                      <option value="0" >-- Pilih Kategori Identifikasi --</option> 
                      <option value="1" >Asuransi Kerusakan Barang</option> 
                      <option value="2" >Biaya Depresiasi dan Servis</option>
                      <option value="3" >Biaya Listrik</option>
                      <option value="4" >Piso Potong dan Poles</option>
                      <option value="5" >Packing (Paku dan Kayu)</option>
                    </select>
                    
                    <div id="show_asuransi_kerusakan" style="display:none;">
                      <label class="form-label col-4 offset-3">Modal :</label>
                      <input type="number" id="modal" name="modal" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Hasil :</label>
                      <input type="number" id="hasil_show_asuransi_kerusakan" name="modal" class="form-select col-3" disabled>
                      <br>
                      <div class="button col-5 offset-3">
                        <a class="btn btn-success" id="hitasuransi_kerusakan" onclick=hitung(this.id)>Kalkulasi</a>
                      </div>
                    </div>
                    
                    <div id="show_biaya_listrik" style="display:none;">
                      <label class="form-label col-4 offset-3">Unit :</label>
                      <input type="number" id="unit" name="unit" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Watt :</label>
                      <input type="number" id="watt" name="watt" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3" >Lama pengguna :</label>
                      <input type="number" id="lama" name="lama" placeholder="jam" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Tarif/kwh :</label>
                      <input type="number" id="tarif" name="tarif" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Hasil :</label>
                      <input type="number" id="hasil_show_biaya_listrik" name="modal" class="form-select col-3" disabled>
                      <br>
                      <div class="button col-5 offset-3">
                        <a class="btn btn-success" id="hitbiaya_listrik" onclick=hitung(this.id)>Kalkulasi</a>
                      </div>
                    </div>

                    <div id="show_piso_potong" style="display:none;">
                      <label class="form-label col-4 offset-3">Biaya Perolehan :</label>
                      <input type="number" id="biaya_perolehan" name="biaya_perolehan" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3" >Daya Tahan :</label>
                      <input type="number" id="daya_tahan" placeholder="jam" name="daya_tahan" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Hasil :</label>
                      <input type="number" id="hasil_show_piso_potong" name="modal" class="form-select col-3" disabled>
                      <br>
                      <div class="button col-5 offset-3">
                        <a class="btn btn-success" id="hitpiso_potong" onclick=hitung(this.id)>Kalkulasi</a>
                      </div>
                    </div>

                    <div id="show_packing" style="display:none;">
                      <label class="form-label col-4 offset-3">Biaya pembelian/satuan :</label>
                      <input type="number" id="biaya_pembelian" name="biaya_pembelian" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Jumlah Kebutuhan :</label>
                      <input type="number" id="jumlah" name="jumlah" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Hasil :</label>
                      <input type="number" id="hasil_show_packing" name="modal" class="form-select col-3" disabled>
                      <br>
                      <div class="button col-5 offset-3">
                        <a class="btn btn-success" id="hitpacking" onclick=hitung(this.id)>Kalkulasi</a>
                      </div>
                    </div>
                      <div id="show_biaya_depresi" style="display:none;">
                      <label class="form-label col-4 offset-3">Biaya Aset :</label>
                      <input type="number" id="biaya_aset" name="biaya_aset" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3" >Nilai Buku :</label>
                      <input type="number" id="nilai_buku" name="nilai_buku" placeholder="%" class="form-select col-3">
                      <div>
                      <br>
                      <label class="form-label col-4 offset-3" >Masa Manfaat Aset :</label>
                      <input type="number" id="masa_manfaat" placeholder="jam" name="masa_manfaat" class="form-select col-3">
                      <br>
                      <label class="form-label col-4 offset-3">Hasil :</label>
                      <input type="number" id="hasil_show_biaya_depresi" name="modal" class="form-select col-3" disabled>
                      <br>
                      <div class="button col-5 offset-3">
                        <a class="btn btn-success" id="hitbiaya_depresi" onclick=hitung(this.id)>Kalkulasi</a>
                      </div>
                    </div>

                  
              </form>
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include '_partial/footer.php'?>

  