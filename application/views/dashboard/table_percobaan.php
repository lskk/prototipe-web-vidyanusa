<script type="text/javascript" src="<?= $this->config->item('assets') ?>/highcharts/highslide-full.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('assets') ?>/highcharts/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?= $this->config->item('assets') ?>/highcharts/highslide.css" />
<div class="grid" style="padding-top: 1em">
    <div class="row">
        <div class="span4">
            <?php
            include APPPATH . "views/sidebar.php";
            ?>
        </div>

        <div class="span12">
            <div id="konten" style="width: 100%;height: 100%;background-color:white;padding: 10px ">
                <?php
                include APPPATH . "views/dashboard/list_game.php";
                ?>
                <div id="container" >
                    <div class="span10" style="padding-top: 20px">
                        <div id="konten" style="width: 100%;height: 100%;background-color:white;padding: 10px ">
                            <br>
                            <h4>Tabel</h4>
                            <table class="table" >
                               
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($rs->result_array() as $row) {
                                        $menang = 0;
                                        $kalah = 0;
                                        $nyerah = 0;
                                        $jml = 0;
                                        $kode_permainan = $row['KODE_PERMAINAN'];
                                        $username = $row['USERNAME'];
                                        ?>
                                     <tr>
                                    <td><strong>No</strong></td>
                                    <td><strong>Nama Siswa</strong></td>
                                    <td><strong>Menang</strong></td>
                                    <td><strong>Kalah</strong></td>
                                    <td><strong>Menyerah</strong></td>
                                    <td><strong>Total Percobaan</strong></td>   
                                </tr>
                                    <tr style="cursor: pointer">
                                            <td><?= $i ?></td>
                                            <td><?= $row['NAMA_SISWA'] ?></td>
                                            <td>
                                                <?= $row['MENANG'] ?>
                                            </td>
                                            <td>
                                                <?= $row['KALAH'] ?>
                                            </td>
                                            <td>
                                               <?= $row['NYERAH'] ?>
                                            </td>
                                            <td><?= $row['JML_PERCOBAAN'] ?></td>
                                        </tr>
                                        <tr id="graph_<?= $i ?>">
                                           <td></td>
                                           <td colspan="4">
                                               <div id="chart_<?=$i?>"></div>
                                               <?php
                                                    $query = "SELECT RIWAYAT_ACCURACY,WAKTU_MAIN,STATUS_RIWAYAT FROM riwayat_permainan WHERE KODE_PERMAINAN='$kode_permainan' AND USERNAME='$username' AND `STATUS_RIWAYAT` != 0";
                                                    $rsa = $this->db->query($query);
                                                    $json = array();
                                                    $percobaan_ke = array();
                                                    $cnt = 1;
                                                    $record['name'] = "Akurasi ";
                                                    $record['data'] = array();
                                                    foreach($rsa->result_array() as $rowa){
                                                        $record['data'][] = $rowa['RIWAYAT_ACCURACY'];    
                                                        $percobaan_ke[] = $cnt;
                                                        $cnt++;
                                                    }
                                                    array_push($json,$record);
                                               ?>
                                               <script type="text/javascript">
                                               $(function(){
                                                   $('#chart_<?=$i?>').highcharts({
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: 'Sumber: data testing SMP Nusantara',
                x: -20
            },
            xAxis: {
                categories: <?= json_encode($percobaan_ke); ?>
            },
            yAxis: {
                title: {
                    text: 'Akurasi'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            }, plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function (e) {
                                var txt = "";
                                $.ajax({
                                    url: BASE_URL + 'dashboard/get_waktu_riwayat/<?= $kode_permainan ?>/<?= $username ?>',
                                    type: 'GET',
                                    success: function (data) {
                                        hs.htmlExpand(null, {
                                    pageOrigin: {
                                        x: e.pageX || e.clientX,
                                        y: e.pageY || e.clientY
                                    },
                                    headingText: 'skor <?= $row['NAMA_SISWA'] ?>',
                                    maincontentText: data,
                                    width: 260
                                }); 
                                    }
                                });
                               
                                 
                            },
                        }
                    },
                    marker: {
                        lineWidth: 1
                    }
                }
            },
            series:
<?=  json_encode($json, JSON_NUMERIC_CHECK); ?>
        });
        });
                                               </script>
                                               
                                           </td>
                                            <td></td>  
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
        </div>

    </div>
</div>

<script type="text/javascript">
function togle(id){
      $("#graph_" + id + "").show();
}
</script>