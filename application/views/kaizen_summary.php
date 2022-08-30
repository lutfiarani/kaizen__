
<script src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

<div class="div-1" style=" height:100%; text-align:center; ">
    <br>
   
    <div style="margin-top:50px">
        <span style=" padding : 10px;background-color:#F499CF; font-size:20pt; font-weight:bold; ">Target Kaizen 2022</span>
    </div>
    <br>
    <br>
    <br>
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

            <?php 
                if($level == NULL){
                    echo '';
                }else{
                    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_summary_imp">Update Data</button>';
                }
            ?>
            
<!-- Kaizen Impact Modal -->
    <div class="modal fade modal_summary_imp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Summary Kaizen Implemented</h5>
                
                </div>
                <div class="modal-body">
                    <span id="berhasil_save_summary"></span>
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Gedung</label>
                            <select class="form-control" id="gedung" name="gedung">
                                <option value="">Pilih Gedung</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Implemented Bulanan</label>
                            <input type="number" class="form-control" id="imp_bulanan2">
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success save_summary_implemented">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Kaizen Impact Modal End -->
            
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/template/js/bootstrap.js"></script>
<script>
    $(document).ready( function () {
        kaizen_summary()
        kaizen_summary2()
        // kaizen_implemented_tabel()
        // kaizen_impact_tabel()
        gedung();

        
        $(document).on('click','.save_summary_implemented',function(){
            var gedung  = $('#gedung').val();
            var imp_bulanan  = $('#imp_bulanan2').val();
           
            var html =''                      

            $.ajax({
                url : "<?php echo site_url('C_kaizen_admin/input_summary_imp')?>",
                type : "POST",
                data : {gedung:gedung, imp_bulanan:imp_bulanan},
                dataType : 'json',
                error: function (data) {
                    html += '<div class="alert alert-danger" role="alert">'+
                            'Data Gagal Diinput, silahkan cek kembali form input Anda'+
                            '</div>';
                    
                    $('#berhasil_save_summary').html(html);
                },
                success : function(data){
                
                html += '<div class="alert alert-success" role="alert">'+
                            'Data Berhasil diinput'+
                            '</div>';
                    
                    $('#berhasil_save_summary').html(html);
                    kaizen_summary2();
                    
                }
            })
        })

})

function gedung(){
    $.ajax({
            url : "<?php echo site_url('C_kaizen_admin/cekgedung/'); ?>",
            dataType : "json",
            success : function(o) {
            console.log(o)
            $("#gedung").html(o.data);
            },
            error : function(data) {
                // do something
                console.log(data)
            }
        });
    // });
    }


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

function kaizen_summary(){

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
}

function kaizen_summary2(){
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
}


</script>

