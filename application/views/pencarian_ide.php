<link href="<?php echo base_url();?>/template/css/rome.css" rel="stylesheet" />

<section class="contact_section layout_padding-bottom">
    <div class="container">
      <!-- <div class="d-flex flex-column align-items-end">
        <div class="custom_heading-container">
          <hr>
          <h2>
            Contact Us
          </h2>
        </div>
      </div> -->
      <div class="layout_padding-top layout_padding2-bottom">
      
        <div class="row">
            <div class="contact_form-container">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Ketik NIK/ ide/ gedung/dll" id="katakunci" name="katakunci">
                       
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Tanggal Mulai" id="dari"> 
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Tanggal Selesai" id="sampai"> 
                    </div>
                    <!-- <button type="button" class="btn btn-primary btn-sm" id="cari_data">Primary</button> -->
                    <button type="button" id="cari_data">Cari</button>
                    <button type="button" id="export_excel">Export Excel</button>
                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Waktu isi ide</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Gedung</th>
                <th scope="col">Bagian</th>
                <th scope="col">Cell</th>
                <th scope="col">Ide Kaizen</th>
                <th scope="col">Status</th>
                <th scope="col">Siapa</th>
                </tr>
            </thead>
            <tbody id="daftar_ide">
               
            </tbody>
        </table>
      </div>
      
    </div>
  </section>
  <script type="text/javascript" src="<?php echo base_url();?>/template/js/popper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>/template/js/rome.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>/template/js/main.js"></script>

  <script>

    // $("#action_ide")
    //   .change(function() {
    //     var str = "";
    //     $( "#action_ide option:selected" ).each(function() {
    //       str += $( this ).text() + " ";
    //     });
    //     $( "#siapa" ).text( str );
    //   })
    //   .trigger( "change" );
   
    $(document).on('change','#action_ide',function(){
        var action_id  = $(this).val();
        var id         = $(this).attr('id_ide');
        // var value = $('option:selected', this).text(); 
        // alert(value);
        edit_ide(id, action_id);
        
        
        
    });
     $('#katakunci').keyup(function(){
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          if((query != '') || (($dari != '')&&($sampai !=''))){
            load_data(query,dari,sampai);
          }else{
            load_data();
          }
          
      });

      function load_data(query, dari, sampai)
      {
        $.ajax({
              url:"<?php echo site_url('C_kaizen/cari_ide')?>",
              method:"POST",
              data:{query:query, dari:dari, sampai:sampai},
              dataType : 'json',
              success:function(data)
              {
                console.log(data);
                var html = '';
                var i;
                var ide;
                var action;
                var response = {};
                for(i=0; i<data.length; i++){
                  ide = data[i];
                  response.val = ide.ACTION;
                  // document.getElementById("action_ide").value = ide.ACTION;
                    html +='<tr><td scope="col">'+(i+1)+'</th>'+
                    '<td scope="col">'+ide.LMNT_DTTM+'</td>'+
                    '<td scope="col">'+ide.NIK+'</td>'+
                    '<td scope="col">'+ide.NAME+'</td>'+
                    '<td scope="col">'+ide.JABATAN+'</td>'+
                    '<td scope="col">'+ide.FACTORY+'</td>'+
                    '<td scope="col">'+ide.DEPT+'</td>'+
                    '<td scope="col">'+ide.LOCATION+'</td>'+
                    '<td scope="col">'+ide.IDE+'</td>';
                    // $("#action_ide").val(ide.ACTION);
                    // '<td scope="col">'+ide.ACTION+'</td></tr>';
                    
                    html +='<td scope="col">'+
                            '<select name="action_ide" id="action_ide"  id_ide = "'+ide.RECORDID+'">'+
                            '<option value="1">Perlu follow up</option>'+
                            '<option value="2">Sudah pernah</option>'+
                            '<option value="3">komplain(bukan ide)</option></select></td>';
                    if(ide.ACTION == '1'){
                        action = 'Perlu follow up'
                    }else if(ide.ACTION == '2'){
                      action = 'sudah pernah'
                    }else if(ide.ACTION == '3'){
                      action = 'komplain(bukan ide)';
                    }
                    html +='<td id="siapa">'+action+'</td>'+
                    '</tr>';
                    $("#action_ide option[data-value='" + response.val +"']").attr("selected","selected");
                        
                }
                $('#daftar_ide').html(html); 
                // console.log(data);
              }
        });
      }

      function edit_ide(id, action){
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          $.ajax({
              url:"<?php echo site_url('C_kaizen/edit_ide')?>",
              method:"POST",
              data:{id:id, action:action},
              dataType : 'json',
              success:function(data)
              {
                console.log(data);
                load_data(query, dari, sampai);
              }
        });
        }


      $( "#cari_data" ).click(function() {
            var query  = $('#katakunci').val();
            var dari   = $('#dari').val();
            var sampai = $('#sampai').val();
            load_data(query, dari, sampai);

          });

      $( "#export_excel" ).click(function() {
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          
          $.ajax({
              url:"<?php echo site_url('C_kaizen/export_excel')?>",
              method:"POST",
              data:{query:query, dari:dari, sampai:sampai},
              // dataType : 'json',
              success:function(data)
              {
                console.log(data);
                
              }
          });

        });

        $( "#action_ide" ).click(function() {
          var id    =   $(this).attr('id_ide');
          var action    =   $('#action_ide').val();
          edit_ide(id, action);

        });

       
  $(document).ready(function(){
	  
    load_data();
   
    });
    
    
 

  </script>
