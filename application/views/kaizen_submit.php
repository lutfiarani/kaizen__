<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<style>
    span.a {
  display: inline; /* the default for span */
  /* width: 100px;
  height: 100px;
  padding: 5px; */
  /* border: 1px solid blue;   */
  background-color: yellow; 
}

    </style>
<script src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

<!-- 
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
<div class="div-1" style=" height=100%; text-align:center">
<br>
<span style=" padding : 10px;background-color:#F499CF; font-size:20pt; font-weight:bold">Target Kaizen 2022</span>
    <br>
    <br>
    <br>
<div class="row">
    
<div class="col-md-6">
    <h3 style="color:White;"><center>Kaizen Implemented</center></h3>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
        
        </p>
    </figure>
    
</div>
<div class="col-md-6">
    <h3 style="color:White;"><center>Kaizen Impact to Efficiency</center></h3>
    <figure class="highcharts-figure">
        <div id="containers"></div>
        <p class="highcharts-description">
        
        </p>
    </figure>
    
</div>
</div>
</div>
<script>


// Highcharts.wrap(Highcharts.Series.prototype, 'drawLegendSymbol', function (proceed, legend) {
//     proceed.call(this, legend);

//     this.legendLine.attr({
//         d: ['M', 0, 10, 'L', 5, 5, 8, 10]
//     });
//     this.negativeLine = this.chart.renderer.path(
//         ['M', 8, 10, 'L', 11, 15, 16, 10]
//     ).attr({
//         stroke: this.options.negativeColor,
//         'stroke-width': this.options.lineWidth
//     })
//         .add(this.legendGroup);
// });


Highcharts.chart('container', {
    chart: {
        backgroundColor: '#1B5EA9',
        zoomType: 'xy',
        // height: (9 / 16 * 100) + '%' // 16:9 ratio
    },
    
    title: {
        text: null,
        enabled : false
    },
   credits:{
        enabled: false
   },
//    plotOptions: {
//         series: {
//             dataLabels: {
//                 enabled: true,
                
//                 shape: 'callout'
//             }
//         }
//     },
    xAxis: [{
        labels: {
            // format: '{value}°C',
            style: {
                // color: Highcharts.getOptions().colors[1]
                color : 'white'
            }
        },
        <?php 
            echo "categories: [";
            for ($i=0; $i<count($implemented); $i++){
               
                if ($i < count($implemented) - 1 ){
                     $bulan = "['".$implemented[$i]['BULAN']."'],";
                }
                else{
                    $bulan ="['".$implemented[$i]['BULAN']."']";
                }
                echo $bulan;
            // echo "{ y: ".$hasilData->QTY_SEKARANG.", color:'".$warna."'},";
        }
        echo "],";
        ?>
        crosshair: true
    }],
    
    yAxis: [{ // Primary yAxis
        labels: {
            // format: '{value}°C',
            style: {
                // color: Highcharts.getOptions().colors[1]
                color : 'white'
            }
        },
        title: {
            // text: 'Target',
            style: {
                color: Highcharts.getOptions().colors[3]
            },
            enabled : false
        },
        series: {
            color: '#FF0000'
        },
    },
    { // Secondary yAxis
        min : 0,
        max : 1,
        title: {
           
            text: 'Actual',
            style: {
                color: Highcharts.getOptions().colors[2]
            },
            enabled : false
        },
        labels: {
            // format: '{value} mm',
            style: {
            color: Highcharts.getOptions().colors[2]
            },
            enabled : false,
            shape: 'callout'
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    // legend: {
    //     // layout: 'vertical',
    //     // align: 'center',
    //     // x: 0,
    //     // verticalAlign: 'bottom',
    //     // y: 0,
    //     floating: true,
    //     backgroundColor:
    //         Highcharts.defaultOptions.legend.backgroundColor || // theme
    //         'rgba(255,255,255,0.25)',
           
    // },
    legend:{
        itemStyle: {
            color: 'white'
        }
    },
    series: [{
        name: 'Actual',
        type: 'column',
        yAxis: 1,
        <?php 
            echo "data: [";
            for ($i=0; $i<count($implemented); $i++){
                $bulan = date('m');
                if ($bulan == $implemented[$i]['PERIODE'] )
                {
                    $warna = '#FF9633'; //oranye
                }else{
                    $warna = '#EEEAE7'; //abuabu
                }

                if ($i < count($implemented) - 1 ){
                    $jam = "[".number_format((float)$implemented[$i]['ACTUAL_IDE'], 2, '.', '')."],";
                }
                else{
                    $jam ="[".number_format((float)$implemented[$i]['ACTUAL_IDE'], 2, '.', '')."]";
                }
                echo $jam;
            
            }
            echo "],";

        ?>
        label:{
            visible : true,
        },
        tooltip: {
            valueSuffix: ''
        },
        color: '#F51C1C',
        dataLabels: {
                enabled: true,
                shape : 'square',
                backgroundColor: '#FFFFFF',
                style: {
                    color: '#00000',
                    textOutline: 'none'
                }
            }

       
    }, {
        name: 'Target',
        type: 'line',
        <?php 
            echo "data: [";
            for ($i=0; $i<count($implemented); $i++){
                $data = number_format((float)$implemented[$i]['JML_KARYAWAN'], 2, '.', '');
            if ($i < count($implemented) - 1 ){
                $jam = "[".$data."],";
                }
                else{
                $jam ="[".$data."]";
                }
            echo $jam;
            // echo "{ y: ".$hasilData->QTY_SEKARANG.", color:'".$warna."'},";
        }
        echo "],";
        ?>
        // style: {
        //         color: Highcharts.getOptions().colors[3]
        //     },
        color: '#FF9633',
        tooltip: {
            valueSuffix: ''
        },
        dataLabels: {
                enabled: true,
                shape : 'square',
                backgroundColor: '#F7DE4E',
                style: {
                    color: '#00000',
                    textOutline: 'none'
                },
                // enabled: true,
                borderRadius: 5,
                // backgroundColor: 'rgba(252, 255, 197, 0.7)',
                borderWidth: 1,
                borderColor: '#AAA',
                y: -10
            },
        // plotOptions: {
        // series: {
        //     label: {
        //         connectorAllowed: false
        //     },
        //     pointStart: 2010
        // }
    // },
    }]
});

Highcharts.chart('containers', {
    chart: {
        type: 'column',
        backgroundColor: '#1B5EA9'
    },
    title: {
        text: null
    },
    credits:{
        enabled: false
    },
    subtitle: {
        text: null
    },
    legend:{
        itemStyle: {
            color: 'white'
        }
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true,
        labels: {
            style: {
                color: 'white'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        },
        labels: {
            style: {
                color: 'white'
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
        color: '#F7DE4E',
        dataLabels: {
                enabled: true,
                shape : 'square',
                backgroundColor: '#FFFFFF',
                style: {
                    color: '#00000',
                    textOutline: 'none'
                },
                borderRadius: 5,
                borderWidth: 1,
                borderColor: '#AAA',
                y: -10
            },
           
    },
    
    ]
});
              
</script>

