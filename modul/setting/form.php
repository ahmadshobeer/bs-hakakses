

<?php
include "../../inc/inc-mis-core.php";
include "../../function/fun.php";
$mode=$_GET['mode'];

if($mode=="add_grup"){
?>

<script type="text/javascript">

    $(document).ready(function(){
        $("#form_data").on("submit", function(e) {
    if (!e.isDefaultPrevented()) {
        
        var form = $('#form_data')[0];
        var data = new FormData(form);
       
        $.ajax({
            type : "POST",
            url: "modul/setting/proses.php?mode=add_grup",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success:function (data){
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
               
                
            },
            error:function(e){
                
            }
        });
     

     return false;
    }
  });  
    });

    function cek_menu(a){
        id = a;
        if ($('.child_'+a).is(':checked')){
            $('#parent_'+a).prop('checked',true);
        } else {
            $('#parent_'+a).prop('checked',false);
        }
    }
</script>
<div class="row">
    <div class="col-md-12">
        <form method="POST" id="form_data">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Hak Akses</h3>
                        </div>    
                        <div class="card-body">
                            <div class="form-group mb-2">
                                <label for="kd">Kode Grup </label>
                                <input type="text" class="form-control form-control-sm" id="kd"   name="kd"  Placeholder="Kode Grup" autofocus autocomplete="off" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="desk">Nama Grup </label>
                                <input type="text" class="form-control form-control-sm" id="desk"   name="desk"  Placeholder="Nama Grup" autofocus autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Menu Akses</h3>
                        </div>    
                        <div class="card-body">
                          <?php
                            $i = 0;
                            $j = 0;
                            $sql_menu = mysqli_query($conn,"select * from tbl_menu_group a where a.level='1' and a.show='Y'  ");
                            while ($menu=mysqli_fetch_array($sql_menu)){
                                $i++;
                                echo "<label style='cursor:pointer;'>
                                            <input class='parent form-check-input' id='parent_$i' value='$menu[code_menu]'  type='checkbox' name='kd_menu[]' /> <u><i><b>$menu[desk_menu]</b></i></u>
                                        </label>
                                        <div class='parent_$i' _style='display:none'>";
                                $sql_sub = mysqli_query($conn,"select * from tbl_menu_group a where a.level='2'  and a.parent='$menu[code_menu]'");
                                while ($sub=mysqli_fetch_array($sql_sub)){
                                    $j++;
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;<label style='cursor:pointer;'>
                                            <input class='child child_$i form-check-input' id='child_$j' onclick='cek_menu($i)' type='checkbox' name='kd_menu[]'  value='$sub[code_menu]' /> $sub[desk_menu]
                                        </label>
                                        <br>";
                                }
                                echo   "</div>";
                            }
                        ?> 
                        </div>
                    </div>
                    
                </div>
            </div>
          
          
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Batal</button>
                <input type="submit" id="btnSubmit" class="btn btn-primary btn-send" value="Simpan">
            </div> 
            
        </form>
    </div>
</div>
<?php
}elseif($mode=="edit_grup"){

    $data = mysqli_fetch_array(mysqli_query($conn,"select * from tbl_hakakses where kode_hakakses='$_GET[id]'"))
?>
<script type="text/javascript">

$(document).ready(function(){
    $("#form_data").on("submit", function(e) {
if (!e.isDefaultPrevented()) {
    
    var form = $('#form_data')[0];
    var data = new FormData(form);
   
    $.ajax({
        type : "POST",
        url: "modul/setting/proses.php?mode=edit_grup",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        success:function (data){
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
           
            
        },
        error:function(e){
            
        }
    });
 

 return false;
}
});  
});

function cek_menu(a){
    id = a;
    if ($('.child_'+a).is(':checked')){
        $('#parent_'+a).prop('checked',true);
    } else {
        $('#parent_'+a).prop('checked',false);
    }
}
</script>
<div class="row">
<div class="col-md-12">
    <form method="POST" id="form_data">
        <div class="row">
            <div class="col-md-5">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hak Akses</h3>
                    </div>    
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="kd">Kode Grup </label>
                            <input type="text" class="form-control form-control-sm" id="kd"   name="kd"  Placeholder="Kode Grup" autofocus autocomplete="off" value="<?= $data['kode_hakakses']?>" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="desk">Nama Grup </label>
                            <input type="text" class="form-control form-control-sm" id="desk"   name="desk"  Placeholder="Nama Grup" value="<?= $data['nama_hakakses']?>" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">


            <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Menu Akses</h3>
                        </div>    
                        <div class="card-body">
                        <?php
                            $i = 0;
                            $j = 0;
                            $list_menu = array();
                            $sql_akses = mysqli_query($conn,"select code_menu from tbl_menu_access where kode_hakakses='$data[kode_hakakses]'");
                            while ($akses=mysqli_fetch_array($sql_akses)){
                                array_push($list_menu,$akses['code_menu']);
                            }
                            $sql_menu = mysqli_query($conn,"select * from tbl_menu_group a where a.level='1' and a.show='Y'");
                            while ($menu=mysqli_fetch_array($sql_menu)){
                                $i++;
                                if (in_array($menu['code_menu'],$list_menu))
                                    $parent_check = "checked";
                                else
                                    $parent_check = "";
                                echo "<label style='cursor:pointer;'>
                                            <input class='parent form-check-input' id='parent_$i' value='$menu[code_menu]'  type='checkbox' name='kd_menu[]' $parent_check /> <u><i><b>$menu[desk_menu]</b></i></u>
                                        </label>
                                        <div class='parent_$i' _style='display:none'>";
                                $sql_sub = mysqli_query($conn,"select * from tbl_menu_group a where a.level='2'  and a.parent='$menu[code_menu]'");
                                while ($sub=mysqli_fetch_array($sql_sub)){
                                    $j++;
                                    if (in_array($sub['code_menu'],$list_menu))
                                        $child_check = "checked";
                                    else
                                        $child_check = "";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;<label style='cursor:pointer;'>
                                            <input class='child child_$i form-check-input' id='child_$j' onclick='cek_menu($i)' type='checkbox' name='kd_menu[]'  value='$sub[code_menu]' $child_check/> $sub[desk_menu]
                                        </label>
                                        <br>";
                                }
                                        echo   "</div>";
                            }
                        ?> 



                         
                        </div>
                    </div>
                
            </div>
        </div>
      
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Batal</button>
            <input type="submit" id="btnSubmit" class="btn btn-primary btn-send" value="Simpan">
        </div> 
        
    </form>
</div>
</div>

<?php
}
?>