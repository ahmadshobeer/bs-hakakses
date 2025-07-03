<?php
include "../../inc/inc-mis-core.php";
include "../../function/fun.php";

$mode=$_GET['data'];
if($mode=="grup"){
    $sql = "select * from tbl_hakakses order by kode_hakakses";
?>
<div class="float-right putih">
        <a onclick="add();"  class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    </div>
<div class="clearfix jarak"></div>
    
<div class="table-responsive">
    <table class="table table-sm table-centered mb-0  table-bordered">
        <thead >
            <tr>
                <th>NO</th>
                <th>NAMA GRUP</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
                $query=mysqli_query($conn,$sql);
                while($data=mysqli_fetch_array($query)){
                    $no++;
                   
                    echo"<tr>
                            <td style='text-align:center'>$no</td>
                            <td>".ucwords($data['nama_hakakses'])."</td>
                          
                            <th style='text-align:center'>
                                <div class='btn-group mr-1' style='color:white;'>
                                    <a onclick='edit(\"$data[kode_hakakses]\")'  class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='top' title='Detail' ><i class='fa fa-edit'></i></a>
                                    <a onclick='hapus(\"$data[kode_hakakses]\")'  class='btn btn-sm btn-danger ' data-toggle='tooltip' data-placement='top' title='Hapus' ><i class='fa fa-trash'></i></a>
                                </div>
                            </th>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<?php

}

?>