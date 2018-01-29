<?php
$title = "Edit Vehicle";
include "header_1.php";
include "DBHelper.php";
include "db_queries.php";

//echo 'You are editing a planet<br>';

$vid = $_GET['id'];

$cur_qry = "SELECT * FROM swdb_vehicles WHERE swdb_vehicles.vid = " . $vid ."";

if (db_connect()) {
    $result = db_generic_select($cur_qry);
}

$err = db_error();
if ($err != null) {
    echo $err;
}
    
//$vid = $result[0]['vid'];
$vehic_name = $result[0]['vehic_name'];
$type = $result[0]['type'];
$about = $result[0]['about'];
$iconic = $result[0]['iconic'];
$planets_pid = $result[0]['Planets_pid'];


?>

    <script>
        $(document).ready(function(){
            $("#edit_vehic_modal").modal('show');
        });
    </script>

<div class="modal fade" id="edit_vehic_modal" role="dialog">
  <div class="modal-dialog">    
      <!-- ADD Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit a Character in the UO SWDB</h4>
          </div>
          <div class="modal-body">
              <form action="VehicEdit_Commit.php" method="post">
              <div class="form-group">
                  <label for="vehic_name">Vehicle Name:</label>
                  <input type="text" value="<?php echo $vehic_name ;?>" class="form-control" id="vehic_name" name="vehic_name">
                  <input type="hidden" value="<?php echo $vid; ?>" class="form-control" id="vid" name="vid"> 
              </div>
              <div class="form-group">
                  <label for="type">Type:</label>
                  <input type="text" value="<?php echo $type ;?>" class="form-control" id="type" name="type">                  
              </div>
              <div class="form-group">
                  <label for="about">About:</label>
                  <textarea rows="10" type="text" class="form-control" id="about"name="about"><?php echo $about ;?></textarea>
              </div>
              <div class="form-group">
                  <label class="checkbox-inline"><input type="checkbox" name="iconic" id="iconic" value="TRUE" checked="<?php if($iconic == 0) echo'checked'; else echo ''; ?>"> Iconic</label>
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
                <button type="button" class="btn btn-default" data-dismiss="modal" id="character_cancel">Cancel</button>
        </div>
      </div>      
    </div>
  </div>  
</div>


<script>
    document.getElementById("character_cancel").onclick = function () {
        location.href = "Characters.php";
    }
</script>


