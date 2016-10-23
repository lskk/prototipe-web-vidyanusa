Siswa : 
<select id="siswa" onchange="page()">
    <option value="" selected>[Pilih Siswa]</option>
    <?php
    foreach($rs_siswa->result_array() as $row){
        $selecte4d = "";
        if($username == $row['USERNAME']){
            $selected = "selected";
        }else{
            $selected = "";
        }
        echo "<option value='{$row['USERNAME']}' $selected>{$row['NAMA_SISWA']}</option>";
    }
    ?>
</select>
<script type="text/javascript">
function page(){
var kode_siswa = $("#siswa").val();
var nama_siswa = $("#siswa :selected").text();
    location.href =  BASE_URL + "dashboard/<?php echo $grafik; ?>" + "/" + kode_siswa + "/" + nama_siswa;
}
</script>
