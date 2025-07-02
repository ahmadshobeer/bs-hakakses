<?php

	$sql_modul = mysqli_query($conn,"select * from tbl_menu_group where module='$get_modul'");
	$modul = mysqli_fetch_array($sql_modul);
	include "modul/$modul[path]";
	

?>