<div class="grid" style="padding-top: 1em">
    <div class="row">
        <div class="span4">
            <?php
            include APPPATH . "/views/sidebar.php";
            ?>
        </div>

        <div class="span10">
            <div id="konten" style="width: 100%;height: 100%;background-color:white;padding: 10px ">
                <br>
                <h4>Daftar Siswa</h4>
                <table class="table">
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Nama Siswa</strong></td>
                        <td><strong>Username</strong></td>
                        <td><strong>Nama Kelas</strong></td>
                        <td><strong>Tingkat Kelas</strong></td>
                        <td><strong>Jenis Kelamin</strong></td>
                        <td><strong>Email Siswa</strong></td>
                        <td><strong>Aktif</strong></td>
                        <td><strong>Aksi</strong></td>
                    </tr>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($rs->result_array() as $row) {
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['NAMA_SISWA'] ?></td>
                                <td><?= $row['USERNAME'] ?></td>
                                <td><?= $row['NAMA_KELAS'] ?></td>
                                <td><?= $row['KETERANGAN_TINGKATKELAS'] ?></td>
                                <td><?= $row['JENIS_KELAMIN'] ?></td>
                                <td><?= $row['EMAIL_SISWA'] ?></td>
                                <td><?= $row['STATUS'] == '1' ? "Aktif" : "Tidak Aktif" ?></td>
                                <td><a href="<?= base_url("index.php/siswa/update_status/".$row['USERNAME']."/".$row['STATUS']) ?>"><?= $row['STATUS'] == '1' ? "Non Aktifkan" : "Aktifkan" ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>