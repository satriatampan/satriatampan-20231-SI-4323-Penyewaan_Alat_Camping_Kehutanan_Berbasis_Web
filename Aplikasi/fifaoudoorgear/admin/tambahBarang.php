<?php 
include 'assets/php/koneksi.php';
if($_POST['tambah']) {
        $id = $_POST['tambah'];
        $kategori=mysql_query("SELECT * FROM tb_kategori") or die(mysql_error());
        ?>
        
              <form method="POST" name="tambahBarang" action="tambah-barang" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori" onchange="idBarang(this.value)">
                    <option hidden value="0">Pilih Kategori</option>
                    <?php while ($hasilKategori=mysql_fetch_array($kategori)) { ?>
                      <option value="<?=$hasilKategori['id_kategori'];?>"><?=$hasilKategori['nama_kategori'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="row">
                  <div class="col-lg-9 col-sm-12">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="namaBarang" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-12">
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="text" name="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="text" name="hargaBarang" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Harga Sewa</label>
                      <input type="text" name="hargaSewa" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Gambar Barang ( max 1mb | PNG, JPG, dan JPEG )</label>
                  <input type="file" name="gambarBarang" class="form-control" required>
                </div>
                <center>
                  <button type="submit" name="simpanBarang" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>

