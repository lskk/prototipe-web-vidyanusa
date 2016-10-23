<div class="grid" style="padding-top: 1em">
    <div class="row fluid">
        <div class="span4">
            <?php
            include APPPATH . "/views/sidebar.php";
            ?>
        </div>

       <div class="span10">
            <div id="span10 konten" style="width: 100%;height: 680px;background-color:white;padding: 10px ">
                <?php
                for($i = 0;$i <$jml;$i++){
                    ?>
                <button class="shortcut" style="background-color: <?= $warna[$i] ?>;width: 10em;margin:0.3em" onclick="detail(<?= $i ?>)">
                    <i class="<?= $icon[$i] ?>"></i>
                    <span class="fg-white"><?= $judul[$i] ?></span>
                </button>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function detail(i){
        window.location.href = BASE_URL + "game/detail/" + i;
    }
</script>