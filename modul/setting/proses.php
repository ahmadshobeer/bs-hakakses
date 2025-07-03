<?php
    session_start();

    include "../../inc/inc-mis-core.php";
    include "../../function/fun.php";

    if($_GET['mode']=="add_grup"){

        $kd=addslashes($_POST['kd']); //variabel dari form
        $desk_grup=addslashes($_POST['desk']); //variabel dari form
        $kd_menu=$_POST['kd_menu']; //variabel dari form

       
        try{

             $query=mysqli_query($conn,"insert into tbl_hakakses(kode_hakakses,nama_hakakses) values('$kd','$desk_grup')"); //insert ke m_grup_akun

             for($i=0;$i<count($kd_menu);$i++){
                $query_sub = mysqli_query($conn,"insert into tbl_menu_access values ('$kd','$kd_menu[$i]')");
            } 
        
        if($query){
            $return=array(
                "error"=>false,
                "title"=>"Sukses",
                "text"=>"Data Ditambahkan",
                "icon"=>"success"
            );
        }else{
            $return=array(
                "error"=>true,
                "title"=>"Gagal",
                "text"=>"Data gagal Ditambahkan",
                "icon"=>"warning"
            );
        }

        }catch(mysqli_sql_exception $e){


            $return=array(
                "error"=>true,
                "title"=>"Gagal",
                "text"=>"Eror : ".$e->getMessage(),
                "icon"=>"error"
            );
        }


        echo json_encode($return);
    
    }elseif($_GET['mode']=="edit_grup"){

        $desk_grup=addslashes($_POST['desk']); //variabel dari form
        $kd_menu=$_POST['kd_menu']; //variabel dari form
        $kode = addslashes($_POST['kd']);


          try{
            $query=mysqli_query($conn,"UPDATE tbl_hakakses set nama_hakakses='$desk_grup' where kode_hakakses ='$kode'"); 

            $query_delete =mysqli_query($conn,"DELETE from tbl_menu_access where kode_hakakses='$kode'"); 

            
        if($query){
            $return=array(
                "error"=>false,
                "title"=>"Sukses",
                "text"=>"Data Ditambahkan",
                "icon"=>"success"
            );

              for($i=0;$i<count($kd_menu);$i++){
                $query_sub = mysqli_query($conn,"insert into tbl_menu_access(kode_hakakses,code_menu) values ('$kode','$kd_menu[$i]')");
            }   
        
        }else{
            $return=array(
                "error"=>true,
                "title"=>"Gagal",
                "text"=>"Data gagal Ditambahkan",
                "icon"=>"warning"
            );
        }

        }catch(mysqli_sql_exception $e){


            $return=array(
                "error"=>true,
                "title"=>"Gagal",
                "text"=>"Eror : ".$e->getMessage(),
                "icon"=>"error"
            );
        }


        echo json_encode($return);
       

    
    }else if($_GET['mode']=="hapus_grup"){
        $query_akses=mysqli_query($conn,"DELETE from tbl_menu_access where kode_hakakses ='$_GET[id]'");
        $query=mysqli_query($conn,"DELETE from tbl_hakakses where  kode_hakakses ='$_GET[id]'");

        if($query){
            $return=array(
                "error"=>false,
                "title"=>"Sukses",
                "text"=>"Data Dihapus",
                "icon"=>"success"
            );
        }else{
            $return=array(
                "error"=>true,
                "title"=>"Gagal",
                "text"=>"Data gagal dihapus",
                "icon"=>"error"
            );
        }
        echo json_encode($return);
    }

?>