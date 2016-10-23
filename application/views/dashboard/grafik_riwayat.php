
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
 /* Grid theme for Highcharts JS
 * @author Torstein Honsi
 */

Highcharts.theme = {
   //'#50B432', '#ED561B','#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4' 
   colors: ['blue', 'red','orange'],
   chart: {
      backgroundColor: {
         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
         stops: [
            [0, 'rgb(255, 255, 255)'],
            [1, 'rgb(240, 240, 255)']
         ]
      },
      borderWidth: 2,
      plotBackgroundColor: 'rgba(255, 255, 255, .9)',
      plotShadow: true,
      plotBorderWidth: 1
   },
   title: {
      style: {
         color: '#000',
         font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
      }
   },
   subtitle: {
      style: {
         color: '#666666',
         font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
      }
   },
   xAxis: {
      gridLineWidth: 1,
      lineColor: '#000',
      tickColor: '#000',
      labels: {
         style: {
            color: '#000',
            font: '11px Trebuchet MS, Verdana, sans-serif'
         }
      },
      title: {
         style: {
            color: '#333',
            fontWeight: 'bold',
            fontSize: '12px',
            fontFamily: 'Trebuchet MS, Verdana, sans-serif'

         }
      }
   },
   yAxis: {
      minorTickInterval: 'auto',
      lineColor: '#000',
      lineWidth: 1,
      tickWidth: 1,
      tickColor: '#000',
      labels: {
         style: {
            color: '#000',
            font: '11px Trebuchet MS, Verdana, sans-serif'
         }
      },
      title: {
         style: {
            color: '#333',
            fontWeight: 'bold',
            fontSize: '12px',
            fontFamily: 'Trebuchet MS, Verdana, sans-serif'
         }
      }
   },
   legend: {
      itemStyle: {
         font: '9pt Trebuchet MS, Verdana, sans-serif',
         color: 'black'

      },
      itemHoverStyle: {
         color: '#039'
      },
      itemHiddenStyle: {
         color: 'gray'
      }
   },
   labels: {
      style: {
         color: '#99b'
      }
   },

   navigation: {
      buttonOptions: {
         theme: {
            stroke: '#CCCCCC'
         }
      }
   }
};

// Apply the theme
var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Jumlah Status Tiap Game untuk Tiap Siswa'
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
            tickInterval:1,
            title: {
                text: 'Jumlah (kali)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' kali'
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
            name: 'Menang',
            data: [
               <?php
                echo $row_menang;
                ?>
            ]
        },{
            name: 'Kalah',
            data: [
                 <?php
                echo $row_kalah;
                ?>
            ]
        },
        {
            name: 'Menyerah',
            data: [
                 <?php
                echo $row_menyerah;
                ?>
            ]
        }]
    });
});
</script>