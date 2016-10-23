<div class="grid" style="padding-top: 1em">
    <div class="row">
        <div class="span4">
            <?php
            if($_SESSION['USER']['USER_ROLE'] == "S"){
                include APPPATH . "/views/sidebar_siswa.php";
            }else{
                include APPPATH . "/views/sidebar.php";
            }
            ?>
        </div>

        <div class="span10">
            <div id="span10 konten" style="width: 100%;height: 680px;background-color:white;padding: 10px ">
                <?php
                foreach($rs->result_array() as $row){
                    ?>
                <button class="shortcut fg-white" style="width: 9em;height: 12em;background-color: white">
                    <img src="<?php echo base_url('uploads') ?>/<?php echo $row['NAMA_FILE'] ?>">
                    <span style="margin: 1em !important" class="fg-gray" ><?= $row['KETERANGAN'] ?></span>
                </button>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>
