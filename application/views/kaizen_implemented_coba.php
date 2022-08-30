
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
$(document).ready(function(){  
    var kategori_1 = "<?php 
            echo "[";
            for ($i=0; $i<count($implemented); $i++){
               
                if ($i < count($implemented) - 1 ){
                     $bulan = "['".$implemented[$i]['BULAN']."'],";
                }
                else{
                    $bulan ="['".$implemented[$i]['BULAN']."']";
                }
                echo $bulan;
        }
        echo "]";
        ?>"
    
    var data1 = "<?php 
            echo " [";
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
            echo "]";

        ?>"

    var data2 = "<?php 
            echo " [";
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
        echo "]";
        ?>"

    var data3 = "<?php 
            echo " [";
            for ($i=0; $i<count($implemented); $i++){
               
                if ($i < count($implemented) - 1 ){
                     $bulan = "['".$implemented[$i]['BULAN']."'],";
                }
                else{
                    $bulan ="['".$implemented[$i]['BULAN']."']";
                }
                echo $bulan;
        }
        echo "]";
        ?>"

    var data4 = "<?php 
            echo "[";
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
            echo "]";

        ?>"

    var data5 =  "<?php 
            echo "[";
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
        echo "]";
        ?>"

    var kategori_2 = "<?php 
            echo "[";
            for ($i=0; $i<count($kaizen_submit); $i++){
               
                if ($i < count($kaizen_submit) - 1 ){
                     $bulan = "['".$kaizen_submit[$i]['BULAN']."'],";
                }
                else{
                    $bulan ="['".$kaizen_submit[$i]['BULAN']."']";
                }
                echo $bulan;
        }
        echo "]";
        ?>"

    var data6 = "<?php 
            echo "[";
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
            echo "]";

        ?>"

    var data7 =  "<?php 
            echo "[";
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
        echo "]";
        ?>"
})
</script>
<script type="text/javascript" src="<?php echo base_url();?>template/grafik/implemented.js"></script> 

