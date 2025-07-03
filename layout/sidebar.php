<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

<?php

    $kd_hakakses='admin'; //ganti pake session login


		$sql_menu = mysqli_query($conn,"SELECT a.`code_menu`,b.`desk_menu`,b.`icon`,b.`module`,b.`parent`,b.`path`,b.type FROM  tbl_menu_access a INNER JOIN  tbl_menu_group b 
                            ON a.`code_menu`=b.`code_menu` WHERE  b.level='1' AND b.show='Y' AND a.`kode_hakakses`='$kd_hakakses'  ORDER BY b.code_menu ASC");
		while ($menu = mysqli_fetch_array($sql_menu)){
			if ($menu['type']=='1'){
				if (($_GET['module']==$menu['module']) or (empty($_GET['module'])))
					$active_menu = "active";
				else
					$active_menu = "";
				echo "
          <li class='nav-item'>
                  <a href='?module=$menu[module]' class='nav-link $active_menu'>
                    <i class='nav-icon $menu[icon]'></i>
                    <p>
                    $menu[desk_menu]
                    </p>
                  </a>
                </li>		
              ";
            } else {
				$parent = menu_parent($_GET['module']);
				if ($parent==$menu['code_menu']){
					$active_menu2 = "active";
					$show_sub = "menu-open";
			
					$panah = "right fas fa-angle-left";
				} else { 
					$active_menu2 = "";
					$show_sub = "";
					
					$panah = "fas fa-angle-left right";
				}
				echo "
				<li class='nav-item has-treeview $show_sub'>
					<a href='#' class='nav-link $active_menu2' data-target='$menu[code_menu]'>
					<i class='nav-icon $menu[icon]'></i>
					<p>$menu[desk_menu] <i class='$panah'></i>
					</p>
				</a>
					<ul class='nav nav-treeview'>";
						//load sub menu
						$sql_sub = mysqli_query($conn,"SELECT a.`code_menu`,b.`desk_menu`,b.`icon`,b.`module`,b.`parent`,b.`path`,b.type FROM  tbl_menu_access a INNER JOIN  tbl_menu_group b 
                          ON a.`code_menu`=b.`code_menu`
                          WHERE  b.level='2' AND b.show='Y' AND b.parent='$menu[code_menu]' and a.kode_hakakses='$kd_hakakses' ORDER BY b.code_menu ASC");						
						while ($sub=mysqli_fetch_array($sql_sub)){
							//form dari view
							$replace = $_GET['module'];
							if (($_GET['module']==$sub['module']) or ($replace==$sub['module']))
								$active_sub = "active";
							else
								$active_sub = "";
							
							echo "<li class='nav-item'>";
							echo "<a href='?module=$sub[module]' class='nav-link $active_sub'><i class='fas fa-circle-notch nav-icon'></i><p>$sub[desk_menu]</p></a></li>";
						}						
				echo "</ul>
				  </li>			
				";
			}
		}
	  ?>   

    </ul>
  </nav>