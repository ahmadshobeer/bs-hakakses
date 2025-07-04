<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Realisasi Kredit</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <div>
          <!-- <form> -->
            <div class="form-group row">
              <div class="col-md-4 col-sm-9 col-xs-12">
                <label class="control-label">Cabang</label>
                <select class="form-control" name="cab" id="cab" required>
                  <option value="" selected="selected" disabled>= PILIH =</option>
                  <?php 
                    $sqlquery="SELECT * FROM tbl_cabang";
                    $runsql=mysqli_query($conn,$sqlquery);
                    while($varData=mysqli_fetch_array($runsql)){
                      $var_id=$varData['id_cabang'];
                      // $var_child=$varData['child'];
                      $var_nama=$varData['nama_cabang'];?>
                      <option value="<?php echo $var_child ?>"><?php echo $var_id ?> - <?php echo $var_nama ?></option>
                      <?php
                    }
                  ?>
                </select>  
              </div>
              <div class="col-md-4 col-sm-9 col-xs-12">
                <label class="control-label">Produk</label>
                <select class="form-control" name="prod" id="prod" required>
                  <option value="" selected="selected" disabled>= PILIH =</option>
                  <option value="%">SEMUA PRODUK</option>
                  <?php 
                  $sqlquery="SELECT * FROM tbl_produk WHERE jenis_produk='KYD'";
                  $runsql=mysqli_query($conn,$sqlquery);
                  while($varData=mysqli_fetch_array($runsql)){
                    $var_id=$varData['kode_produk'];
                    $var_nama=$varData['nama_produk'];?>
                    <option value="<?php echo $var_id ?>%"><?php echo $var_id ?> - <?php echo $var_nama ?></option>
                    <?php
                  }
                  ?>
                </select>  
              </div>
              <div class="col-md-2 col-sm-9 col-xs-12">      
                <label class="control-label">Tanggal</label>      
                <input type="text" name="tgl" id="tgl" class="form-control tanggal" autocomplete="off"  data-date-autoclose="true" required/>
                
              </div>
              <div class="col-md-2 col-sm-9 col-xs-12">      
                <label class="control-label">Sampai Tanggal</label>      
               
                <input type="text" name="tgl" id="tgl2" class="form-control tanggal" autocomplete="off"  data-date-autoclose="true" required/>
              </div>           
            </div>
            <div class="form-group row">
              <div class="col-md-4 col-sm-9 col-xs-12">
                <label class="control-label">Kode Account Officer</label>
                <select class="form-control" name="ao" id="ao" required>
                  <option value="" selected="selected" disabled>= PILIH =</option>
                  <option value="%">SEMUA</option>
                  <?php 
                  $sqlquery="SELECT x.nama_lengkap, waoaoco FROM tbl_user x JOIN tbl_ao y ON x.id_user=y.id_user WHERE waodept='KYD' ORDER BY x.nama_lengkap ASC";
                  $runsql=mysqli_query($conn,$sqlquery);
                  while($varData=mysqli_fetch_array($runsql)){
                    $var_id=$varData['waoaoco'];
                    $var_nama=$varData['nama_lengkap'];?>
                    <option value="<?php echo $var_id ?>"><?php echo $var_nama ?> (<?php echo $var_id ?>)</option>
                    <?php
                  }
                  ?>
                </select>  
              </div>                
              <div class="col-md-2 col-sm-9 col-xs-12">
                <label class="control-label"></label>      
                <input type="button" name="search" id="search" value="Search" class="form-control btn btn-info" />
              </div>                      
            </div>
          <!-- </form> -->
        </div>

      </div>

      <div class="card-body">
        <div class="table-responsive">
        <table id="tabeldata" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No.</th>         
              <th class="text-center">Tgl Realisasi</th>
              <th class="text-center">Jenis Produk</th>                 
              <th class="text-center">Cabang</th>                         
              <th class="text-center">No Rekening</th>
              <th class="text-center">No PK</th>
              <th class="text-center">CIF</th>
              <th class="text-center">NIK</th>
              <th class="text-center">Nama Lengkap</th>
              <th class="text-center">Jenis Kelamin</th>
              <th class="text-center">Tempat Lahir</th>
              <th class="text-center">Tgl Lahir</th>
              <th class="text-center">Alamat</th>   
              <th class="text-center">No Telpon</th>      
              <th class="text-center">Tgl Jatuh Tempo</th> 
              <th class="text-center">Plafond</th> 
              <th class="text-center">Provisi & ADM</th> 
              <th class="text-center">Kode Instansi</th>
              <th class="text-center">Instansi</th> 
              <th class="text-center">Jangka Waktu</th> 
              <th class="text-center">Rate</th>                   
              <th class="text-center">Status Realisasi</th>   
              <th class="text-center">No Rekening Lama</th>     
              <th class="text-center">Kode AO</th> 
              <th class="text-center">Status</th> 
              <th class="text-center">Usin</th>  
            </tr>
          </thead>
          <tbody>
          </tbody>

        </table>
        </div>
        
      </div>

    </div>


  </div>

  <script type="text/javascript" language="javascript" >

    $(document).ready(function(){
       var table =  $('#tabeldata').DataTable({
        "processing": true,
        "serverSide": true,
            ajax: {
                url: 'api/apiRealisasiKredit.php',
                type: 'POST',
                data: function(d) {
                  console.log(d);
                    d.cabang = $('#cab').val();
                    d.produk = $('#prod').val();
                    d.tgl_awal = $('#tgl').val();
                    d.tgl_akhir = $('#tgl2').val();
                    d.ao = $('#ao').val();
                }
            }
        });


      $('#search').on('click', function() {
        table.ajax.reload();
    });
      });
    
  </script> 

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function() {
    $('.result').hide(); 
  });
</script>  