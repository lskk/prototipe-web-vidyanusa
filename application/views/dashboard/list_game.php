Filter Game : 
<select id="game">
    <option value="" selected>[Pilih Game]</option>
    <?php
    foreach($rs_game->result_array() as $row){
        $selecte4d = "";
        if($kode_game == $row['KODE_PERMAINAN']){
            $selected = "selected";
        }else{
            $selected = "";
        }
        echo "<option value='{$row['KODE_PERMAINAN']}' $selected>{$row['NAMA_PERMAINAN']}</option>";
    }
    ?>
</select>

Filter Kelas : 
<select id="kelas">
    <option value="" selected>[Pilih Kelas]</option>
    <?php
    foreach($rs_kelas->result_array() as $row){
        $selecte4d = "";
        if($kode_kelas == $row['KODE_KELAS']){
            $selected = "selected";
        }else{
            $selected = "";
        }
        echo "<option value='{$row['KODE_KELAS']}' $selected>{$row['NAMA_KELAS']}</option>";
    }
    ?>
</select>

<button onclick="page()">Cari</button>

<script type="text/javascript">
function page(){
var kode_game = $("#game").val();
var nama_game = $("#game :selected").text();
var kode_kelas = $("#kelas").val();
var nama_kelas = $("#kelas :selected").text();
    location.href =  BASE_URL + "dashboard/<?php echo $grafik; ?>" + "/" + kode_game + "/" + kode_kelas 
            + "/" + nama_game + "/" + nama_kelas;
}
</script>
<p>
