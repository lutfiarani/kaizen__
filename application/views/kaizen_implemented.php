
<script src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

<div class="div-1" style=" height:100%; text-align:center; ">
    <br>
    <span style=" padding : 10px;background-color:#F499CF; font-size:20pt; font-weight:bold; margin-top:100px">Target Kaizen 2022</span>
    <br><br><br>
    <div class="row">
    
        <div class="col-md-6">
            <h3 style="color:White;"><center>Kaizen Implemented</center></h3>
            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                
                </p>
            </figure>
            
            <div id="tabel_implemented">
            </div>
            <?php 
            
                if($level==NULL){
                    echo '';
                }else{
                    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Update Data</button>';
                }
            
            ?>
            

            
<!-- Kaien Implemented Modal -->
            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Input Kaizen Implemented</h5>
                           
                        </div>

                        <div class="modal-body">
                            <span id="berhasil"></span>
                            <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Target Implemented Tahunan:</label>
                                <input type="number" class="form-control" id="target_imp">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Target Direct Labor Tahunan:</label>
                                <input type="number" class="form-control" id="target_lab">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Proyeksi Direct Labor Bulanan</label>
                                <input type="number" class="form-control" id="pro_imp">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Implemented Bulanan:</label>
                                <input type="number" class="form-control" id="imp_bulanan">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Direct Labor Bulanan:</label>
                                <input type="number" class="form-control" id="lab_bulanan">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success save_implemented">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kaizen Implemented Modal End -->
        <div class="col-md-6">
            <h3 style="color:White;"><center>Kaizen Impact to Efficiency</center></h3>
            <figure class="highcharts-figure">
                <div id="containers"></div>
                <p class="highcharts-description">
                
                </p>
                
            </figure>
            <div id="tabel_impact">
            </div>
            <?php 
                if($level == NULL){
                    echo '';
                }else{
                    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_kaizen_impact">Update Data</button>';
                }
            ?>
            
<!-- Kaizen Impact Modal -->
    <div class="modal fade modal_kaizen_impact" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Kaizen Impact</h5>
                
                </div>
                <div class="modal-body">
                    <span id="berhasil_impact"></span>
                    <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Target Efficiency Tahunan</label>
                        <input type="number" class="form-control" id="target_eff_tahunan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Target Ratio Tahunan</label>
                        <input type="number" class="form-control" id="target_rat_tahunan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Efficiency Bulanan</label>
                        <input type="number" class="form-control" id="eff_bulanan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Ratio Bulanan</label>
                        <input type="number" class="form-control" id="rat_bulanan">
                    </div>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success save_impact">Save</button>
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
        kaizen_implemented()
        kaizen_implemented2()
        
        kaizen_implemented_tabel()
        kaizen_impact_tabel()
        // gedung();

        $(document).on('click','.save_implemented',function(){
            var target_imp  = $('#target_imp').val();
            var target_lab  = $('#target_lab').val();
            var pro_imp     = $('#pro_imp').val();
            var imp_bulanan = $('#imp_bulanan').val();
            var lab_bulanan = $('#lab_bulanan').val();
            var html =''                      
            $.ajax({
                url : "<?php echo site_url('C_kaizen_admin/input_implemented')?>",
                type : "POST",
                data : {target_imp:target_imp, target_lab:target_lab, pro_imp:pro_imp, imp_bulanan:imp_bulanan, lab_bulanan: lab_bulanan},
                dataType : 'json',
                error: function (error) {
                    html += '<div class="alert alert-danger" role="alert">'+
                            'Data Gagal Diinput, silahkan cek kembali form input Anda'+
                            '</div>';
                    
                    $('#berhasil').html(html);
                },
                success : function(data){
                
                html += '<div class="alert alert-success" role="alert">'+
                            'Data Berhasil diinput'+
                            '</div>';
                    
                    $('#berhasil').html(html);
                    kaizen_implemented();
                    kaizen_implemented_tabel();
                }
            })
        })

        
        $(document).on('click','.save_impact',function(){
                    var target_rat_tahunan  = $('#target_rat_tahunan').val();
                    var target_eff_tahunan  = $('#target_eff_tahunan').val();
                    var eff_bulanan         = $('#eff_bulanan').val();
                    var rat_bulanan         = $('#rat_bulanan').val();
                    var html =''                      

                    $.ajax({
                        url : "<?php echo site_url('C_kaizen_admin/input_impact')?>",
                        type : "POST",
                        data : {target_rat_tahunan:target_rat_tahunan, target_eff_tahunan:target_eff_tahunan, eff_bulanan:eff_bulanan, rat_bulanan:rat_bulanan},
                        dataType : 'json',
                        error: function (data) {
                            html += '<div class="alert alert-danger" role="alert">'+
                                    'Data Gagal Diinput, silahkan cek kembali form input Anda'+
                                    '</div>';
                            
                            $('#berhasil_impact').html(html);
                        },
                        success : function(data){
                        
                        html += '<div class="alert alert-success" role="alert">'+
                                    'Data Berhasil diinput'+
                                    '</div>';
                            
                            $('#berhasil_impact').html(html);
                            kaizen_implemented2();
                            kaizen_impact_tabel();
                        }
                    })
                })

       

})

function kaizen_implemented_tabel(){
    var html =''
    $.ajax({
        url : "<?php echo base_url('C_kaizen_admin/implemented_tabel')?>",
        type: "POST",
        dataType : "json",
        success : function(data){
            var ratio = data.IMP_BULANAN/data.LAB_BULANAN
            html += ' <table class="table table-sm table-bordered">'+
                '<tr style="background-color:#FF9633">'+
                    '<th>Est. Direct Labor</th>'+
                    '<th>Target(1.0)</th>'+
                    '<th>Actual</th>'+
                    '<th>Ratio</th>'+
                '</tr>'+
                '<tr style="background-color:#EEEAE7">'+
                    '<th>'+data.TARGET_LAB_TAHUNAN+'</th>'+
                    '<th>'+data.TARGET_LAB_TAHUNAN+'</th>'+
                    '<th>'+data.IMP_BULANAN+'</th>'+
                    '<th>'+ratio+'</th>'+
                '</tr>'+
           '</table>';
           $('#tabel_implemented').html(html)
        }
    })
}


function kaizen_impact_tabel(){
    var html =''
    $.ajax({
        url : "<?php echo base_url('C_kaizen_admin/impact_tabel')?>",
        type: "POST",
        dataType : "json",
        success : function(data){
         
            html += ' <table class="table table-sm table-bordered">'+
                '<tr style="background-color:#FF9633">'+
                    '<th>Target Implement</th>'+
                    '<th>Target(0.5)</th>'+
                    '<th>Actual</th>'+
                    '<th>Ratio</th>'+
                '</tr>'+
                '<tr style="background-color:#EEEAE7">'+
                    '<th>'+data.TARGET_RAT_TAHUNAN+'</th>'+
                    '<th>'+data.TARGET_EFF_TAHUNAN+'</th>'+
                    '<th>'+data.EFF_BULANAN+'</th>'+
                    '<th>'+data.RAT_BULANAN+'</th>'+
                '</tr>'+
           '</table>';
           $('#tabel_impact').html(html)
        }
    })
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

function kaizen_implemented(){

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
}

function kaizen_implemented2(){ 
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

}

</script>

