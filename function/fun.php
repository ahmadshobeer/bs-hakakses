<?php		
	function menu_parent($sub){
		include 'inc/inc-mis-core.php';
		$parent = mysqli_fetch_array(mysqli_query($conn,"select parent from tbl_menu_group where module='$sub'"));
		return $parent['parent'];
	}

		function get_desk_menu($sub){
		include 'inc/inc-mis-core.php';
		$desk = mysqli_fetch_array(mysqli_query($conn,"select desk_menu from tbl_menu_group where module='$sub'"));
		return $desk['desk_menu'];

	}
?>