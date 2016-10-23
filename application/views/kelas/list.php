<div class="grid" style="padding-top: 1em">
    <div class="row">
        <div class="span4">
            <?php
            include APPPATH . "/views/sidebar.php";
            ?>
        </div>

        <div class="span10">
            <div id="konten" style="width: 100%;height: 100%;background-color:white;padding: 10px ">
                <button onclick="window.location.href = '<?= base_url('index.php/kelas/form') ?>'" class="info large" style="float: right">Tambah Kelas</button>
                <br>
                <h4>Daftar Kelas</h4>
                <table class="table">
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Kode Kelas</strong></td>
                        <td><strong>Nama Kelas</strong></td>
                        <td><strong>Tingkat Kelas</strong></td>
                        <td><strong>Kode Masuk</strong></td>
                        <td><strong>Aksi</strong></td>
                    </tr>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($rs->result_array() as $row) {
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['KODE_KELAS'] ?></td>
                                <td><?= $row['NAMA_KELAS'] ?></td>
                                <td><?= $row['KETERANGAN_TINGKATKELAS'] ?></td>
                                <td><?= $row['KODE_MASUK'] ?></td>
                                <td><a href="<?= base_url('index.php/kelas/form_update/' . $row['KODE_KELAS']) ?>" class="warning">edit</a></td>

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