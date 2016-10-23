
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
            include APPPATH . "views/dashboard/list_siswa.php";
            ?>
               <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Lama Waktu Tiap Game untuk Tiap Siswa'
        },
        subtitle: {
            text: 'Nama Siswa/i : <?= urldecode($nama_siswa) ?>'
        },
        xAxis: {
            categories: [
                <?php
                foreach($rs->result_array() as $row){
                    echo "'".$row['NAMA_PERMAINAN']."',";
                }
                ?>
            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Waktu (menit)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: 'menit'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Waktu Standar',
            data: [
               <?php
                foreach($rs->result_array() as $row){
                    $standar = $row['WAKTU_STANDAR']/60;
                    echo "".$standar.",";
                }
                ?>
            ]
        },{
            name: 'Waktu Permainan',
            data: [
                <?php
                foreach($rs->result_array() as $row){
                    $waktu = $row['RIWAYAT_WAKTUMAIN']/60;
                    echo "".$waktu.",";
                }
                ?>
            ]
        }]
    });
});
</script>