<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Realisasi Kredit Produk</h3>

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
          <form>
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
                    $var_child=$varData['child'];
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
                <input type="text" name="tgl" id="tgl" class="form-control tanggal" autocomplete="off" maxlength="8" required/>
              </div>
              <div class="col-md-2 col-sm-9 col-xs-12">      
                <label class="control-label">Sampai Tanggal</label>      
                <input type="text" name="tgl2" id="tgl2" class="form-control tanggal" autocomplete="off" maxlength="8" required/>
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
          </form>

        </div>

      </div>

      <div class="card-body result">
        <table id="example1" class="table table-bordered table-striped">
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
            <!--   <th class="text-center">Nama Lengkap</th>
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
              <th class="text-center">Usin</th>   -->
            </tr>
          </thead>          

        </table>
      </div>

    </div>


  </div>

  <script type="text/javascript" language="javascript" >
    $(document).ready(function(){
      fetch_data('no');

      function fetch_data(is_date_search, tgl='', tgl2='', prod='', cab='', ao='')
      {
        var dataTable = $('#lapdata').DataTable({
          "processing" : true,
          "serverSide" : true,
          "paging":   false,
          "searching":   false,
          "dom": 'Blfrtip',
          "buttons": [
            {
              extend: 'excel',
              text: 'Excel',
              header: true,
              title: 'Laporan Realisasi Pinjaman'
            },
            {
              extend: 'pdfHtml5',
              text: 'PDF',
              exportOptions: {
                modifier: {
                  page: 'current'
                }
              },
              header: true,
              title: 'Laporan Realisasi Pinjaman',
              orientation: 'landscape',
              customize: function(doc) {
                doc.defaultStyle.fontSize = 5; 
                doc.styles.tableHeader.fontSize = 6;    
              }  
            }, 
            {
              extend: 'print',
              text: 'Print',
              title: '',
              orientation: 'landscape',
              paging: true,
              customize: function ( win ) {
                $(win.document.body)
                .css( 'font-size', '9px' );

                $(win.document.body).find( 'table' )
                .css( 'font-size', '9px' );
              }
            }
          ],
          oLanguage: {sProcessing: "<img style='width:60px; height:60px;' src='../assets/img/loading.gif' />"},    
          "order" : [],
          "ajax" : {
            url:"../api/kredit/apiRealisasiKredit.php",
            type:"POST",
            data:{
              is_date_search:is_date_search, tgl:tgl, tgl2:tgl2, prod:prod, cab:cab, ao:ao
            }
          },
          "columnDefs": [  
            {
              "sClass":"text-center",          
              targets: [0],          
            },
            {
              "sClass":"text-center",          
              targets: [1],          
            },
            {
              "sClass":"text-center",          
              targets: [2],          
            },
            {
              "sClass":"text-center",          
              targets: [3],          
            },
            {
              "sClass":"text-left",          
              targets: [8],          
            }, 
            {
              "sClass":"text-center",          
              targets: [9],          
            },
            {
              "sClass":"text-right",          
              targets: [10],          
            },
            {
              "sClass":"text-center",          
              targets: [11],          
            },
            {
              "sClass":"text-center",          
              targets: [12],          
            },  
          ]       
        });
      }

      $('#search').click(function(){
        var tgl = $('#tgl').val();
        var tgl2 = $('#tgl2').val();
        var prod = $('#prod').val();
        var cab = $('#cab').val();
        var ao = $('#ao').val();
        if(tgl !='' || tgl2 !='' || prod !='' || cab !='' || ao !='')
        {
          $('#lapdata').DataTable().destroy();
          fetch_data('yes', tgl, tgl2, prod, cab, ao);
          $('.result').show(); 
        }
        else
        {
          alert("Tanggal data harus diisi!!");
        }
      }); 

    });
  </script> 

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
