<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>

<script>
$(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
});
</script>
<br/>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <!-- <h2>List Dat</h2> -->
                            <form method="post" action="<?php echo base_url("Siswa/form"); ?>" enctype="multipart/form-data">
                                <!--
                                -- Buat sebuah input type file
                                -- class pull-left berfungsi agar file input berada di sebelah kiri
                                -->
                                <input type="file" name="file">

                                <!--
                                -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
                                -->
                                <input type="submit" name="preview" value="Preview">
                            </form>
                        </div>

                        <?php
                        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
                            if(isset($upload_error)){ // Jika proses upload gagal
                                echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                                die; // stop skrip
                            }?>
                        <form method="post" action="<?php echo base_url("Siswa/import"); ?>">

                            <div style="color: red;" id="kosong">
        Semua data belum diisi, Ada <span id="jumlah_kosong"></span> data yang belum diisi.
        </div>

                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $numrow = 1;
                                    $kosong = 0;
                                    foreach($sheet as $row){
                                    // Ambil data pada excel sesuai Kolom
                                    $nis = $row['A']; // Ambil data NIS
                                    $nama = $row['B']; // Ambil data nama
                                    $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
                                    $alamat = $row['D']; // Ambil data alamat

                                    // Cek jika semua data tidak diisi
                                    if($nis == "" && $nama == "" && $jenis_kelamin == "" && $alamat == "")
                                        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                                    // Cek $numrow apakah lebih dari 1
                                    // Artinya karena baris pertama adalah nama-nama kolom
                                    // Jadi dilewat saja, tidak usah diimport
                                    if($numrow > 1){
                                        // Validasi apakah semua data telah diisi
                                        $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                        $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                        $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                        $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                                        // Jika salah satu data ada yang kosong
                                        if($nis == "" or $nama == "" or $jenis_kelamin == "" or $alamat == ""){
                                            $kosong++; // Tambah 1 variabel $kosong
                                        }
                                    ?>
                                    <tr>
                                        <td <?php echo $nis_td;?>> <?php echo $nis;?> </td>
                                        <td <?php echo $nama_td;?>> <?php echo $nama;?> </td>
                                        <td <?php echo $jk_td;?>> <?php echo $jenis_kelamin;?> </td>
                                        <td <?php echo $alamat_td;?>> <?php echo $alamat;?> </td>
                                    </tr>
                                    <?php } $numrow++; }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php if($kosong > 0){
                            ?>
                                <script>
                                $(document).ready(function(){
                                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                                    $("#kosong").show(); // Munculkan alert validasi kosong
                                });
                                </script>
                            <?php
                            }else{?>
                                <hr>

                                <button type="submit" name="import" class="btn btn-sm btn-success">Import</button>
                                <a href="<?php echo base_url("Siswa"); ?>">Cancel</a>
                            <?php }?>
                        </div>

                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
