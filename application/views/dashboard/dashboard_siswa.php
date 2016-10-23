<div class="grid" style="padding-top: 1em">
    <div class="row">
        <div class="span4">
            <?php
            include APPPATH . "/views/sidebar_siswa.php";
            ?>
        </div>

        <div class="span12">
           <div id="konten" style="width: 100%;height: 100%;background-color:white;padding: 10px ">
               <h5><b>Selamat datang, <?php echo $_SESSION['USER']['USERNAME'] ?>. Berikut data anda:</b></h5>
                <?php
                 foreach($rs->result_array() as $row){
                     ?>
               <table style="width: 30%"  class="table table-striped">
                   <tr>
                       <td style="text-align: left;width: 40% ">Kode Siswa</td>
                       <td style="text-align: left;width: 60%"><?php echo $row['KODE_SISWA'] ?></td>
                   </tr>
                    <tr>
                       <td style="text-align: left;width: 40% ">Nama</td>
                       <td style="text-align: left;width: 60%"><?php echo $row['NAMA_SISWA'] ?></td>
                   </tr>
                    <tr>
                       <td style="text-align: left;width: 40% ">Email</td>
                       <td style="text-align: left;width: 60%"><?php echo $row['EMAIL_SISWA'] ?></td>
                   </tr>
                    <tr>
                       <td style="text-align: left;width: 40% ">Tingkat  Kelas</td>
                       <td style="text-align: left;width: 60%"><?php echo $row['KODE_TINGKATKELAS'] ?></td>
                   </tr>
                    <tr>
                       <td style="text-align: left;width: 40% ">Nama Kelas</td>
                       <td style="text-align: left;width: 60%"><?php echo $row['NAMA_KELAS'] ?></td>
                   </tr>
                   <tr>
                       <td style="text-align: left;width: 40% ">Guru</td>
                       <td style="text-align: left;width: 60%"><?php echo $row['NAMA_GURU'] ?></td>
                   </tr>
               </table>
               <?php
                 }
                ?>
            </div>
        </div>

    </div>
</div>