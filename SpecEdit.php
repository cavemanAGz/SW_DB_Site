<?php
$title = "Edit Species";
include "header_1.php";
include "DBHelper.php";
include "db_queries.php";

//echo 'You will be Editing a species<br />';

$sid = $_GET['id'];

$qry = "SELECT * FROM swdb_species WHERE swdb_species.sid = ".$sid."";
//echo $qry . '<br />';

if (db_connect()) {
    $result = db_generic_select($qry);
}

$err = db_error();
if ($err != null) {
    echo $err;
}

$spec_name = $result[0]['spec_name'];
$spec_desc = $result[0]['spec_desc'];
$swdb_planets_pid = $result[0]['swdb_planets_pid'];

//echo 'Name ID: ' .$spec_name . '<br />';
//echo 'Description ID: ' .$spec_desc . '<br />';
//echo 'Planet ID: ' .$swdb_planets_pid . '<br />';

?>

<script>
    $(document).ready(function(){
        $("#edit_spec_modal").modal('show');
    });
</script>

 <!-- Modal -->
  <div class="modal fade" id="edit_spec_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a species to the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="SpecEdit_Commit.php" method="post">
                <div class="form-group">
                    <label for="spec_name">Species Name:</label>
                    <input value="<?php echo $spec_name; ?>" type="text" class="form-control" id="spec_name" name="spec_name">
                    <input type="hidden" value="<?php echo $sid; ?>" class="form-control" id="sid" name="sid"> 
                </div>
                <div class="form-group">
                    <label for="spec_dec">Species Description:</label>
                    <textarea type="text" rows="10" class="form-control" id="spec_desc" name="spec_desc"><?php echo $spec_desc;?></textarea>
                </div>               
                <div class="form-group">
                    <label class="planet_select">Select Home Planet:</label>                    
                        <?php 
                           $get_planets_for_dd = db_query($sql_select_planet_names);
                           echo '<select name="planetselect" class="form-control" id="planet_select">';
                           foreach($get_planets_for_dd as $qry) {
                               echo '<option value="' . $qry['pid'] . '" name="' .$qry['pid'] . '">' . $qry['plan_name'] . '</option>';
                           }
                           echo '</select>';
                        ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  

<!-- END INSERT MODAL -->
