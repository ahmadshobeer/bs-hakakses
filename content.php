<?php


 if (empty($_SESSION['id_user'])){
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
  }else{
	if(in_array($_GET['module'],$array_menu)){

	$sql_modul = mysqli_query($conn,"select * from tbl_menu_group where module='$get_modul'");
	$modul = mysqli_fetch_array($sql_modul);
	include "modul/$modul[path]";
	
 }else{
		include "modul/form/eror-akses.php";
}

}

?>