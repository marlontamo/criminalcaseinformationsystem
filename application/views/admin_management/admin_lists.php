
            <div id="page-content-wrapper">
                <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/admin_default/index'><i class='glyphicon glyphicon-list'></i>List of Admin</a></li>
 
</ol>
</div>";
?>
                <h4>Lists of Admin:</h4>

                <!-- form to search specific id of admins where this form_open(base_url()."location") locates the function to be processed >
                <//?php echo form_open(base_url() . "index.php/admin_default/search"); ?>
                search admin by name: <//?php echo form_input("input_admin_name"); ?>
                <//?php echo form_submit("input_search", "search"); ?><br/-->
				
                <table class='table table-bordered'>
                    <tr>
                        <th>Photo</th>
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th>Date Registered</th>
                        <th colspan="3">Option</th>
                    </tr>

                    <?php
                    for($e = 0; $e < count($views); $e++) {
                        $admin = $views[$e];

                        echo "<tr>";
                        echo "<td><img class='' src='".base_url().'admin_photo/'.$admin['photo']."' width='50px' height='50px'></td>";
                        echo "<td>" . $admin["employeeName"] . "</td>";
                        echo "<td>" . $admin["position"] . "</td>";
                        echo "<td>" . $admin["dateRegistered"] . "</td>";
                        echo "<td><a href='" . base_url() . "index.php/admin_update/update/" . $admin["adminNo"] . "'><i class='glyphicon glyphicon-pencil'></i> &nbsp</a>" ;
                        echo "<a href='" . base_url() . "index.php/admin_profile/display/" .$admin["adminNo"]. "'> <i class='glyphicon glyphicon-eye-open'></i></a>&nbsp" ;
                        echo "<a href='" . "javascript:Delete(" .$admin["adminNo"].")". "'><i class='glyphicon glyphicon-trash'></i></a>" . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
                <div class="btn-group pull-right">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url()."index.php/admin_add/"; ?>">Add New Admin</a>
				</div><br /><br/>
            </div>