
<script src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

<div class="div-1" style=" height:100%; text-align:center; ">
    <br>
    <span style=" padding : 10px;background-color:#F499CF; font-size:20pt; font-weight:bold; margin-top:100px">Target Kaizen 2022</span>

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

    <div style="margin-top:50px">
        <span style=" padding : 10px;background-color:#F499CF; font-size:20pt; font-weight:bold; ">Target Kaizen 2022</span>
    </div>

    <div class="row" style="background:#1B5EA9">
    
        <div class="col-md-6">
            <h3 style="color:White;"><center>Summary Kaizen Idea Submit</center></h3>
            <figure class="highcharts-figure">
                <div id="container_summary"></div>
                <p class="highcharts-description">
                
                </p>
            </figure>
            
        </div>
        <div class="col-md-6">
            <h3 style="color:White;"><center>Summary Kaizen Implemented (Hanya Mendata)</center></h3>
            <figure class="highcharts-figure">
                <div id="containers_summary"></div>
                <p class="highcharts-description">
                
                </p>
            </figure>
            
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

    xAxis: [{
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
        }
        echo "],";
        ?>
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            style: {
                color: Highcharts.getOptions().colors[3]
            },
            enabled : false
        },
        series: {
            color: '#FF0000'
        }
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
            style: {
            color: Highcharts.getOptions().colors[2]
            },
            enabled : false
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
                    $jam = "{y:".number_format((float)$implemented[$i]['RATIO'], 2, '.', '').", color: '".$warna."'},";
                }
                else{
                    $jam ="{y:".number_format((float)$implemented[$i]['RATIO'], 2, '.', '').", color: '".$warna."'}";
                }
                echo $jam;
            
            }
            echo "],";

        ?>
        label:{
            visible : false
        },
        tooltip: {
            valueSuffix: ''
        },

       
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
        }
        echo "],";
        ?>
        color: '#FF0000',
        tooltip: {
            valueSuffix: ''
        },
        dataLabels: {
                enabled: true
            }
    }]
});


Highcharts.chart('containers', {
    chart: {
        zoomType: 'xy',
        height: (9 / 16 * 100) + '%' // 16:9 ratio

    },
    title: {
        text: null//'Kaizen Implemented'
    },
   credits:{
        enabled: false
   },

    xAxis: [{
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
        }
        echo "],";
        ?>
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
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
        }
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
            style: {
            color: Highcharts.getOptions().colors[2]
            },
            enabled : false
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
                    $jam = "{y:".number_format((float)$implemented[$i]['RATIO'], 2, '.', '').", color: '".$warna."'},";
                }
                else{
                    $jam ="{y:".number_format((float)$implemented[$i]['RATIO'], 2, '.', '').", color: '".$warna."'}";
                }
                echo $jam;
            
            }
            echo "],";

        ?>
        label:{
            visible : false
        },
        tooltip: {
            valueSuffix: ''
        },

       
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
        }
        echo "],";
        ?>
        color: '#FF0000',
        tooltip: {
            valueSuffix: ''
        },
        dataLabels: {
                enabled: true
            }
    }]
});



Highcharts.chart('container_summary', {
    chart: {
        backgroundColor: '#1B5EA9',
        zoomType: 'xy',
    },
    
    title: {
        text: null,
        enabled : false
    },
   credits:{
        enabled: false
   },
    xAxis: [{
        labels: {
            style: {
                color : 'white'
            }
        },
        <?php 
            echo "categories: [";
            for ($i=0; $i<count($kaizen_submit); $i++){
               
                if ($i < count($kaizen_submit) - 1 ){
                     $bulan = "['".$kaizen_submit[$i]['BULAN']."'],";
                }
                else{
                    $bulan ="['".$kaizen_submit[$i]['BULAN']."']";
                }
                echo $bulan;
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
    legend:{
        itemStyle: {
            color: 'white'
        }
    },
    series: [{
        name: 'Actual',
        type: 'column',
        // yAxis: 1,
        <?php 
            echo "data: [";
            for ($i=0; $i<count($kaizen_submit); $i++){
                $bulan = date('m');
                if ($bulan == $kaizen_submit[$i]['PERIODE'] )
                {
                    $warna = '#FF9633'; //oranye
                }else{
                    $warna = '#EEEAE7'; //abuabu
                }

                if ($i < count($kaizen_submit) - 1 ){
                    $jam = "[".number_format($kaizen_submit[$i]['ACTUAL_IDE'], 0, '.', '')."],";
                }
                else{
                    $jam ="[".number_format($kaizen_submit[$i]['ACTUAL_IDE'], 0, '.', '')."]";
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
            for ($i=0; $i<count($kaizen_submit); $i++){
                $data = number_format((float)$kaizen_submit[$i]['JML_KARYAWAN'], 2, '.', '');
            if ($i < count($kaizen_submit) - 1 ){
                $jam = "[".$data."],";
                }
                else{
                $jam ="[".$data."]";
                }
            echo $jam;
        }
        echo "],";
        ?>
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
                borderRadius: 5,
                borderWidth: 1,
                borderColor: '#AAA',
                y: -10
            },
    }]
});

Highcharts.chart('containers_summary', {
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
        name: 'Implemented',
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

