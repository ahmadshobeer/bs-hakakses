<script>
    $(document).ready(function(){

    data_grup();
    });

    function data_grup(){	
		$.ajax({
			url: "modul/setting/data.php?data=grup",
			// data: "key="+a,
			cache: false,
            beforeSend: function() {
                $("#loader").show();
            },
			success: function(data){
				$("#data_grup").html(data);
			},
            complete: function() {
                $("#loader").hide();
            }
		});		
	} 


    function add(){
		$('.modal-body').load('modul/setting/form.php?mode=add_grup',function(){
			$('#mymodal').modal('show');
		});
	}
    function edit(a){
		var id = a;
		$('.modal-body').load('modul/setting/form.php?mode=edit_grup&id='+id,function(){
			$('#mymodal').modal('show');
		});
	}

    function hapus(a){
        var id = a;
        Swal.fire({
        title: 'Anda Yakin?',
        text: "Data Akan Dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"POST",
                url :'modul/setting/proses.php?mode=hapus_grup&id='+id,
             
                success:function(data){
                var json = data;
                obj = JSON.parse(json);
                swal.fire({
                        title: obj.title,
                        text: obj.text,
                        icon: obj.icon,
                        confirmButtonText: "OK"
                    }).then((result)=>{
                        if(result.isConfirmed){
                          
                            if(obj.error==true){

                            }else{
                                $('#mymodal').modal('hide');
                                data_grup();
                            }
                        }
                    });                
                }
            });
          
        }
        })
    }
</script>


 <section class="content">
      <div class="container-fluid">
        <div class="row" >
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="data_grup">

                    </div>
                </div>
            </div>
        </div>
      </div>
</section>    


<div class="modal fade" id="mymodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hak Akses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->