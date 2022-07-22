<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->

<script src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

<!-- 
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
<div class="div-1" style=" height=100%;">
<h1><span  style="background-color: rgba(220,0,0,1)"><center>TARGET KAIZEN 2022</center></span></h1>
    <br>
<div class="row">
    
<div class="col-md-6">
    <h3 style="color:White;"><center>Kaizen Implemented</center></h3>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
        
        </p>
    </figure>
    <table class="table table-sm table-bordered">
        <tr style="background-color:#FF9633">
            <th>Est. Direct Labor</th>
            <th>Target(1.0)</th>
            <th>Actual</th>
            <th>Ratio</th>
        </tr>
        <tr style="background-color:#EEEAE7">
            <th>13000</th>
            <th>13000</th>
            <th>1351</th>
            <th><?php echo date('m');?></th>
        </tr>
    </table>
</div>
<div class="col-md-6">
    <h3 style="color:White;"><center>Kaizen Impact to Efficiency</center></h3>
    <figure class="highcharts-figure">
        <div id="containers"></div>
        <p class="highcharts-description">
        
        </p>
    </figure>
    <table class="table table-sm table-bordered">
        <tr style="background-color:#FF9633">
            <th>Est. Direct Labor</th>
            <th>Target(1.0)</th>
            <th>Actual</th>
            <th>Ratio</th>
        </tr>
        <tr style="background-color:#EEEAE7">
            <th>13000</th>
            <th>13000</th>
            <th>1351</th>
            <th><?php echo date('m');?></th>
        </tr>
    </table>
</div>
</div>
</div>
<script>


Highcharts.wrap(Highcharts.Series.prototype, 'drawLegendSymbol', function (proceed, legend) {
    proceed.call(this, legend);

    this.legendLine.attr({
        d: ['M', 0, 10, 'L', 5, 5, 8, 10]
    });
    this.negativeLine = this.chart.renderer.path(
        ['M', 8, 10, 'L', 11, 15, 16, 10]
    ).attr({
        stroke: this.options.negativeColor,
        'stroke-width': this.options.lineWidth
    })
        .add(this.legendGroup);
});


Highcharts.chart('container', {
    chart: {
        backgroundColor: '#1B5EA9',
        zoomType: 'xy',
        height: (9 / 16 * 100) + '%' // 16:9 ratio
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
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
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
                    $jam = "[".number_format((float)$implemented[$i]['RATIO'], 2, '.', '')."],";
                }
                else{
                    $jam ="[".number_format((float)$implemented[$i]['RATIO'], 2, '.', '')."]";
                }
                echo $jam;
            
            }
            echo "],";

        ?>
        label:{
            visible : false,
        },
        tooltip: {
            valueSuffix: ''
        },
        color: '#F51C1C'

       
    }, {
        name: 'Target',
        type: 'line',
        <?php 
            echo "data: [";
            for ($i=0; $i<count($implemented); $i++){
                $data = number_format((float)$implemented[$i]['RATIO'], 2, '.', '');
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
                
            },
        plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },
    }]
});


// Highcharts.chart('containers', {
//     chart: {
//         backgroundColor: '#1B5EA9',
//         zoomType: 'xy',
//         height: (9 / 16 * 100) + '%' // 16:9 ratio

//     },
//     title: {
//         text: null//'Kaizen Implemented'
//     },
//    credits:{
//         enabled: false
//    },

//     xAxis: [{
//         <?php 
//             echo "categories: [";
//             for ($i=0; $i<count($implemented); $i++){
               
//                 if ($i < count($implemented) - 1 ){
//                      $bulan = "['".$implemented[$i]['BULAN']."'],";
//                 }
//                 else{
//                     $bulan ="['".$implemented[$i]['BULAN']."']";
//                 }
//                 echo $bulan;
//             // echo "{ y: ".$hasilData->QTY_SEKARANG.", color:'".$warna."'},";
//         }
//         echo "],";
//         ?>
//         crosshair: true
//     }],
//     yAxis: [{ // Primary yAxis
//         labels: {
//             // format: '{value}°C',
//             style: {
//                 color: Highcharts.getOptions().colors[1]
//             }
//         },
//         title: {
//             // text: 'Target',
//             style: {
//                 color: Highcharts.getOptions().colors[3]
//             },
//             enabled : false
//         },
//         series: {
//             color: '#FF0000'
//         }
//     },
//     { // Secondary yAxis
//         min : 0,
//         max : 1,
//         title: {
           
//             text: 'Actual',
//             style: {
//                 color: Highcharts.getOptions().colors[2]
//             },
//             enabled : false
//         },
//         labels: {
//             // format: '{value} mm',
//             style: {
//             color: Highcharts.getOptions().colors[2]
//             },
//             enabled : false
//         },
//         opposite: true
//     }],
//     tooltip: {
//         shared: true
//     },
//     legend: {
//         layout: 'vertical',
//         align: 'left',
//         x: 120,
//         verticalAlign: 'top',
//         y: 100,
//         floating: true,
//         backgroundColor:
//             Highcharts.defaultOptions.legend.backgroundColor || // theme
//             'rgba(255,255,255,0.25)'
//     },
//     series: [{
//         name: 'Actual',
//         type: 'column',
//         yAxis: 1,
//         <?php 
//             echo "data: [";
//             for ($i=0; $i<count($implemented); $i++){
//                 $bulan = date('m');
//                 if ($bulan == $implemented[$i]['PERIODE'] )
//                 {
//                     $warna = '#FF9633'; //oranye
//                 }else{
//                     $warna = '#EEEAE7'; //abuabu
//                 }

//                 if ($i < count($implemented) - 1 ){
//                     $jam = "{y:".number_format((float)$implemented[$i]['RATIO'], 2, '.', '').", color: '".$warna."'},";
//                 }
//                 else{
//                     $jam ="{y:".number_format((float)$implemented[$i]['RATIO'], 2, '.', '').", color: '".$warna."'}";
//                 }
//                 echo $jam;
            
//             }
//             echo "],";

//         ?>
//         color: '#FF9633',
//         label:{
//             visible : false
//         },
//         tooltip: {
//             valueSuffix: ''
//         },

       
//     }, {
//         name: 'Target',
//         type: 'spline',
//         <?php 
//             echo "data: [";
//             for ($i=0; $i<count($implemented); $i++){
//                 $data = number_format((float)$implemented[$i]['RATIO'], 2, '.', '');
//             if ($i < count($implemented) - 1 ){
//                 $jam = "[".$data."],";
//                 }
//                 else{
//                 $jam ="[".$data."]";
//                 }
//             echo $jam;
//             // echo "{ y: ".$hasilData->QTY_SEKARANG.", color:'".$warna."'},";
//         }
//         echo "],";
//         ?>
//         // style: {
//         //         color: Highcharts.getOptions().colors[3]
//         //     },
//         color: '#FF9633',
//         tooltip: {
//             valueSuffix: ''
//         },
//         dataLabels: {
//                 enabled: true
//             }
//     }]
// });
              
</script>

