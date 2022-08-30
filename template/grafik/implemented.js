{/* <script> */}
var kategori_1 = "[['Jan'],['Feb'],['Mar'],['Apr'],['May'],['Jun'],['Jul']]"
var data1 = " [{y:0.23, color: '#EEEAE7'},{y:0.27, color: '#EEEAE7'},{y:0.35, color: '#EEEAE7'},{y:0.35, color: '#EEEAE7'},{y:0.35, color: '#EEEAE7'},{y:0.39, color: '#EEEAE7'},{y:0.48, color: '#EEEAE7'}]"

var data2 = " [[0.23],[0.27],[0.35],[0.35],[0.35],[0.39],[0.48]]"

var data3 = " [['Jan'],['Feb'],['Mar'],['Apr'],['May'],['Jun'],['Jul']]"

var data4 = "[{y:0.23, color: '#EEEAE7'},{y:0.27, color: '#EEEAE7'},{y:0.35, color: '#EEEAE7'},{y:0.35, color: '#EEEAE7'},{y:0.35, color: '#EEEAE7'},{y:0.39, color: '#EEEAE7'},{y:0.48, color: '#EEEAE7'}]"

var data5 =  "[[0.23],[0.27],[0.35],[0.35],[0.35],[0.39],[0.48]]"

var kategori_2 = "[['Jan'],['Feb'],['Mar'],['Apr'],['May'],['Jun'],['Jul']]"

var data6 = "[[3000],[3500],[4500],[4500],[4500],[5000],[6500]]"

var data7 =  "[[12800.00],[12850.00],[12850.00],[13000.00],[12900.00],[12900.00],[13500.00]]"

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

    xAxis: [{categories: kategori_1, 
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
        data: data1,
        label:{
            visible : false
        },
        tooltip: {
            valueSuffix: ''
        },

       
    }, {
        name: 'Target',
        type: 'line',
        data: data2,
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
        categories: data3,
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
        data: data4,
        label:{
            visible : false
        },
        tooltip: {
            valueSuffix: ''
        },

       
    }, {
        name: 'Target',
        type: 'line',
        data: data5,
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
        categories: kategori_2,
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
        data: data6, 
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
        data: data7,
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