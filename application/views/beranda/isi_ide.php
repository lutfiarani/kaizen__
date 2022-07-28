<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<style>
.note-group-select-from-files {
  display: none;
}
</style>

<section class="contact_section layout_padding-bottom" id="keIsiIde" >
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
      <form>
        <div class="row">
          <div class="col-md-7">
            <span id="berhasil_upload"></span>
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="NIK" id="nik" name="nik" >
                  </div>
                  <div>
                    <input type="text" placeholder="Nama" id="nama" name="nama" readOnly>
                  </div>
                  <div>
                    <input type="text" placeholder="Jabatan" id="jabatan" name="jabatan" readOnly>
                  </div>
                  <div>
                    <!-- <input type="text" placeholder="gedung" id="gedung" name="gedung"> -->
                    <select name="gedung" id="gedung" placeholder="gedung">
                        <option value="">Pilih Gedung</option>
                        <?php
                            $jmlgedung = count($gedung);
                            for($i = 0; $i <$jmlgedung; $i++){
                                $data = $gedung[$i];
                                echo "<option value=".$data['FACTORY2'].">Gedung ".$data['FACTORY2']."</option>";
                            }
                            
                        ?>
                        <option value="SUPPORTING">Supporting</option>
                    </select>
                  </div>
                  <div>
                    <input type="text" placeholder="Bagian" id="bagian" name="bagian" readOnly>
                  </div>
                  <div>
                    <select name="cell" id="cell" placeholder="cell">
                        <option value="">Pilih Cell</option>
                    </select>
                  </div>
                  <div>
                    <select name="kategori" id="kategori" placeholder="kategori">
                        <option value="">Pilih Kategori</option>
                        <option value="Productivity">Productivity</option>
                        <option value="Quality">Quality</option>
                        <option value="Healthy">Healthy</option>
                        <option value="Savety">Savety</option>
                        <option value="Other">Other</option>
                        
                    </select>
                  </div>
                  <!-- <div class="mt-5">
                    <button type="button" id="submit_data">
                      send
                    </button>
                  </div> -->
                </div>

              </div>
          </div>
          <div class="col-md-5">
          
                <!-- <textarea rows="15" cols="60" placeholder="Isi ide Anda di sini" id="ide" nama="ide" ></textarea> -->
                <div id="ide"></div>
                <div class="contact_form-container" style="margin-top:20px">
                <button type="button" id="submit_data">
                      send
                    </button>
                  </div>
          </div>
          
        </div>
        <br>
        <!-- <div class="col-sm-12"> -->
        <div class="h-50 d-inline-block" style=" background-color: rgba(255,255,153)">
                            <p><u>Petunjuk Pengisian</u></p>
                            1. ketik NIK, otomatis Nama, Jabatan, Geudng, Bagian akan terisi<br>
                            2. Klik tanda panah di kolom cell, pilih cell<br>
                            3. Klik tanda panah di kolom area, pilih area<br>
                            4. Ketik idemu</br>
                            5. Klik tombol kirim</br>
        </div>
                          </div>
          <!-- </div> -->
          
        </div>
      </div>
      
    </div>
  </section>



<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#ide').summernote({
        placeholder: 'Isi ide Anda di sinisi',
        tabsize: 2,
        height: 280,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ]
      });
    });

    

    $( "#nik" ).change(function() {
      $.ajax({
            url : "<?php echo site_url('C_kaizen/ceknik/'); ?>"+$('#nik').val(),
            success : function(o) {
              console.log(o)
                // do something
                if(o.status=='ok'){
                  // alert(o.status)
                  var data = o.data
                  
                    $('#nik').val(data.NIK);
                    $('#nama').val(data.NAME);
                    $('#bagian').val(data.DESCRIPTION);
                    $('#jabatan').val(data.TITLECODE);
                    
                  
                }
                else{
                  alert(o.msg)
                  location.reload();
                }
            },
            error : function(data) {
                // do something
                console.log(data)
            }
          });
    });

    $( "#gedung" ).change(function() {
      if($('#gedung').val() == 'SUPPORTING'){
        $('#cell').hide()
      }else{
        $('#cell').show()
      }
      $.ajax({
            url : "<?php echo site_url('C_kaizen/cekcell/'); ?>"+$('#gedung').val(),
            success : function(o) {
              console.log(o)
              $("#cell").html(o.data);
            },
            error : function(data) {
                // do something
                console.log(data)
            }
          });
    });

    $( "#submit_data" ).click(function() {
      var nik       = $('#nik').val()
      var nama      = $('#nama').val()
      var jabatan   = $('#jabatan').val()
      var gedung    = $('#gedung').val()
      var cell      = $('#cell').val()
      var bagian    = $('#bagian').val()
      var kategori  = $('#kategori').val()
      var ide       =  $('#ide').summernote('code');
      
      // console.log(ide)

       $.ajax({
            url : "<?php echo site_url('C_kaizen/simpan_ide'); ?>",
            type:"POST",  
            data:{nik:nik, nama:nama, jabatan:jabatan, gedung:gedung, cell:cell, ide:ide, bagian:bagian, kategori:kategori},  
            success : function(o) {
                console.log(o)
                if(o){
              
                    html ='<div class="p-3 mb-2 bg-success text-white">Data Berhasil Dikirim</div>'
                    $('#nik').val('');
                    $('#nama').val('');
                    $('#jabatan').val('');
                    $('#gedung').val('');
                    $('#cell').val('');
                    $('#bagian').val('');
                    $('#ide').val('');
                    $("#berhasil_upload").html(html);
                }
                else{
                //   location.reload();
                    html ='<div class="p-3 mb-2 bg-danger text-white">Data Gagal Dikirim, silahkan ulangi kembali</div>'
                     
                    $("#berhasil_upload").html(html);
                }
            },
            error : function(data) {
                // do something
                console.log(data)
            }
          });
          
      
    });


  </script>
